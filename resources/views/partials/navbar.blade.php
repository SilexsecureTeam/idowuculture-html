<!-- Notification -->
<div class="fixed top-0 left-0 w-full z-50">
    <div class="bg-[#E0B654] w-full text-black h-10 flex items-center justify-center relative">
        <div class="noti flex justify-center items-center gap-x-2 w-full text-[12px] sm:text-[14px] font-semibold">
            <i class="fa-solid fa-server"></i>
            
            @if ($discount && isset($discount->percentage))
                <h2 class="flex items-center justify-center gap-x-2">
                    {{ $discount->percentage }}% off storewide — Limited time!
                    <span
                        class="flex items-center gap-x-1 sm:border-b-2 border-b-1 pb-[0.5px] sm:pb-[1px] border-b-black">
                        Shop Now
                        <a href="{{ route('all-products-page') }}">
                            <img src="{{ asset('assets/shopping-cart.png') }}" alt="icon" class="w-4 h-4" />
                        </a>
                    </span>
                </h2>
                
                @else
                    <h2 class="flex items-center justify-center gap-x-2">
                    Have an amazing time shopping
                    <span
                        class="flex items-center gap-x-1 sm:border-b-2 border-b-1 pb-[0.5px] sm:pb-[1px] border-b-black">
                        Shop Now
                        <a href="{{ route('all-products-page') }}">
                            <img src="{{ asset('assets/shopping-cart.png') }}" alt="icon" class="w-4 h-4" />
                        </a>
                    </span>
                </h2>
            @endif
        </div>
        <i class="fa-solid fa-xmark absolute right-2 sm:right-4 top-3 w-3.5 h-3.5 cursor-pointer"></i>
    </div>
</div>

<!-- Header -->
<div class="fixed header-fixed left-0 w-full z-50">
    <div class="flex px-5 sm:px-10 lg:px-20 items-center justify-between h-16 bg-white relative">
        <a href="/">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="h-16" />
        </a>
        <ul class="hidden md:flex justify-between items-center w-full max-w-[330px]">
            <li><a href="/" class="cursor-pointer font-semibold">Home</a></li>
            <li><a href="{{ route('about-page') }}" class="text-[#6C7275] cursor-pointer font-medium">About Us</a></li>
            <li><a href="{{ route('all-products-page') }}" class="text-[#6C7275] cursor-pointer font-medium">Product</a>
            </li>
            <li><a href="{{ route('contact-page') }}" class="text-[#6C7275] cursor-pointer font-medium">Contact Us</a>
            </li>
        </ul>
        <div class="flex gap-x-3 items-center">
            <i class="fas fa-search text-[#141718] text-lg cursor-pointer"></i>
            @livewire('user-dropdown')
            @livewire('cart.cart-icon')
        </div>
        <button id="menuToggle" class="md:hidden ml-2 cursor-pointer" aria-label="Toggle menu">
            <i class="fas fa-bars text-[#141718] text-xl"></i>
        </button>
        <div id="mobileMenu" class="hidden absolute top-full left-0 w-full bg-white shadow-md z-50 md:hidden">
            <ul class="flex flex-col items-center py-4 space-y-2">
                <li><a href="/" class="cursor-pointer font-medium">Home</a></li>
                <li><a href="{{ route('about-page') }}" class="text-[#6C7275] cursor-pointer font-medium">About Us</a>
                </li>
                <li><a href="{{ route('all-products-page') }}"
                        class="text-[#6C7275] cursor-pointer font-medium">Product</a></li>
                <li><a href="{{ route('contact-page') }}" class="text-[#6C7275] cursor-pointer font-medium">Contact
                        Us</a></li>
            </ul>
        </div>
    </div>
</div>
