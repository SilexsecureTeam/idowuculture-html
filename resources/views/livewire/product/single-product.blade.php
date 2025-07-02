<main>
    <div class="px-5 sm:px-10 lg:px-20 py-8 pt-26">
        <nav class="flex items-center gap-x-2 text-sm mb-6">
            <a href="index.html" class="text-[#605F5F]">Home</a>
            <i class="fas fa-chevron-right text-gray-400" style="font-size: 10px;"></i>
            <a href="product.html" class="text-[#605F5F] font-medium">Product</a>
            <i class="fas fa-chevron-right text-gray-400" style="font-size: 10px;"></i>
            <span id="product-title" class="text-black font-medium">{{ $product->title }}</span>
        </nav>
        <div id="product-content" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div class="relative">
                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="Air Jordan 1 - SS23" class="w-full h-96 object-cover rounded">
                    <span
                        class="absolute top-4 left-4 bg-white text-black px-2 py-1 text-xs font-semibold uppercase">New</span>
                    <span
                        class="absolute top-4 right-4 bg-green-500 text-black px-2 py-1 text-xs font-semibold uppercase">-50%</span>
                </div>
            </div>
            <div>
                <div class="flex items-center mb-2">
                    <div class="flex">
                        <i class="fa-solid fa-star text-yellow-400"></i><i
                            class="fa-solid fa-star text-yellow-400"></i><i
                            class="fa-solid fa-star text-yellow-400"></i><i
                            class="fa-solid fa-star text-yellow-400"></i><i
                            class="fa-solid fa-star text-yellow-400"></i>
                    </div>
                    <span class="ml-2 text-[12px] font-normal text-[#141718] poppins">5 Reviews</span>
                </div>
                <h1 class="text-2xl md:text-[40px] font-normal poppins text-[#141718] mb-3">{{ $product->title }}</h1>
                <p class="text-[#6C7275] text-base font-normal mb-4">{!! Str::limit($product->description ?? '', 50) !!}</p>
                <div class="flex items-center mb-4">
                    <span class="text-[24px] font-bold text-[#121212] mr-4">NGN
                        {{ number_format($product->price) }}</span>
                    <span class="text-[24px] font-normal text-[#6C7275] line-through">₦200.00</span>
                </div>
                <div class="mb-6">
                    <h3 class="font-medium text-base text-[#6C7275] mb-2">Choose Color</h3>
                    <p class="mt-2 text-sm text-[#6C7275] mb-2">Selected: <span id="selected-color-text">Black</span>
                    </p>
                    <div class="flex space-x-4">
                        <img src="/assets/fimage6.jpg" alt="Black"
                            class="w-8 h-8 rounded-md border cursor-pointer ring-2 ring-offset-1 ring-black"
                            data-color="black" onclick="selectColor('black')">
                        <img src="/assets/fimage6.jpg" alt="Gray"
                            class="w-8 h-8 rounded-md border cursor-pointer ring-1 ring-gray-200" data-color="gray"
                            onclick="selectColor('gray')">
                        <img src="/assets/fimage6.jpg" alt="Red"
                            class="w-8 h-8 rounded-md border cursor-pointer ring-1 ring-gray-200" data-color="red"
                            onclick="selectColor('red')">
                        <img src="/assets/fimage6.jpg" alt="White"
                            class="w-8 h-8 rounded-md border cursor-pointer ring-1 ring-gray-200" data-color="white"
                            onclick="selectColor('white')">
                    </div>
                </div>
                <div class="flex gap-x-3 items-center w-full mb-5">
                    <div class="flex rounded-lg p-1 bg-[#F5F5F5] w-fit items-center space-x-4">
                        <button onclick="updateQuantity(-1)" class="p-2"><i class="fas fa-minus"
                                style="font-size: 16px;"></i></button>
                        <span id="quantity" class="text-lg poppins font-medium">8</span>
                        <button onclick="updateQuantity(1)" class="p-2"><i class="fas fa-plus"
                                style="font-size: 16px;"></i></button>
                    </div>
                </div>
                <button wire:click="addToCart('{{ $product->sku }}')"
                    class="md:col-4 py-3 mb-2 bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 cursor-pointer w-full text-center text-white rounded-md">Add
                    to Cart</button>
            </div>
        </div>
    </div>

    <script>
        let quantity = 1;
        let selectedColor = 'black';

        function selectColor(color) {
            selectedColor = color;
            document.querySelector('#selected-color-text').textContent = color.charAt(0).toUpperCase() + color.slice(1);
            document.querySelectorAll('[data-color]').forEach(img => {
                img.className =
                    `w-8 h-8 rounded-md border cursor-pointer ${img.dataset.color === color ? 'ring-2 ring-offset-1 ring-black' : 'ring-1 ring-gray-200'}`;
            });
        }

        function updateQuantity(change) {
            quantity = Math.max(1, quantity + change);
            document.querySelector('#quantity').textContent = quantity;
        }


        document.addEventListener('DOMContentLoaded', () => {
            renderProduct();
            updateCartIcon();
        });
    </script>
</main>
