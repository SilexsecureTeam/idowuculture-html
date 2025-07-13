<?php

namespace App\Livewire\Product;

use App\Livewire\Cart\CartIcon;
use App\Models\Cart;
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

    public function mount($sku)
    {
        $this->product = Product::whereSku($sku)->firstOrFail();
        // Default current price is product price
        $this->currentPrice = $this->product->price;
        $this->sizes = $this->product->sizes; // [['size', 'quantity', 'price']]
        $this->colors = $this->product->colors; // [['color', 'quantity']]

        if ($this->product->has_fabric) {
            $this->fabricPrice = $this->product->fabric_price;
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
        if (!$product) {
            LivewireAlert::title('Opps!')
                ->text('Invalid Product Selected.')
                ->warning()
                ->toast()
                ->position('top-end')
                ->show();

            return;
        }

        $sessionId = mt_rand() . time();
        if (!Session::get('cart-session')) {
            Session::put('cart-session', $sessionId);
        } else {
            $sessionId = Session::get('cart-session');
        }

        $checkExist = Cart::where('product_id', $product->id)
            ->where('session_id', $sessionId)
            ->when(Auth::check(), fn($q) => $q->orWhere('user_id', Auth::id()))
            ->where('size', $this->size)
            ->where('color', $this->color)
            ->where('buy_fabric', $this->buyFabric);

        if ($checkExist->exists()) {
            $checkExist->increment('quantity');
            return LivewireAlert::title('Success!')
                ->text('Item added to cart.')
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
            $cart->size = (bool)$this->buyFabric ? null : $this->size;
            $cart->buy_fabric = (bool)$this->buyFabric;
            $cart->total = (bool)$this->buyFabric ? $product->fabric_price :$product->price;

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
            LivewireAlert::title('Opps!')
                ->text('Failed to add item to cart.')
                ->error()
                ->toast()
                ->position('top-end')
                ->show();
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {

        return view('livewire.product.single-product');
    }
}
