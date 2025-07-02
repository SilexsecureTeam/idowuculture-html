<?php

namespace App\Livewire\Cart;

use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    public $cartCount = 0;
    
    public function mount(){
        $this->cartCount = 2;
    }

    // listening for increase count event
    #[On('increaseCount')]
    public function increaseCount()
    {
        $this->cartCount += 1;
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
