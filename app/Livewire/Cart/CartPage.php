<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class CartPage extends Component
{
    public $cartItems = [];

    #[Locked]
    private $cartQuery;

    public $subTotal = 0;
    public $discount = 0;
    public $deliveryFee = 0;
    public $total = 0;

    public function mount()
    {
        $sessionId = Session::get('cart-session');
        $userId = Auth::check() ? Auth::id() : null;

        if ($userId && $sessionId) {
            Cart::where('session_id', $sessionId)
                ->whereNull('user_id')
                ->where('checked_out', false)
                ->update(['user_id' => $userId]);
        }

        $this->cartQuery = $this->buildCartQuery();

        if (!$this->cartQuery) {
            $this->cartItems = [];
            return;
        }

        $this->cartItems = $this->cartQuery->get();
        $this->calculateSubTotal();
    }

    public function increaseQty(Cart $cart)
{
    if (!$cart) return;

    $cart->quantity += 1;

    $fabricPrice = 0;

    if (isset($cart->product->fabrics) && is_array($cart->product->fabrics)) {
        $index = $cart->fabric_id;
        if (is_numeric($index) && isset($cart->product->fabrics[$index]['fabric_price'])) {
            $fabricPrice = (float) $cart->product->fabrics[$index]['fabric_price'];
        }
    }

    $cart->total = ($cart->product->price + $fabricPrice) * $cart->quantity;
    $cart->save();

    $this->refreshCart();
}

public function decreaseQty(Cart $cart)
{
    if (!$cart || $cart->quantity <= 1) return;

    $cart->quantity -= 1;

    $fabricPrice = 0;

    if (isset($cart->product->fabrics) && is_array($cart->product->fabrics)) {
        $index = $cart->fabric_id;
        if (is_numeric($index) && isset($cart->product->fabrics[$index]['fabric_price'])) {
            $fabricPrice = (float) $cart->product->fabrics[$index]['fabric_price'];
        }
    }

    $cart->total = ($cart->product->price + $fabricPrice) * $cart->quantity;
    $cart->save();

    $this->refreshCart();
}


    public function removeItem(Cart $cart)
    {
        if (!$cart) return;

        $cart->delete();
        $this->refreshCart();

        $this->dispatch('increaseCount')->to(CartIcon::class);
    }

    private function calculateSubTotal()
    {
        if (!$this->cartQuery) return;

        $this->subTotal = $this->cartQuery->sum('total');
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $this->total = max(0, $this->subTotal - $this->discount + $this->deliveryFee);
    }


    private function refreshCart()
    {
        $this->cartQuery = $this->buildCartQuery();
        $this->cartItems = $this->cartQuery->get();
        $this->calculateSubTotal();
    }

    private function buildCartQuery()
    {
        $sessionId = Session::get('cart-session');
        $userId = Auth::check() ? Auth::id() : null;

        if (!$sessionId && !$userId) {
            return null;
        }

        return Cart::query()
            ->where('checked_out', false)
            ->where(function ($query) use ($sessionId, $userId) {
                if ($sessionId) {
                    $query->orWhere('session_id', $sessionId);
                }

                if ($userId) {
                    $query->orWhere('user_id', $userId);
                }
            });
    }

    #[Layout('layouts.app')]
    #[Title('My Cart')]
    public function render()
    {

        return view('livewire.cart.cart-page');
    }
}
