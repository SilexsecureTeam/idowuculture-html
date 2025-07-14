<?php

namespace App\Livewire\Checkout;

use App\Models\Cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class CheckoutPage extends Component
{
    public $cartItems = [];
    public $subTotal = 0;
    public $deliveryFee = 15;
    public $total = 0;

    public $name;
    public $email;
    public $phone;
    public $address;

    public function mount()
    {
        $userId = Auth::id();
        $sessionId = Session::get('cart-session');

        $this->cartItems = Cart::query()
            ->where('checked_out', false)
            ->where(function ($q) use ($userId, $sessionId) {
                $q->when($userId, fn($q) => $q->orWhere('user_id', $userId));
                $q->when($sessionId, fn($q) => $q->orWhere('session_id', $sessionId));
            })->get();

        $this->subTotal = $this->cartItems->sum('total');
        $this->total = $this->subTotal + $this->deliveryFee;

        if (Auth::check()) {
            $this->name = Auth::user()->firstname. ' ' . Auth::user()->lastname;
            // dd($this->name);
            $this->email = Auth::user()->email;
            $this->phone = Auth::user()->phone;
        }
    }

    public function placeOrder()
    {
        $user = Auth::user();
        
        // Ensure user is authenticated
        if (!$user) {
            session()->flash('error', 'You must be logged in to place an order.');
            return redirect()->route('login');
        }

        // Validate any additional fields if needed
        $this->validate([
            'address' => 'required',
        ]);

        // Total amount in Kobo
        $amountInKobo = $this->total * 100;

        // Initialize Paystack transaction
        $response = Http::withToken(config('services.paystack.secret_key'))
            ->post(config('services.paystack.payment_url') . '/transaction/initialize', [
                'email' => $user->email,
                'amount' => $amountInKobo,
                'callback_url' => config('services.paystack.callback_url'),
                'metadata' => [
                    'name' => $user->firstname. ' ' . $user->lastname,
                    'phone' => $user->phone ?? 'N/A',
                    'address' => $this->address,
                    'user_id' => $user->id,
                    'cart_item_ids' => $this->cartItems->pluck('id')->toArray(),
                ],
            ]);

        $data = $response->json();

        if ($response->successful() && isset($data['data']['authorization_url'])) {

            return redirect()->away($data['data']['authorization_url']);
        }
        session()->flash('error', 'Payment initialization failed. Please try again.');

        return redirect()->back();
    }


    #[Layout('layouts.app')]
    #[Title('Checkout')]
    public function render()
    {
        return view('livewire.checkout.checkout-page');
    }
}
