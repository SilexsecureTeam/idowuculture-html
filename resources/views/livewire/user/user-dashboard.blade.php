<main>
    <style>
        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }

        .status-pending {
            @apply bg-yellow-100 text-yellow-800;
        }

        .status-processing {
            @apply bg-blue-100 text-blue-800;
        }

        .status-shipped {
            @apply bg-blue-100 text-blue-800;
        }

        .status-delivered {
            @apply bg-green-100 text-green-800;
        }

        .status-cancelled {
            @apply bg-red-100 text-red-800;
        }

        @media (max-width: 768px) {
            .sidebar-overlay {
                background-color: rgba(0, 0, 0, 0.5);
            }
        }

        .chart-bar {
            transition: height 0.3s ease;
        }

        .chart-bar:hover {
            opacity: 0.8;
        }

        /* Enhanced sidebar animations */
        .sidebar-collapsed {
            width: 80px;
        }

        .sidebar-expanded {
            width: 256px;
        }

        .menu-text {
            transition: opacity 0.2s ease-in-out;
        }

        .menu-text.hidden {
            opacity: 0;
        }

        /* Mobile sidebar animations */
        .sidebar-mobile-hidden {
            transform: translateX(-100%);
        }

        .sidebar-mobile-visible {
            transform: translateX(0);
        }

        /* Toggle button animations */
        .toggle-btn {
            transition: transform 0.3s ease;
        }

        .toggle-btn.rotated {
            transform: rotate(180deg);
        }

        /* Smooth content adjustment */
        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }

        .main-content.sidebar-collapsed {
            margin-left: 80px;
        }

        .main-content.sidebar-expanded {
            margin-left: 80px;
        }

        @media (max-width: 1024px) {

            .main-content.sidebar-collapsed,
            .main-content.sidebar-expanded {
                margin-left: 0;
            }
        }
    </style>

    <div>
        <div class="bg-gray-50">
            <div class="min-h-screen flex">
                <!-- Enhanced Sidebar -->
                

                <!-- Sidebar Overlay for Mobile -->
                <div id="sidebar-overlay"
                    class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden sidebar-overlay"></div>

                <!-- Main Content with dynamic margin -->
                <div id="main-content" class="flex-1 main-content sidebar-expanded">
                    <!-- Header -->
                    <header class="bg-white border-b border-gray-200 p-4 lg:p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <!-- Mobile Menu Toggle -->
                                <button id="menu-toggle"
                                    class="lg:hidden p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                                <h2 class="text-2xl font-bold text-gray-900">Order Management</h2>
                            </div>

                            <!-- Additional Header Controls -->
                            <div class="flex items-center space-x-4">
                                <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-5 5-5-5h5zm0-12h5l-5-5-5 5h5z"></path>
                                    </svg>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </header>

                    <!-- Dashboard Content -->
                    <main class="p-4 lg:p-6">
                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            <!-- Total Orders -->
                            <div
                                class="bg-white p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total Orders</p>
                                        <p class="text-3xl font-bold text-gray-900">{{ $orders }}</p>
                                        <p class="text-sm text-green-600 mt-2"></p>
                                    </div>
                                    <div class="p-3 bg-black rounded-full">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            <!-- Total Spent -->
                            <div
                                class="bg-white p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total Spent</p>
                                        <p class="text-3xl font-bold text-green-600">₦8,429</p>
                                        <p class="text-sm text-gray-500 mt-2"></p>
                                    </div>
                                    <div class="p-3 bg-green-100 rounded-full">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders Table -->
                        <div class="bg-white rounded-xl border border-gray-200 mb-8 overflow-hidden">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xl font-semibold text-gray-900">Recent Orders</h3>
                                    <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">View All
                                        Orders</button>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr class="text-center">
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Order ID</th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Date</th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Items</th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Total</th>
                                            <th
                                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($orderDetails as $item)
                                            <tr wire:key="order-{{ $item->id }}"
                                                class="hover:bg-gray-50 transition-colors">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $item->reference }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $item->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $item->items->sum('quantity') ?? 0 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-3 py-1 text-xs font-semibold rounded-full status-delivered">Order
                                                        {{ $item->status }}</span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                    ₦{{ number_format($item->amount, 2) }}</td>
                                                {{-- @dd($item->order_id) --}}
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <!-- View Details Button -->
                                                    <button wire:click="viewOrderDetails({{ $item->id }})"
                                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                                        View Details
                                                    </button>

                                                    <!-- Modal -->
                                                    @if ($selectedOrderId)
                                                        @php
                                                            $selectedOrder = \App\Models\Order::with(
                                                                'items.product',
                                                            )->find($selectedOrderId);
                                                        @endphp

                                                        <div
                                                            class="fixed inset-0 z-50 flex items-center justify-center bg-grey-700 bg-opacity-100">
                                                            <div
                                                                class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
                                                                <button wire:click="closeModal"
                                                                    class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-xl font-bold">
                                                                    &times;
                                                                </button>
                                                                <h2 class="text-xl font-bold mb-4">Order:
                                                                    {{ $selectedOrder->reference }}</h2>
                                                                <p class="text-sm text-gray-500 mb-4">Placed on
                                                                    {{ $selectedOrder->created_at->format('M d, Y') }}
                                                                </p>

                                                                <div class="divide-y divide-gray-200">
                                                                    @foreach ($selectedOrder->items as $item)
                                                                        <div class="py-3 flex justify-between">
                                                                            <div>
                                                                                <p class="font-semibold">
                                                                                    {{ $item->product->title ?? 'Product' }}
                                                                                </p>
                                                                                <p class="text-sm text-gray-500">Qty:
                                                                                    {{ $item->quantity }}</p>
                                                                            </div>
                                                                            <div class="text-right">
                                                                                <p class="text-gray-700 font-semibold">
                                                                                    ₦{{ number_format($item->price, 2) }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </td>
                                            </tr>
                                        @empty
                                            <div class="text-center text-red">
                                                No order available
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 p-2">
                                {{ $orderDetails->links() }}
                            </div>
                        </div>                      
                    </main>
                </div>
            </div>
        </div>
      
    </div>
</main>
