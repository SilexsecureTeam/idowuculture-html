<?php

namespace App\Livewire\Product;

use App\Livewire\Cart\CartIcon;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;

    public function mount($sku)
    {
        $this->product = Product::whereSku($sku)->firstOrFail();
       
    }

    public function addToCart($sku)
    {
        $product = Product::whereSku($sku)->first();
        if (!$product) {
            LivewireAlert::title('Opps!')
                ->text('Invalid Product Selected.')
                ->warning()
                ->toast()
                ->position('top-end')
                ->show();

            return;
        }
        // dd($product);
        $this->dispatch('increaseCount')->to(CartIcon::class);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        
        return view('livewire.product.single-product');
    }
}
