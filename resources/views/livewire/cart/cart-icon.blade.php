    <button id="cartBtn" class="relative">
        <a href="{{ route('cart-page') }}" title="cart">
            <i class="fas fa-shopping-bag text-[#141718] text-lg cursor-pointer"></i>
            @if ($cartCount > 0)
                <div
                    class="absolute bg-black text-white text-[10px] h-4 w-4 rounded-full flex items-center justify-center top-0 -right-2">
                    {{ $cartCount }}
                </div>
            @endif
        </a>
    </button>
