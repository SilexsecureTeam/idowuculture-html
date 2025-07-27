<main>
    <style>
        .poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <div class="poppins">
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-3 py-3 px-5 sm:px-10 lg:px-20">
            <h2 class="text-black text-base poppins font-normal opacity-60">Home</h2>
            <i class="fa-solid fa-chevron-right" style="font-size:16px"></i>
            <h2 class="text-black text-base poppins font-normal">Checkout</h2>
        </div>

        <!-- Banner Image -->
        <div class="relative w-full h-[50vh] overflow-hidden">
            <div class="absolute inset-0 min-w-[100vw] min-h-[50vh]">
                <img src="/assets/checkout.png" alt="Checkout Banner" class="h-full w-full object-cover object-center"
                    loading="lazy" decoding="async" width="1920" height="600" />
            </div>
        </div>

        <!-- Main Content -->
        <div class="min-h-fit py-6 bg-gray-100 my-15 px-5 sm:px-10 lg:px-20">
            <h1 class="text-3xl font-bold mb-8">Checkout Page</h1>
            <div class="w-full space-x-4 flex flex-col md:flex-row overflow-hidden">
                <!-- Left: Form Section -->
                <div class="flex-1 px-1">
                    <!-- Stepper -->
                    <div class="flex items-center gap-4 mb-8 overflow-x-auto">
                        <div class="flex items-center gap-2 whitespace-nowrap">
                            <div class="rounded-full p-2 bg-yellow-900 text-white"></div>
                            <span class="font-medium text-yellow-900">Shipping Address</span>
                        </div>
                        {{-- <div class="flex items-center gap-2 whitespace-nowrap">
                        <div class="rounded-full p-2 bg-gray-200 text-gray-500"></div>
                        <span class="font-medium text-gray-500">Billing Address</span>
                    </div>
                    <div class="flex items-center gap-2 whitespace-nowrap">
                        <div class="rounded-full p-2 bg-gray-200 text-gray-500"></div>
                        <span class="font-medium text-gray-500">Shipping Methods</span>
                    </div>
                    <div class="flex items-center gap-2 whitespace-nowrap">
                        <div class="rounded-full p-2 bg-gray-200 text-gray-500"></div>
                        <span class="font-medium text-gray-500">Order Details</span>
                    </div> --}}
                    </div>

                    <!-- Livewire Form -->
                    <form wire:submit.prevent="placeOrder" class="grid grid-cols-2 gap-2">
                        {{-- @dd(Auth::user()->firstname) --}}
                        <div class="col-span-2">
                            <label for="name" class="mb-1 text-sm font-medium text-gray-700">Full Name</label>
                            <input wire:model="name" readonly type="text" id="name"
                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-900 transition"
                                placeholder="Full Name">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="email" class="mb-1 text-sm font-medium text-gray-700">Email</label>
                            <input wire:model="email" readonly type="email" id="email"
                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-900 transition"
                                placeholder="Email">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="phone" class="mb-1 text-sm font-medium text-gray-700">Phone</label>
                            <input wire:model="phone" readonly type="text" id="phone"
                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-900 transition"
                                placeholder="Phone">
                            @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="phone" class="mb-1 text-sm font-medium text-gray-700">Address</label>
                            <select wire:model="address" wire:change="locationChanged" id="address"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Select Delivery Location --</option>
                                @foreach ($allLocations as $location)
                                    <option value="{{ $location['address'] }}">{{ $location['address'] }} —
                                        ₦{{ number_format($location['fee']) }}</option>
                                @endforeach
                            </select>
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="name" class="mb-1 text-sm font-medium text-gray-700">Home Address</label>
                            <input wire:model="hAddress" type="text" id="hAddress" name="hAddress"
                                class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-900 transition"
                                placeholder="Full Name" required>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full mt-4 col-span-2">
                            <button type="submit"
                                class="w-full cursor-pointer bg-yellow-900 px-6 text-white py-3 font-semibold hover:bg-yellow-800 transition">Place
                                Order</button>
                        </div>
                    </form>
                </div>

                <!-- Right: Order Summary -->
                <div class="w-full md:max-w-96 flex flex-col justify-between mt-10 md:mt-0">
                    <div>
                        <h2 class="text-3xl border-b border-black font-semibold pb-6">Order Summary</h2>
                        @foreach ($cartItems as $item)
                            <div class="flex justify-between border-b border-gray-400 items-center py-3 text-black">
                                <div>
                                    <p class="font-medium">{{ $item->product->title }}</p>
                                    <small>Qty: {{ $item->quantity }}</small>
                                </div>
                                <div>₦{{ number_format($item->total, 2) }}</div>
                            </div>
                        @endforeach

                        <div class="flex justify-between border-b border-gray-400 items-center py-3 text-black">
                            <span class="font-medium">Subtotal</span>
                            <span>₦{{ number_format($subTotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-400 items-center py-3 text-black">
                            <span class="font-medium">Delivery Fee</span>
                            <span>₦{{ number_format($deliveryFee, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center pt-6 text-lg font-bold text-yellow-900">
                            <span>Total</span>
                            <span>₦{{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->
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
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const locations = @json($allLocations);
            const input = document.getElementById('addressInput');

            const list = locations.map(loc => loc.address);
            const datalist = document.createElement('datalist');
            datalist.id = 'addressList';

            list.forEach(addr => {
                const option = document.createElement('option');
                option.value = addr;
                datalist.appendChild(option);
            });

            input.setAttribute('list', 'addressList');
            document.body.appendChild(datalist);

            input.addEventListener('change', function() {
                const selectedAddress = input.value;
                const match = locations.find(l => l.address === selectedAddress);

                if (match) {
                    Livewire.dispatch('updateAddress', {
                        address: match.address,
                        fee: match.fee,
                    });
                }
            });
        });
    </script>
</main>
