<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProduct extends Component
{
    

    use WithPagination;

    public $search = '';
    public $categoryFilter = '';
    public $sortBy = 'created_at';
    public $sortOrder = 'desc';
    public $showAllProducts = true; // Flag to control if we show all products

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategoryFilter()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    /**
     * Function to display all products (both with and without fabric)
     */
    public function showAllProducts()
    {
        $this->showAllProducts = true;
        $this->resetPage();
    }

    /**
     * Function to display only products with fabric
     */
    public function showFabricProducts()
    {
        $this->showAllProducts = false;
        $this->resetPage();
    }

    /**
     * Clear all filters and show all products
     */
    public function clearFilters()
    {
        $this->search = '';
        $this->categoryFilter = '';
        $this->sortBy = 'created_at';
        $this->sortOrder = 'desc';
        $this->showAllProducts = true;
        $this->resetPage();
    }

   
    public function getAllProducts()
    {
        $query = Product::query();

        
        if (!$this->showAllProducts) {
           
            $query->where('has_fabric', true);
        }
       
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->categoryFilter) {
            $query->where('category_id', $this->categoryFilter);
        }

        return $query->with('category')
                     ->orderBy($this->sortBy, $this->sortOrder)
                     ->paginate(12);
    }
    public function render()
    {
        return view('livewire.all-product');
    }
}
