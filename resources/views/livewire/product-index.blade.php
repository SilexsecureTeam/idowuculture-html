<div>
    <section class="w-full mx-auto py-8 px-5 sm:px-10 lg:px-20">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Featured Products</h2>
                <div class="flex gap-2">
                    <button id="prevBtn" class="bg-white shadow-lg rounded-full p-2 hover:bg-gray-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button id="nextBtn" class="bg-white shadow-lg rounded-full p-2 hover:bg-gray-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="relative">
                <div id="productContainer" class="flex gap-4 overflow-x-auto scrollbar-hide pb-4">
                    <!-- Product Template (repeated 5 times) -->
                    @forelse($products as $product)
                        <div
                            class="product-card bg-white rounded-lg shadow-lg min-w-64 w-64 h-full min-h-[25rem] flex-shrink-0 overflow-hidden">
                            <div class="relative">

                                @if (($product->images ?? []) && count($product->images ?? []) > 0)
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}"
                                        class="w-64 h-52 object-cover">
                                @endif

                                <div class="hover-overlay">
                                    <button wire:click="addToCart('{{ $product->sku }}')"
                                        class="bg-blue-600 text-white py-2 px-4 rounded text-sm hover:bg-blue-700 mb-2">Add
                                        to Cart</button>
                                    <a href="{{ route('product.single.page', $product->sku) }}"
                                        class="bg-white text-gray-800 py-2 px-4 rounded text-sm hover:bg-gray-100">View
                                        Product</a>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="text-yellow-400 text-sm mb-1">★★★★★</div>
                                <h3 class="font-semibold mb-2">{{ $product->title }}</h3>
                                <h3 class="text-sm">{!! Str::limit($product->description ?? '', 50) !!}</h3>
                                <div class="flex items-center gap-2 mb-3 pt-2">
                                    <span class="text-md font-bold">NGN{{ $product->price }}</span>
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
                <div class="allproduct float-right bg-black p-2 round text-white rounded-xl">
                    <button>All Products</button>
                </div>
            </div>
    </section>
</div>
