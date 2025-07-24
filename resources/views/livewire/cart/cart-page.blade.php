<main>
    <style>
        .poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <div class="px-5 sm:px-10 lg:px-20">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-x-1  font-normal  text-black text-[16px]">
            <h1 class="opacity-60 flex items-center">
                <a href="/" class="hover:underline">Home</a>
                <i class="fas fa-chevron-right ml-1" style="font-size: 15px;"></i>
            </h1>
            <span>Cart</span>
        </div>

        <div class="mx-auto w-full pb-6 pt-3 flex-grow">
            <h1 class="md:text-[40px] text-xl font-bold mb-5">Your cart</h1>



            <div id="cart-content" class="flex flex-col lg:flex-row gap-5 gap-x-5">

                <!-- Cart Items -->
                <div id="cart-items"
                    class="flex-1 bg-white h-[385px] overflow-y-auto cartshadow px-4 py-1 rounded-xl border border-gray-100">
                    @forelse ($cartItems as $cart)
                        <div class="border-b border-b-gray-200 flex items-center gap-x-2 py-3">
                            {{-- @dump($cart->product) --}}
                            <a href="{{ route('product.single.page', ['sku' => $cart->product->sku]) }}">
                                <img src="{{ asset('storage/' . $cart->product->images[0]) }}" alt="G/FORE - Mens 2023"
                                    class="w-20 h-22 rounded-sm object-cover" loading="lazy">
                            </a>
                            <div class="flex-1">
                                <div class="flex items-center justify-between w-full">
                                    <a href="{{ route('product.single.page', ['sku' => $cart->product->sku]) }}"
                                        class="font-bold text-sm md:text-[20px] text-black hover:text-yellow-500">
                                        {{ $cart->product->title }}
                                    </a>
                                    <button wire:click="removeItem('{{ $cart->id }}')"
                                        class="text-red-500 cursor-pointer hover:text-red-700" title="Remove">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                                <div class="text-sm text-black font-normal flex flex-col gap-y-2 mt-3">
                                    @if ($cart->size)
                                        <p class="flex items-center gap-x-2 m-0">
                                            <span>Size:</span>
                                            <span class="opacity-60">{{ $cart->size }}</span>
                                        </p>
                                    @endif

                                    @if ($cart->color)
                                        <p class="flex items-center gap-x-2">
                                            <span>Color:</span>
                                            <span
                                                class="inline-block w-4 h-4 rounded-full border border-gray-300 relative"
                                                style="background-color: {{ $cart->color }};">
                                            </span>
                                        </p>
                                    @endif
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    <div class="font-bold mt-1">₦{{ number_format($cart->total, 2) }}</div>
                                    <div class="flex items-center p-1 px-1.5 bg-[#F0F0F0] rounded-2xl gap-x-3">
                                        <button class="w-[20px] cursor-pointer"
                                            wire:click="decreaseQty('{{ $cart->id }}')">-</button>
                                        <span class="text-[15px]"> {{ $cart->quantity }} </span>
                                        <button class="w-[20px] cursor-pointer"
                                            wire:click="increaseQty('{{ $cart->id }}')">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 py-10 px-5">
                            <i class="fa-solid fa-shopping-cart text-2xl text-gray-400"></i>
                            <p>
                                Your cart is empty.
                            </p>
                            <a href="{{ route('all-products-page') }}"
                                class=" flex justify-center gap-x-2 cursor-pointer bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-100 text-white py-3 rounded-lg mt-4 font-semibold">
                                Continue Shopping </a>
                        </div>
                    @endforelse
                </div>

                <!-- Order Summary -->
                <div class="w-full lg:min-w-1/3 lg:w-fit bg-white cartshadow rounded-xl p-6 border border-gray-100">
                    <h2 class="font-bold text-2xl mb-4">Order Summary</h2>



                    @if ($discount && isset($discount->percentage))
                        <div class="flex justify-between py-1">
                            <span class="text-[20px] opacity-60 font-medium">Discount
                                (-{{ $discount->percentage }}%)</span>
                            {{-- <span id="discount" class="text-[#FF3333] text-[20px] font-bold">-₦0.00</span> --}}
                        </div>
                    @endif

                    <div class="flex justify-between py-1">
                        <span class="text-[20px] opacity-60 font-medium">Subtotal</span>
                        <span id="subtotal" class="text-[20px] font-bold">
                            <i class="fa-solid fa-refresh animate-spin" wire:loading></i>
                            <span wire:loading.remove>
                                ₦ {{($subTotal) }}
                            </span>
                        </span>
                    </div>


                    <div class="flex justify-between py-1">
                        <span class="text-[20px] opacity-60 font-medium">Delivery Fee</span>
                        <span id="delivery" class="text-[20px] font-bold">₦15.00</span>
                    </div>

                    <div class="border-t border-t-gray-300 my-2"></div>

                    <div class="flex justify-between font-bold text-lg py-1">
                        <span class="text-[20px] font-medium">Total</span>
                        <span id="total">₦{{ number_format($total, 2) }}</span>
                    </div>

                    {{-- <div class="flex w-full px-4 justify-center mt-4 gap-2">
                        <input id="promo-code" type="text" placeholder="Add promo code"
                            class="md:flex-1 w-full px-3 py-2 bg-[#F0F0F0] rounded-4xl text-black outline-none placeholder:text-[#6C7275]" />
                        <button id="apply-promo"
                            class="bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 text-16 rounded-4xl cursor-pointer text-white px-4 md:px-6 py-2">
                            Apply
                        </button>
                    </div> --}}

                    <a href="/checkout">
                        <button
                            class="w-full flex justify-center gap-x-2 cursor-pointer bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 text-white py-3 rounded-4xl mt-4 font-semibold">
                            Go to Checkout
                            <i class="fas fa-arrow-right w-[30px] ml-2"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Seventh Section: Newsletter (Secondletter Component) -->
    <div class="my-20 px-5 sm:px-10 lg:px-20">
        <div class="bg-black w-full text-white md:p-8 py-5 my-8 rounded-xl flex items-center justify-between">
            <div class="flex w-full flex-col md:flex-row items-center justify-between gap-4 px-4">
                <div class="text-2xl md:text-[40px] font-bold max-w-[551px] text-center md:text-left">
                    STAY UPTO DATE ABOUT OUR LATEST OFFERS
                </div>
                <form class="flex flex-col gap-2 max-w-[350px] w-full">
                    <div class="relative">
                        <input type="email" placeholder="Enter your email address"
                            class="px-4 pl-8 py-3 rounded-3xl bg-white max-w-[350px] w-full outline-none text-black flex-1">
                        <i class="fas fa-envelope absolute left-2 text-black opacity-80 w-[20px] top-3"></i>
                    </div>
                    <button
                        class="bg-white text-black max-w-[350px] w-full px-4 py-3 rounded-3xl font-semibold hover:bg-gray-200 transition">
                        Subscribe to Newsletter
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        const deliveryFee = 15;
        const discountPercent = 0.2; // 20% discount

        // Elements
        const cartItemsContainer = document.getElementById("cart-items");
        const cartEmptyMessage = document.getElementById("cart-empty-message");
        const subtotalEl = document.getElementById("subtotal");
        const discountEl = document.getElementById("discount");
        const deliveryEl = document.getElementById("delivery");
        const totalEl = document.getElementById("total");
        const promoInput = document.getElementById("promo-code");
        const applyPromoBtn = document.getElementById("apply-promo");

        function renderCart() {
            cartItemsContainer.innerHTML = "";

            if (cart.length === 0) {
                cartEmptyMessage.classList.remove("hidden");
                cartItemsContainer.style.display = "none";
                document.querySelector("#cart-content").style.display = "none";
                return;
            } else {
                cartEmptyMessage.classList.add("hidden");
                cartItemsContainer.style.display = "block";
                document.querySelector("#cart-content").style.display = "flex";
            }

            cart.forEach((item, index) => {
                const borderClass = index < cart.length - 1 ? "border-b border-b-gray-200" : "";
                const itemDiv = document.createElement("div");
                itemDiv.className = `${borderClass} flex items-center gap-x-2 py-3`;

                const img = document.createElement("img");
                img.src = item.image;
                img.alt = item.name;
                img.className = "w-20 h-22 rounded-sm object-cover";
                img.loading = "lazy";

                const detailsDiv = document.createElement("div");
                detailsDiv.className = "flex-1";

                const topRow = document.createElement("div");
                topRow.className = "flex items-center justify-between w-full";

                const nameDiv = document.createElement("div");
                nameDiv.className = "font-bold text-sm md:text-[20px] text-black";
                nameDiv.textContent = item.name;

                const removeBtn = document.createElement("button");
                removeBtn.className = "text-red-500 cursor-pointer hover:text-red-700";
                removeBtn.title = "Remove";
                removeBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                removeBtn.addEventListener("click", () => removeFromCart(item.id));

                topRow.appendChild(nameDiv);
                topRow.appendChild(removeBtn);

                const infoDiv = document.createElement("div");
                infoDiv.className = "text-sm text-black font-normal";
                infoDiv.innerHTML =
                    `Size: <span class="opacity-60">${item.size || "N/A"}</span><br />Color: <span class="opacity-60">${item.color || "N/A"}</span>`;

                const bottomRow = document.createElement("div");
                bottomRow.className = "flex items-center justify-between w-full";

                const priceDiv = document.createElement("div");
                priceDiv.className = "font-bold mt-1";
                priceDiv.textContent = `₦${item.price.toFixed(2)}`;

                const qtyControls = document.createElement("div");
                qtyControls.className = "flex items-center p-1 px-1.5 bg-[#F0F0F0] rounded-2xl gap-x-3";

                const btnMinus = document.createElement("button");
                btnMinus.className = "w-[20px] cursor-pointer";
                btnMinus.textContent = "-";
                btnMinus.addEventListener("click", () => updateQty(item.id, -1));

                const qtySpan = document.createElement("span");
                qtySpan.className = "text-[15px]";
                qtySpan.textContent = item.qty;

                const btnPlus = document.createElement("button");
                btnPlus.className = "w-[20px] cursor-pointer";
                btnPlus.textContent = "+";
                btnPlus.addEventListener("click", () => updateQty(item.id, 1));

                qtyControls.appendChild(btnMinus);
                qtyControls.appendChild(qtySpan);
                qtyControls.appendChild(btnPlus);

                bottomRow.appendChild(priceDiv);
                bottomRow.appendChild(qtyControls);

                detailsDiv.appendChild(topRow);
                detailsDiv.appendChild(infoDiv);
                detailsDiv.appendChild(bottomRow);

                itemDiv.appendChild(img);
                itemDiv.appendChild(detailsDiv);

                cartItemsContainer.appendChild(itemDiv);
            });

            updateSummary();
        }

        function updateSummary() {
            const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
            const discount = Math.round(subtotal * discountPercent);
            const total = subtotal - discount + deliveryFee;

            subtotalEl.textContent = `₦${subtotal.toFixed(2)}`;
            discountEl.textContent = `-₦${discount.toFixed(2)}`;
            deliveryEl.textContent = `₦${deliveryFee.toFixed(2)}`;
            totalEl.textContent = `₦${total.toFixed(2)}`;
        }

        applyPromoBtn.addEventListener("click", () => {
            const code = promoInput.value.trim();
            if (code) {
                alert(`Promo code "${code}" applied (functionality to be implemented).`);
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            renderCart();
            updateCartIcon();
        });
    </script> --}}
</main>
