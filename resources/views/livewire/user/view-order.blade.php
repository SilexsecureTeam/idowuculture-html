<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .print-area,
        .print-area * {
            visibility: visible;
        }

        .print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
        }

        .no-print {
            display: none !important;
        }
    }
</style>

<div class="pb-4">
    <div class="print-area p-6 max-w-4xl mx-auto bg-white rounded-lg shadow-lg border border-gray-300">
        <!-- Header -->
        <div class="mb-6 text-center">
            <img src="{{ asset('assets/logo.png') }}" alt="Company Logo">
            <h1 class="text-3xl font-bold text-gray-800">Transaction Receipt</h1>
            <p class="text-sm text-gray-500">Order Reference: <span class="font-semibold">{{ $order->reference }}</span>
            </p>
        </div>
        <div class="flex justify-between mb-4">
            <div>
                <a href="{{ route('user.dashboard') }}"
                    class="inline-flex items-center justify-center w-10 h-10 mt-4 bg-black text-white rounded-full hover:bg-gray-800 transition duration-300">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                Back
            </div>

            <button onclick="window.print()"
                class="bg-black text-white px-2 rounded hover:bg-gray-800 transition text-sm">
                🖨️ Print Receipt
            </button>
        </div>

        <!-- Customer Info -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Customer Details</h2>
            <div class="text-sm text-gray-600 space-y-1">
                <p><strong>Username:</strong> {{ $order->user->firstname . ' ' . $order->user->lastname ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                <p><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Address Info -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Delivery Address</h2>
            <p class="text-sm text-gray-600">{{ $order->address ?? 'N/A' }}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Home Address</h2>
            <p class="text-sm text-gray-600">{{ $order->home_address ?? 'N/A' }}</p>
        </div>

        <!-- Order Info -->
        <div class="mb-6 overflow-x-auto">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Order Summary</h2>
            <p class="text-sm text-gray-500 mb-3">Order Date: {{ $order->created_at->format('M d, Y H:i A') }}</p>

            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr class="">
                        <th class="px-4 py-2 center-left">Product</th>
                        <th class="px-4 py-2 center-left">Details</th>
                        <th class="px-4 py-2 center-left">Product Price</th>
                        <th class="px-4 py-2 center-left">Fabric Price</th>
                        <th class="px-4 py-2 center-left">Fabric</th>
                        <th class="px-4 py-2 center-right">Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($order->items as $item)
                        <tr>
                            <!-- Product Image & Name -->
                            <td class="px-4 py-3 whitespace-nowrap flex items-center gap-3">
                                @if (!empty($item->product->images))
                                    <img src="{{ asset('storage/' . $item->product->images[1]) }}"
                                        alt="{{ $item->product->title }}"
                                        class="w-12 h-12 object-cover rounded-md border" />
                                @else
                                    <img src="{{ asset('images/default-product.png') }}" alt="No image"
                                        class="w-12 h-12 object-cover rounded-md border" />
                                @endif
                                <div class="text-sm font-medium text-gray-800">
                                    {{ $item->product->title ?? 'N/A' }}
                                </div>
                            </td>

                            <!-- Size, Quantity, Color -->
                            <td class="px-4 py-3 text-gray-600">
                                Qty: {{ $item->quantity }} <br>
                                Size: {{ $item->size ?? 'non selected' }} <br>
                                Color:
                                <span class="inline-block w-4 h-4 rounded-full border border-gray-300 align-middle"
                                    style="background-color: {{ $item->color }};"></span>
                            </td>

                            <!-- Product Price -->
                            <td class="px-4 py-3">
                                @if (!empty($item->fabric_id) && !empty($item->selected_fabric['fabrics_image'][0]))
                                    {{ number_format($item->price - $item->selected_fabric['fabric_price']) }}
                                @else
                                    {{ number_format($item->price) }}
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                @if (!empty($item->fabric_id) && !empty($item->selected_fabric['fabric_price']))
                                    {{ number_format($item->selected_fabric['fabric_price']) }}
                                @else
                                    <span class="text-gray-400 italic">No fabric</span>
                                @endif
                            </td>



                            <!-- Fabric -->
                            <td class="px-4 py-3">
                                @if (!empty($item->fabric_id) && !empty($item->selected_fabric['fabrics_image'][0]))
                                    <img src="{{ asset('storage/' . $item->selected_fabric['fabrics_image'][0]) }}"
                                        alt="Fabric Image" class="w-10 h-10 object-cover rounded-full">
                                @else
                                    <span class="text-gray-400 italic">No fabric</span>
                                @endif
                            </td>

                            <!-- Price -->
                            <td class="px-4 py-3 text-right text-gray-800 font-semibold">
                                ₦{{ number_format($item->price, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Transaction Info -->
        @php
            $transaction = $order->transaction ?? null;
            // @dd($transaction);
        @endphp

        <div class="mb-4 bg-gray-300 p-3">
            <h2 class="text-lg font-bold text-gray-700 mb-2 text-center">Transaction Details</h2>
            @if ($transaction)
                <div class="text-sm text-gray-600 space-y-1">
                    <p><strong>Payment(made with):</strong> {{ ucfirst($transaction->channel) }}</p>
                    <p><strong>Currency:</strong> {{ $transaction->currency }}</p>
                    <p><strong>Total Amount:</strong> ₦{{ number_format($transaction->amount, 2) }}</p>
                    <p><strong>Status:</strong>
                        <span class="text-green-600 font-semibold">{{ ucfirst($transaction->status) }}</span>
                    </p>
                    <p><strong>Payment Date:</strong>
                        {{ \Carbon\Carbon::parse($transaction->paid_at)->format('M d, Y H:i A') }}</p>
                </div>
            @else
                <p class="text-sm text-red-500">No transaction found for this order.</p>
            @endif
        </div>

        <!-- Footer -->
        <div class="mt-6 text-center text-sm text-gray-400">
            &copy; {{ now()->year }} Idowucouture. All rights reserved.
        </div>
    </div>
</div>
