<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{


    public function render()
    {
    //    $query = Product::query();
        $products = Product::whereIsFeatured(true)->latest()->take(9)->get();
        $categories = Category::all()->sortBy('title');
        // dd($products);

        return view('livewire.product-index', compact('products', 'categories'));


    }
}