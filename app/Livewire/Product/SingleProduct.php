<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;

    public function mount($sku)
    {
        $this->product = Product::whereSku($sku)->firstOrFail();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.product.single-product');
    }
}
