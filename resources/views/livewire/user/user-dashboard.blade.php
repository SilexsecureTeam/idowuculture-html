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
                <div id="sidebar"
                    class="fixed lg:sticky top-0 left-0 h-full bg-white border-r border-gray-200 z-50 sidebar-transition sidebar-expanded sidebar-mobile-hidden lg:sidebar-mobile-visible">
                    <!-- Sidebar Header with Toggle -->
                    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                        <h1 id="sidebar-title" class="text-xl font-bold text-gray-800 menu-text">Dashboard</h1>

                        <!-- Desktop Toggle Button -->
                        <button id="desktop-toggle"
                            class="hidden lg:block p-1 rounded-lg hover:bg-gray-100 text-gray-600 toggle-btn">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>

                        <!-- Mobile Close Button -->
                        <button id="close-sidebar" class="lg:hidden text-gray-600 hover:text-gray-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Navigation Menu -->
                    <nav class="p-4 space-y-2">
                        <a href="#"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg bg-black text-white font-medium group">
                            <span class="icon text-xl ">🛒</span>
                            <span class="menu-text">Orders</span>
                            <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-2 h-2 bg-white rounded-full block"></span>
                            </div>
                        </a>
                        <a href="#"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors group">
                            <span class="icon text-xl">❤️</span>
                            <span class="menu-text">Wishlist</span>
                            <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-2 h-2 bg-gray-400 rounded-full block"></span>
                            </div>
                        </a>
                        <a href="#"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors group">
                            <span class="icon text-xl">👤</span>
                            <span class="menu-text">Profile</span>
                            <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-2 h-2 bg-gray-400 rounded-full block"></span>
                            </div>
                        </a>
                        <a href="#"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors group">
                            <span class="icon text-xl">🏠</span>
                            <span class="menu-text">Addresses</span>
                            <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-2 h-2 bg-gray-400 rounded-full block"></span>
                            </div>
                        </a>
                        <a href="#"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors group">
                            <span class="icon text-xl">💳</span>
                            <span class="menu-text">Payment</span>
                            <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-2 h-2 bg-gray-400 rounded-full block"></span>
                            </div>
                        </a>
                        <a href="#"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 text-gray-700 font-medium transition-colors group">
                            <span class="icon text-xl">⚙️</span>
                            <span class="menu-text">Settings</span>
                            <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="w-2 h-2 bg-gray-400 rounded-full block"></span>
                            </div>
                        </a>
                    </nav>
                </div>

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
                                        <p class="text-sm text-green-600 mt-2">+12% from last month</p>
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

                            <!-- Pending Orders -->
                            {{-- <div
                                class="bg-white p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Pending Orders</p>
                                        <p class="text-3xl font-bold text-yellow-600">8</p>
                                        <p class="text-sm text-gray-500 mt-2">Awaiting processing</p>
                                    </div>
                                    <div class="p-3 bg-yellow-100 rounded-full">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Total Spent -->
                            <div
                                class="bg-white p-6 rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total Spent</p>
                                        <p class="text-3xl font-bold text-green-600">$8,429</p>
                                        <p class="text-sm text-gray-500 mt-2">This year</p>
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
                                        <tr>
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
                                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
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

                        <!-- Analytics Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Order Status Distribution -->
                            <div class="bg-white p-6 rounded-xl border border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 mb-6">Order Status Distribution</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-700">Delivered</span>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                                <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                                                    style="width: 78%"></div>
                                            </div>
                                            <span class="text-sm font-bold text-gray-900 w-8">111</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-700">Shipped</span>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                                <div class="bg-blue-500 h-2 rounded-full transition-all duration-500"
                                                    style="width: 16%"></div>
                                            </div>
                                            <span class="text-sm font-bold text-gray-900 w-8">23</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-700">Pending</span>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                                <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500"
                                                    style="width: 6%"></div>
                                            </div>
                                            <span class="text-sm font-bold text-gray-900 w-8">8</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Spending Chart -->
                            <div class="bg-white p-6 rounded-xl border border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 mb-6">Monthly Spending</h3>
                                <div class="flex items-end justify-between space-x-2 h-40">
                                    <div class="flex flex-col items-center group cursor-pointer">
                                        <div class="bg-gray-300 chart-bar rounded-t-sm group-hover:bg-gray-400 transition-colors"
                                            style="height: 40%; width: 24px; margin-bottom: 12px;"></div>
                                        <span class="text-xs text-gray-500 font-medium">Jan</span>
                                    </div>
                                    <div class="flex flex-col items-center group cursor-pointer">
                                        <div class="bg-gray-400 chart-bar rounded-t-sm group-hover:bg-gray-500 transition-colors"
                                            style="height: 60%; width: 24px; margin-bottom: 12px;"></div>
                                        <span class="text-xs text-gray-500 font-medium">Feb</span>
                                    </div>
                                    <div class="flex flex-col items-center group cursor-pointer">
                                        <div class="bg-gray-500 chart-bar rounded-t-sm group-hover:bg-gray-600 transition-colors"
                                            style="height: 80%; width: 24px; margin-bottom: 12px;"></div>
                                        <span class="text-xs text-gray-500 font-medium">Mar</span>
                                    </div>
                                    <div class="flex flex-col items-center group cursor-pointer">
                                        <div class="bg-gray-600 chart-bar rounded-t-sm group-hover:bg-gray-700 transition-colors"
                                            style="height: 45%; width: 24px; margin-bottom: 12px;"></div>
                                        <span class="text-xs text-gray-500 font-medium">Apr</span>
                                    </div>
                                    <div class="flex flex-col items-center group cursor-pointer">
                                        <div class="bg-gray-700 chart-bar rounded-t-sm group-hover:bg-gray-800 transition-colors"
                                            style="height: 90%; width: 24px; margin-bottom: 12px;"></div>
                                        <span class="text-xs text-gray-500 font-medium">May</span>
                                    </div>
                                    <div class="flex flex-col items-center group cursor-pointer">
                                        <div class="bg-black chart-bar rounded-t-sm group-hover:bg-gray-800 transition-colors"
                                            style="height: 100%; width: 24px; margin-bottom: 12px;"></div>
                                        <span class="text-xs text-gray-500 font-medium">Jun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <script>
            // Enhanced Sidebar Toggle System
            class SidebarManager {
                constructor() {
                    this.sidebar = document.getElementById('sidebar');
                    this.overlay = document.getElementById('sidebar-overlay');
                    this.mainContent = document.getElementById('main-content');
                    this.menuToggle = document.getElementById('menu-toggle');
                    this.closeSidebar = document.getElementById('close-sidebar');
                    this.desktopToggle = document.getElementById('desktop-toggle');
                    this.sidebarTitle = document.getElementById('sidebar-title');
                    this.menuTexts = document.querySelectorAll('.menu-text');

                    this.isCollapsed = false;
                    this.isMobileOpen = false;

                    this.init();
                }

                init() {
                    this.setupEventListeners();
                    this.handleResize();
                    window.addEventListener('resize', () => this.handleResize());
                }

                setupEventListeners() {
                    // Mobile menu toggle
                    this.menuToggle?.addEventListener('click', () => this.openMobileSidebar());

                    // Close sidebar (mobile)
                    this.closeSidebar?.addEventListener('click', () => this.closeMobileSidebar());

                    // Desktop toggle (collapse/expand)
                    this.desktopToggle?.addEventListener('click', () => this.toggleDesktopSidebar());

                    // Close sidebar when clicking overlay
                    this.overlay?.addEventListener('click', () => this.closeMobileSidebar());

                    // Escape key to close mobile sidebar
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape' && this.isMobileOpen) {
                            this.closeMobileSidebar();
                        }
                    });
                }

                openMobileSidebar() {
                    this.sidebar.classList.remove('sidebar-mobile-hidden');
                    this.sidebar.classList.add('sidebar-mobile-visible');
                    this.overlay.classList.remove('hidden');
                    this.isMobileOpen = true;
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                }

                closeMobileSidebar() {
                    this.sidebar.classList.add('sidebar-mobile-hidden');
                    this.sidebar.classList.remove('sidebar-mobile-visible');
                    this.overlay.classList.add('hidden');
                    this.isMobileOpen = false;
                    document.body.style.overflow = ''; // Restore scrolling
                }

                toggleDesktopSidebar() {
                    this.isCollapsed = !this.isCollapsed;

                    if (this.isCollapsed) {
                        this.collapseSidebar();
                    } else {
                        this.expandSidebar();
                    }
                }

                collapseSidebar() {
                    // Update sidebar classes
                    this.sidebar.classList.remove('sidebar-expanded');
                    this.sidebar.classList.add('sidebar-collapsed');

                    // Update main content margin
                    this.mainContent.classList.remove('sidebar-expanded');
                    this.mainContent.classList.add('sidebar-collapsed');

                    // Hide text elements
                    this.menuTexts.forEach(text => {
                        text.style.opacity = '0';
                        setTimeout(() => {
                            text.style.display = 'none';
                        }, 150);
                    });


                    // Rotate toggle button
                    this.desktopToggle.classList.add('rotated');

                    // Update nav items for collapsed state - center icons
                    const navItems = document.querySelectorAll('.nav-item');
                    navItems.forEach(item => {
                        item.style.justifyContent = 'center';
                        item.style.padding = '12px';

                        // Hide the ml-auto div (indicator dot)
                        const indicator = item.querySelector('.ml-auto');
                        if (indicator) {
                            indicator.style.display = 'none';
                        }

                        // Center the icon
                        const icon = item.querySelector('.icon');
                        if (icon) {
                            icon.style.margin = '0 auto';
                            icon.style.display = 'block';
                            icon.style.textAlign = 'center';
                        }
                    });
                }

                expandSidebar() {
                    // Update sidebar classes
                    this.sidebar.classList.remove('sidebar-collapsed');
                    this.sidebar.classList.add('sidebar-expanded');

                    // Update main content margin
                    this.mainContent.classList.remove('sidebar-collapsed');
                    this.mainContent.classList.add('sidebar-expanded');

                    // Show text elements
                    this.menuTexts.forEach(text => {
                        text.style.display = 'block';
                        setTimeout(() => {
                            text.style.opacity = '1';
                        }, 50);
                    });

                    // Reset toggle button rotation
                    this.desktopToggle.classList.remove('rotated');

                    // Reset nav items for expanded state
                    const navItems = document.querySelectorAll('.nav-item');
                    navItems.forEach(item => {
                        item.style.justifyContent = '';
                        item.style.padding = '';

                        // Show the ml-auto div (indicator dot)
                        const indicator = item.querySelector('.ml-auto');
                        if (indicator) {
                            indicator.style.display = '';
                        }

                        // Reset icon styling
                        const icon = item.querySelector('.icon');
                        if (icon) {
                            icon.style.margin = '';
                            icon.style.display = '';
                            icon.style.textAlign = '';
                        }
                    });
                }

                handleResize() {
                    const isLargeScreen = window.innerWidth >= 1024;

                    if (isLargeScreen) {
                        // Desktop behavior
                        this.sidebar.classList.add('sidebar-mobile-visible');
                        this.sidebar.classList.remove('sidebar-mobile-hidden');
                        this.overlay.classList.add('hidden');
                        this.isMobileOpen = false;
                        document.body.style.overflow = '';
                    } else {
                        // Mobile behavior - reset to collapsed state
                        if (!this.isMobileOpen) {
                            this.sidebar.classList.add('sidebar-mobile-hidden');
                            this.sidebar.classList.remove('sidebar-mobile-visible');
                        }

                        // Reset desktop collapse state on mobile
                        if (this.isCollapsed) {
                            this.isCollapsed = false;
                            this.expandSidebar();
                        }
                    }
                }

                // Method to programmatically control sidebar
                setSidebarState(state) {
                    if (window.innerWidth >= 1024) {
                        if (state === 'collapsed' && !this.isCollapsed) {
                            this.toggleDesktopSidebar();
                        } else if (state === 'expanded' && this.isCollapsed) {
                            this.toggleDesktopSidebar();
                        }
                    } else {
                        if (state === 'open') {
                            this.openMobileSidebar();
                        } else if (state === 'closed') {
                            this.closeMobileSidebar();
                        }
                    }
                }
            }

            // Initialize sidebar manager
            const sidebarManager = new SidebarManager();

            // Additional functionality for enhanced user experience
            document.addEventListener('DOMContentLoaded', function() {
                // Animate chart bars on load
                const chartBars = document.querySelectorAll('.chart-bar');
                chartBars.forEach((bar, index) => {
                    setTimeout(() => {
                        bar.style.transform = 'scaleY(1)';
                    }, index * 100);
                });

                // Animate progress bars on load
                const progressBars = document.querySelectorAll('.bg-green-500, .bg-blue-500, .bg-yellow-500');
                progressBars.forEach((bar, index) => {
                    setTimeout(() => {
                        const width = bar.style.width;
                        bar.style.width = '0%';
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 100);
                    }, index * 200);
                });

                // Add tooltip functionality for collapsed sidebar
                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(item => {
                    const text = item.querySelector('.menu-text');
                    if (text) {
                        item.setAttribute('title', text.textContent);
                    }
                });

                // Add keyboard navigation
                document.addEventListener('keydown', (e) => {
                    // Ctrl/Cmd + B to toggle sidebar
                    if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
                        e.preventDefault();
                        if (window.innerWidth >= 1024) {
                            sidebarManager.toggleDesktopSidebar();
                        } else {
                            if (sidebarManager.isMobileOpen) {
                                sidebarManager.closeMobileSidebar();
                            } else {
                                sidebarManager.openMobileSidebar();
                            }
                        }
                    }
                });

                // Save sidebar state to localStorage (if available)
                try {
                    const savedState = localStorage.getItem('sidebarCollapsed');
                    if (savedState === 'true' && window.innerWidth >= 1024) {
                        setTimeout(() => {
                            sidebarManager.toggleDesktopSidebar();
                        }, 100);
                    }
                } catch (e) {
                    // localStorage not available, ignore
                }

                // Save state when toggling
                const originalToggle = sidebarManager.toggleDesktopSidebar;
                sidebarManager.toggleDesktopSidebar = function() {
                    originalToggle.call(this);
                    try {
                        localStorage.setItem('sidebarCollapsed', this.isCollapsed);
                    } catch (e) {
                        // localStorage not available, ignore
                    }
                };
            });

            // Export for external use
            window.sidebarManager = sidebarManager;
        </script>
    </div>
</main>
