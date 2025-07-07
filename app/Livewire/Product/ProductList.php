<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    public string $category = 'all';
    public int $totalProducts = 0;

    public function mount(){
        $this->totalProducts = Product::count();
    }
    
    protected $queryString = [
        'category' => ['except' => 'all']
    ];

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
