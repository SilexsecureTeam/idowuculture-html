<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

            // Mark cart items as checked_out
            if (isset($metadata['cart_item_ids'])) {
                Cart::whereIn('id', $metadata['cart_item_ids'])->update(['checked_out' => true]);
            }

            return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
        }

        return redirect()->route('cart')->with('error', 'Payment failed or cancelled.');
    }
}
