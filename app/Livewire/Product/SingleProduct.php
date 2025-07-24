<?php

namespace App\Livewire\Product;

use App\Livewire\Cart\CartIcon;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public $color;
    public $size;
    public $buyFabric = false;
    public $fabricPrice = false;
    public $sizes = [];
    public $colors = [];
    public $currentPrice;
    public $availableSizeQuantity = 1;
    public $fabric_id = 0;
    public $mainImageIndex = 0;
    // discount price
    public $originalPrice;
    public $discountedPrice;

    public function mount($sku)
{
    $this->product = Product::whereSku($sku)->firstOrFail();

    $this->sizes = $this->product->sizes;
    $this->colors = $this->product->colors;

    $this->originalPrice = $this->product->price;
    $price = $this->originalPrice;

    $discount = Discount::where('is_active', true)->first();
    // dd($discount);
    if ($discount) {
        $discountAmount = $this->product->price * $discount->percentage / 100;
        $this->discountedPrice = $discountAmount;
    }else{
        $this->discountedPrice = 0;
    }
    
    $this->currentPrice = $price;

    if ($this->product->has_fabric) {
        $this->fabricPrice = $this->product->fabric_price;
        if ($this->product->fabrics) {
            $this->fabric_id = collect($this->product->fabrics)->first()['id'];
        }
    }
}

    public function updated($property, $value)
    {
        // if ($property == 'size') {
        //     $size = null;
        //     foreach ($this->sizes as $s) {
        //         if ($s['size'] == $value) {
        //             $size = $s;
        //         }
        //     }


        //     $this->currentPrice = isset($size['price']) && !empty($size['price']) ? $size['price'] : $this->product->price;
        //     // dd($this->currentPrice, $size);
        // }
    }

    public function addToCart($sku)
    {
        $product = Product::whereSku($sku)->first();
        $pPrice = $product->price;

        $discount = Discount::where('is_active', true)->first();
        if ($discount) {
            $pPrice = ($product->price * $discount->percentage / 100);
            // dd($pPrice);
        }

        if (!$product) {
            LivewireAlert::title('Oops!')
                ->text('Invalid Product Selected.')
                ->warning()
                ->toast()
                ->position('top-end')
                ->show();
            return;
        }

        $sessionId = Session::get('cart-session') ?? mt_rand() . time();
        Session::put('cart-session', $sessionId);

        // Get fabric details if selected
        $fabricData = null;
        $fabricPrice = 0;

        if ($this->buyFabric && $this->fabric_id ?? null) {
            // $index = $this->fabric_id;

            // if (isset($product->fabrics[$index])) {
            //     $fabricData = $product->fabrics[$index];
            //     $fabricPrice = (float)($fabricData['fabric_price'] ?? 0);
            // }

            $fabric = collect($product->fabrics)->firstWhere('id', $this->fabric_id);

            if ($fabric) {
                $fabricData = $fabric;
                $fabricPrice = (float)($fabric['fabric_price'] ?? 0);
            }
        }

        // Check for duplicates
        $checkExist = Cart::where('product_id', $product->id)
            ->where('session_id', $sessionId)
            ->when(Auth::check(), fn($q) => $q->orWhere('user_id', Auth::id()))
            ->where('size', $this->size)
            ->where('color', $this->color)
            ->where('buy_fabric', $this->buyFabric)
            ->when($this->buyFabric, function ($query) {
                return $query->where('fabric_id', $this->fabric_id);
            });

        if ($checkExist->exists()) {
            $checkExist->increment('quantity');
            return LivewireAlert::title('Success!')
                ->text('Item quantity increased in cart.')
                ->success()
                ->toast()
                ->position('top-end')
                ->show();
        }

        try {
            $cart = new Cart();
            $cart->session_id = $sessionId;
            $cart->user_id = Auth::check() ? Auth::id() : null;
            $cart->product_id = $product->id;
            $cart->color = $this->color;
            $cart->size = $this->buyFabric ? null : $this->size;
            $cart->buy_fabric = $this->buyFabric;
            $cart->fabric_id = $this->fabric_id ?? null;
            $cart->selected_fabric = $fabricData; // Cast to array in Cart model
            $cart->quantity = 1;
            $cart->total = ($pPrice + $fabricPrice);
            // dd($cart->total);

            $cart->save();

            $this->dispatch('increaseCount')->to(CartIcon::class);

            LivewireAlert::title('Success!')
                ->text('Item added to cart.')
                ->success()
                ->toast()
                ->position('top-end')
                ->show();
        } catch (\Throwable $th) {
            Log::error('Failed to add to cart: ' . $th->getMessage());
            LivewireAlert::title('Oops!')
                ->text('Failed to add item to cart.')
                ->error()
                ->toast()
                ->position('top-end')
                ->show();
        }
    }


    public function updatedSelectedFabricIndex()
    {
        $this->mainImageIndex = 0;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.product.single-product');
    }
}
