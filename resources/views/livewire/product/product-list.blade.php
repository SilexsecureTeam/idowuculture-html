<main>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .header-fixed {
            top: 2.5rem;
        }

        .feature-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 per row for large screens */
            gap: 1rem;
            padding: 0 1rem;
        }

        @media (max-width: 1024px) {
            .feature-wrapper {
                grid-template-columns: repeat(2, 1fr);
                /* 2 per row for smaller screens */
            }
        }

        @media (max-width: 640px) {
            .feature-wrapper {
                grid-template-columns: 1fr;
                /* 1 per row for mobile */
            }
        }

        /* Custom feature section layout */
        .feature-section-custom {
            display: flex;
            flex-direction: row;
            gap: 2rem;
            width: 100%;
        }

        /* Filter on the left, product on the right (desktop) */
        .filter-dropdown-container-custom {
            max-width: 260px;
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            margin-bottom: 0;
            display: block;
        }

        .feature-container-custom {
            flex: 1;
            overflow-x: hidden;
            max-height: calc(100vh - 12rem);
            overflow-y: scroll;
            scrollbar-width: thin;
            scrollbar-color: #E0B654 #f0f0f0;
        }

        /* Responsive: stack vertically on small screens */
        @media (max-width: 1024px) {
            .feature-section-custom {
                flex-direction: column;
                gap: 1.5rem;
            }

            .filter-dropdown-container-custom {
                width: 100%;
                margin-bottom: 1rem;
                display: block !important;
            }

            .feature-container-custom {
                max-height: calc(100vh - 16rem);
            }
        }

        /* Hide filter toggle button (not needed anymore) */
        .filter-toggle {
            display: none !important;
        }

        /* Fixed Overlay for buttons */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 0.5rem 0.5rem 0 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover .overlay {
            opacity: 1;
        }

    </style>

    <!-- Feature Section with Dropdown Filter -->
    <section class="w-full mx-auto py-8 px-5 sm:px-10 lg:px-20">
        <!-- Feature Title -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl md:text-[40px] poppins text-black font-semibold">Browse all our products</h2>
            <div class="swiper-pagination"></div>
        </div>
        <!-- Responsive Grid: Filter | Products -->
        <div class="feature-section-custom w-full">
            <!-- Filter (always visible on small, left on large) -->
            <div class="filter-dropdown-container-custom mx-auto" id="filterDropdown">
                <h3 class="poppins font-semibold mb-3">Categories</h3>
                @php
                    $activeClass = 'bg-gray-900 text-white';
                    $inactiveClass = 'bg-gray-100 text-gray-800 hover:bg-gray-200';
                @endphp

                <div class="flex flex-col gap-y-5">
                    <button wire:click="$set('category', 'all')"
                        class="px-5 py-2 rounded-lg inline-flex items-center gap-5 {{ $category == 'all' ? $activeClass : $inactiveClass }}">
                        <span>All Products</span>
                        <span
                            class="{{ $category == 'all' ? 'bg-gray-200 text-gray-900' : 'bg-gray-900 text-gray-200' }} w-5 h-5 rounded-full text-sm inline-flex items-center justify-center">
                            {{ $totalProducts }}
                        </span>
                    </button>
                    @foreach ($categories as $cat)
                        <button wire:click="$set('category', {{ $cat->slug }})"
                            class="px-5 py-2 rounded-lg inline-flex justify-between items-center gap-5 {{ $category == $cat->slug ? $activeClass : $inactiveClass }}">
                            <span>{{ $cat->title }}</span>
                            <span
                                class="{{ $category == $cat->slug ? 'bg-gray-200 text-gray-900' : 'bg-gray-900 text-gray-200' }} w-5 h-5 rounded-full text-sm inline-flex items-center justify-center">
                                {{ $cat->products->count() }}
                            </span>
                        </button>
                    @endforeach
                </div>

            </div>
            <!-- Products -->
            <div class="feature-container-custom">
                <div class="feature-wrapper">
                    @forelse($products as $product)
                        <div
                            class="product-card bg-white rounded-lg shadow-lg min-w-64 w-64 h-full min-h-[25rem] flex-shrink-0 overflow-hidden">
                            <div class="image-container relative">
                                @if (($product->images ?? []) && count($product->images ?? []) > 0)
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}"
                                        class="product-image">
                                @endif

                                <div class="overlay">
                                    <button wire:click="addToCart('{{ $product->sku }}')"
                                        class="bg-blue-600 text-white py-2 px-4 rounded text-sm hover:bg-blue-700 mb-2">
                                        Add to Cart
                                    </button>
                                    <a href="{{ route('product.single.page', $product->sku) }}"
                                        class="bg-white text-gray-800 py-2 px-4 rounded text-sm hover:bg-gray-100">
                                        View Product
                                    </a>
                                </div>
                            </div>

                            <div class="p-4">
                                <div class="text-yellow-400 text-sm mb-1">★★★★★</div>
                                <h3 class="font-semibold mb-2">{{ $product->title }}</h3>
                                <h3 class="text-sm">{!! Str::limit($product->description ?? '', 50) !!}</h3>
                                <div class="flex items-center gap-2 mb-3 pt-2">
                                    <span class="text-md font-bold">NGN{{ number_format($product->price) }}</span>
                                    {{-- <span class="text-sm text-gray-500 line-through">₦200.00</span> --}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500 text-lg">No products found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</main>
