<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function handleCallback(Request $request)
    {

        $reference = $request->query('reference');

        $response = Http::withToken(config('services.paystack.secret_key'))
            ->get(config('services.paystack.payment_url') . '/transaction/verify/' . $reference);
        $data = $response->json();
        if ($response->successful() && $data['data']['status'] === 'success') {
            $metadata = $data['data']['metadata'];

            $data = $data['data'];
            $ref = "IDC" . strtoupper(Str::random(10));
            $amount = $data['amount'] / 100;
            // dd($response, $metadata, $ref, $amount);

            DB::beginTransaction();
            $order = Order::create([
                'user_id' => Auth::id(),
                'reference' => $ref,
                'address' => $metadata['address'],
                'amount' => $amount,
                'status' => OrderStatus::PLACED->value
            ]);

            // Mark cart items as checked_out
            if (isset($metadata['cart_item_ids'])) {
                $cartQuery = Cart::query()->whereIn('id', $metadata['cart_item_ids']);
                $cartItems = $cartQuery->get();
// dd($response, $data, $cartItems);
                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'product_id' => $item->product_id,
                        'order_id' => $order->id,
                        'fabric_id' => $item->fabric_id,
                        'size' => $item->size,
                        'color' => $item->color,
                        'quantity' => $item->quantity,
                        'selected_fabric' => json_encode($item->selected_fabric),
                        'buy_fabric' => $item->buy_fabric,
                        'price' => $item->total,
                        'status' => OrderStatus::PLACED->value,
                    ]);
                }
                $cartQuery->delete();
                // Cart::whereIn('id', $metadata['cart_item_ids'])->update(['checked_out' => true]);
            }
            $user = Auth::user();
            $paidAt = Carbon::parse($data['paidAt']);
            Transaction::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'name' => $user->firstname . ' ' . $user->lastname,
                'paystack_ref' => $data['reference'],
                'channel' => $data['channel'],
                'currency' => $data['currency'],
                'paid_at' => $paidAt->toDateTimeString(),
                'amount' => $amount,
                'status' => $data['status'],
            ]);

            DB::commit();
            return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
        }

        return redirect()->route('cart-page')->with('error', 'Payment failed or cancelled.');
    }
}
