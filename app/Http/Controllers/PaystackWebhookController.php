<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PaystackWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $secret = env('PAYSTACK_SECRET_KEY');
        $signature = $request->header('x-paystack-signature');
        $computed = hash_hmac('sha512', $request->getContent(), $secret);

        if ($signature !== $computed) {
            return response()->json(['status' => 'Invalid signature'], 401);
        }

        $payload = $request->all();

        // Log the payload for debugging
        Log::info('Paystack Webhook received', $payload);
        return;
        if ($payload['event'] === 'charge.success') {
            $data = $payload['data'];
            $email = $data['customer']['email'];
            $amount = $data['amount'] / 100; // Convert from Kobo to Naira
            $reference = $data['reference'];
            $metadata = $data['metadata'];
            $sessionId = $metadata['session_id'] ?? null;


            $user = User::where('email', $email)->first();

            if ($user) {
                // Get cart item IDs from metadata if available
                $cartItemIds = $metadata['cart_item_ids'] ?? [];

                $cartItemsQuery = Cart::where('user_id', $user->id);

                if (!empty($cartItemIds)) {
                    $cartItemsQuery->whereIn('id', $cartItemIds);
                }

                $cartItems = $cartItemsQuery->get();

                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'session_id' => $sessionId,
                        'user_id' => $user->id,
                        'product_id' => $item->product_id,
                        'order_id' => $reference,
                        'address' => $metadata['address'] ?? 'N/A',
                        'total_price' => $item->total,
                        'status' => 'paid',
                    ]);
                }

                // Delete the specific cart items after successful order
                if (!empty($cartItemIds)) {
                    Cart::whereIn('id', $cartItemIds)->delete();
                } else {
                    Cart::where('user_id', $user->id)->delete();
                }
            }
        }

        return response()->json(['status' => 'success'], 200);
    }
}
