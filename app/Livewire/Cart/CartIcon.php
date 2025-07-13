<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    public $cartCount = 0;

    public function mount()
    {
        $this->increaseCount();
    }

    // listening for increase count event
    #[On('increaseCount')]
    public function increaseCount()
    {
        $session_id = Session::get('cart-session');
        $userId = Auth::check() ? Auth::id() : null;

        if (!$session_id && !$userId) {
            $this->cartCount = 0;
            return;
        }

        $cart = Cart::query();
        $cart->when($session_id, fn($q) => $q->where('session_id', $session_id))
            ->when($userId, fn($q) => $q->orWhere('user_id', $userId));

        $cart->where('checked_out', false);

        $this->cartCount = $cart->count();
    }

    // listening for decrease count event
    #[On('decreaseCount')]
    public function decreaseCount()
    {
        $this->cartCount -= 1;
    }

    public function render()
    {
        return view('livewire.cart.cart-icon');
    }
}
