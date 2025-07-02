<?php

namespace App\Livewire;

use App\Livewire\Cart\CartIcon;
use App\Models\Product;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{

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

    public function render()
    {
        //    $query = Product::query();
        $products = Product::whereIsFeatured(true)->latest()->take(9)->get();
        $categories = Category::all()->sortBy('title');
        // dd($products);

        return view('livewire.product-index', compact('products', 'categories'));
    }
}
