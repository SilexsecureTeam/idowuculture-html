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
                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="Air Jordan 1 - SS23"
                        class="w-full h-96 object-cover rounded">
                    <span
                        class="absolute top-4 left-4 bg-white text-black px-2 py-1 text-xs font-semibold uppercase">New</span>
                    {{-- @if (isset($discount))
                        <span
                            class="absolute top-4 right-4 bg-green-500 text-black px-2 py-1 text-xs font-semibold uppercase">{{ $percent }}</span>
                    @endif --}}

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
                    @if ($discount)
                        <span class="text-[24px] font-normal text-[#6C7275] line-through mr-2">
                            NGN {{ number_format($originalPrice, 2) }}
                        </span>
                        <span class="text-[24px] font-bold text-[#121212]">
                            NGN {{ number_format($discountedPrice, 2) }}
                        </span>
                    @else
                        <span class="text-[24px] font-bold text-[#121212]">
                            NGN {{ number_format($originalPrice, 2) }}
                        </span>
                    @endif

                    
                </div>
                <div class="mb-6">
                    <h3 class="font-medium text-base text-[#6C7275] mb-2">Choose Color</h3>
                    <div class="flex space-x-4">
                        @foreach ($colors as $col)
                            <button wire:click="$set('color', '{{ $col['color'] }}')"
                                class="inline-block w-8 h-8 rounded-full border border-gray-300 relative"
                                style="background-color: {{ $col['color'] }};">
                                @if ($color == $col['color'])
                                    <span
                                        class="inline-flex justify-center items-center w-4 h-4 p-1 rounded-full bg-black absolute -top-1 -right-0">
                                        <i class="fa-solid fa-check text-white text-xs"></i>
                                    </span>
                                @endif
                                {{-- 
                                TODO: Disable color if quantity is less than 1
                                @if ($col['quantity'] < 1)
                                    <div class="absolute w-full h-full bg-gray-400/50 top-0 left-0 px-5 rounded">
                                    </div>
                                @endif --}}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- If user is buying fabric hide the size --}}
                @if (!$buyFabric)

                    <div class="mb-6">
                        <h3 class="font-medium text-base text-[#6C7275] mb-2">Choose Size</h3>
                        <div class="flex space-x-4">
                            @foreach ($sizes as $s)
                                <div class="flex items-center gap-2 flex-wrap">
                                    <div class="flex items-center gap-1 relative">
                                        {{-- @if ($s['quantity'] < 1)
                                            <div
                                                class="absolute w-full h-full bg-gray-400/50 top-0 left-0 px-5 rounded">
                                            </div>
                                        @endif --}}
                                        <input type="radio" name="size" wire:model.live="size"
                                            id="size-{{ $s['size'] }}" value="{{ $s['size'] }}">
                                        <label for="size-{{ $s['size'] }}"
                                            class="text-sm font-light">{{ $s['size'] }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button class="font-bold text-sm" onclick="toggleSizeModal(true)">
                        Check out our <span class="underline text-lg ">Size Chart</span>
                    </button>

                    {{-- Size Chart Modal --}}
                    <div id="size-modal"
                        class="fixed top-0 left-0 w-full h-full z-50 hidden grid place-content-center transition-opacity duration-300 opacity-0">
                        <div class="bg-slate-900 py-5 px-3 w-full max-w-4xl rounded-lg relative">
                            <!-- Close Button -->
                            <button onclick="toggleSizeModal(false)"
                                class="absolute top-2 right-4 text-white text-xl">&times;</button>

                            <!-- Header -->
                            <div class="heading flex justify-center items-center gap-2">
                                <img src="{{ asset('assets/logo.png') }}" alt="Logo"
                                    class="w-20 h-20 object-contain">
                                <p class="text-lg font-bold text-white">Idowucouture Size Chart</p>
                            </div>

                            <!-- Content -->
                            <div class="content py-3">
                                @php
                                    $sizeChart = [
                                        'SIZES' => [6, 8, 10, 12, 14, 16, 18, 20, 22],
                                        'BUST' => [32, 34, 36, 38, 40, 42, 44, 46, 48],
                                        'UNDER BUST' => [12.5, 13, 13.5, 14.5, 15.5, 16, 17.5, 18, 18.5],
                                        'HALF LENGTH' => [15, 15.75, 16.5, 17.25, 18, 18.75, 19.75, 20.5, 21.25],
                                        'WAIST' => [24, 26, 28, 30, 32, 34, 36, 38, 40],
                                        'HIP' => [36, 38, 40, 42, 44, 46, 48, 50, 52],
                                    ];
                                @endphp

                                <div class="w-full overflow-x-auto">
                                    <table
                                        class="min-w-[650px] border border-gray-300 border-collapse text-white text-xs lg:text-base w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="font-bold border border-gray-400 text-left p-3 text-xs lg:text-base">
                                                    SIZES
                                                </th>
                                                @foreach ($sizeChart['SIZES'] as $value)
                                                    <td
                                                        class="border border-gray-400 text-center p-3 text-xs lg:text-base">
                                                        {{ $value }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sizeChart as $label => $values)
                                                @if ($label !== 'SIZES')
                                                    <tr>
                                                        <th
                                                            class="font-bold border border-gray-400 text-left p-3 text-xs lg:text-base">
                                                            {{ $label }}
                                                        </th>
                                                        @foreach ($values as $value)
                                                            <td
                                                                class="border border-gray-400 text-center p-3 text-xs lg:text-base">
                                                                {{ is_float($value) ? number_format($value, 2) : $value }}
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

                @if ($product->has_fabric && !empty($product->fabrics))
                    <div class="mb-6">
                        <h3 class="font-medium text-base text-[#6C7275] mb-2">Fabric</h3>
                        <div class="block space-x-4">
                            <div class="flex items-center gap-1 relative">
                                <input type="checkbox" wire:model.live="buyFabric" id="buy-fabric"
                                    value="{{ $buyFabric }}">
                                <label for="buy-fabric" class="text-sm font-light">Buy Fabric </label>
                            </div>

                            @if ($buyFabric)
                                <div class="mb-4">
                                    <label for="selectedFabric" class="text-sm font-semibold mb-1 block">Choose
                                        Fabric</label>
                                    <select wire:model.live="fabric_id" id="selectedFabric"
                                        class="border p-2 w-full rounded">
                                        @foreach ($product->fabrics as $index => $fabric)
                                            <option value="{{ $fabric['id'] }}">
                                                Fabric {{ $index + 1 }} - NGN
                                                {{ number_format($fabric['fabric_price']) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Show fabric image preview -->
                                @php
                                    $fabric = collect($product->fabrics)->first(fn($item) => $item['id'] == $fabric_id);
                                    $imagePath = $fabric['fabrics_image'][0] ?? null;
                                @endphp

                                @if ($fabric && $imagePath)
                                    <div x-data="{ showModal: false }" class="mt-4 relative">
                                        <h4 class="text-sm font-medium mb-1">Preview</h4>

                                        <!-- Thumbnail Image -->
                                        <img src="{{ asset('storage/' . $imagePath) }}" alt="Fabric Image"
                                            class="w-20 h-20 object-cover border rounded shadow cursor-pointer hover:scale-105 transition"
                                            @click="showModal = true">
                                        <p class="text-gray-400 italic">click on the fabric to have a full view</p>

                                        <!-- Fullscreen Modal -->
                                        <div x-show="showModal" x-transition x-cloak
                                            @keydown.escape.window="showModal = false"
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 backdrop-blur-sm">
                                            <div class="relative max-w-3xl w-full px-4">
                                                <!-- Full Image -->
                                                <img src="{{ asset('storage/' . $imagePath) }}"
                                                    class="w-full max-h-[90vh] object-contain rounded-lg shadow-xl"
                                                    alt="Full Fabric Image">

                                                <!-- Close Button -->
                                                <button @click="showModal = false"
                                                    class="absolute top-4 right-4 text-white text-3xl font-bold hover:text-red-400">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endif
                        </div>
                    </div>
                @endif
                {{-- <div class="flex gap-x-3 items-center w-full mb-5">
                    <div class="flex rounded-lg p-1 bg-[#F5F5F5] w-fit items-center space-x-4">
                        <button onclick="updateQuantity(-1)" class="p-2"><i class="fas fa-minus"
                                style="font-size: 16px;"></i></button>
                        <span id="quantity" class="text-lg poppins font-medium">8</span>
                        <button onclick="updateQuantity(1)" class="p-2"><i class="fas fa-plus"
                                style="font-size: 16px;"></i></button>
                    </div>
                </div> --}}
                @php
                    $disabled = false;
                    $sizeAvailable = false;
                    $colorAvailable = false;

                    if (count($sizes) > 0) {
                        $sizeAvailable = true;
                    }
                    if (count($colors) > 0) {
                        $colorAvailable = true;
                    }

                    if (($sizeAvailable && !$size && !$buyFabric) || ($colorAvailable && !$color)) {
                        $disabled = true;
                    }
                @endphp
                <button @disabled($disabled) wire:click="addToCart('{{ $product->sku }}')"
                    class="md:col-4 py-3 mb-2 bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform {{ !$disabled ? 'hover:scale-100' : 'hover:animate-bounce' }} cursor-pointer w-full text-center text-white rounded-md">
                    <span wire:loading wire:target="addToCart" class="fa-solid fa-refresh animate-spin mr-1"></span>
                    Add to Cart
                </button>
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

        function toggleSizeModal(show) {
            const modal = document.getElementById('size-modal');

            if (show) {
                // Create and append backdrop
                const backdrop = document.createElement('div');
                backdrop.id = 'size-modal-backdrop';
                backdrop.className = 'fixed inset-0 bg-black/40 z-40';
                document.body.appendChild(backdrop);

                // Show modal with fade in
                modal.classList.remove('hidden', 'opacity-0');
                modal.classList.add('opacity-100');
            } else {
                // Remove backdrop if it exists
                const backdrop = document.getElementById('size-modal-backdrop');
                if (backdrop) backdrop.remove();

                // Fade out modal
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0');

                // Hide modal after animation completes
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300); // must match transition duration
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderProduct();
            updateCartIcon();
        });
    </script>
</main>
