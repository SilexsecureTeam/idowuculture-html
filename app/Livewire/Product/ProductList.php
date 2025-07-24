<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    
    #[Url(except: 'all')]
    public string $category = 'all';

    // #[Url(except: 0)]
    // public int $minPrice = 0;

    // #[Url(except: 0)]
    // public int $maxPrice = 0;

    public int $totalProducts = 0;

    public function mount()
    {
        $product = Product::query();
        $this->totalProducts = $product->count();
        // $this->maxPrice = $product->max('price');
    }

    public function addToCart(Product $product)
    {
        if (!$product) {
            LivewireAlert::title('Opps!')
                ->text('Invalid Product Selected.')
                ->warning()
                ->toast()
                ->position('top-end')
                ->show();
        }
    }
    #[Layout('layouts.app')]
    #[Title('View Products')]
    public function render()
    {
        $categories = Category::all();
        $products = Product::query()
            ->when($this->category != 'all', function ($query) {
                $query->whereHas('category', fn($q) => $q->where('slug', $this->category));
            })
            ->latest()
            ->paginate(12);

        return view('livewire.product.product-list', compact('categories', 'products'));
    }
}
