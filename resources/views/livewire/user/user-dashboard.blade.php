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
            @apply bg-green-100 text-green-800;
        }

        .status-delivered {
            @apply bg-green-200 text-green-900;
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
    </style>

    <body class="min-h-screen overflow-x-hidden">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed top-0 left-0 h-full w-64 bg-white border-r border-gray-200 transform transition-all z-50 md:translate-x-0 -translate-x-full">
            <div class="p-4 border-b flex justify-between items-center">
                <h1 class="text-lg font-bold">Dashboard</h1>
                <button id="close-sidebar" class="md:hidden">✕</button>
            </div>
            <nav class="p-4 space-y-2 text-sm font-medium">
                <a href="#" class="block p-3 rounded-lg bg-black text-white">🛒 Orders</a>
                <a href="#" class="block p-3 rounded-lg hover:bg-gray-100">❤️ Wishlist</a>
                <a href="#" class="block p-3 rounded-lg hover:bg-gray-100">👤 Profile</a>
                <a href="#" class="block p-3 rounded-lg hover:bg-gray-100">🏠 Addresses</a>
                <a href="#" class="block p-3 rounded-lg hover:bg-gray-100">💳 Payment</a>
                <a href="#" class="block p-3 rounded-lg hover:bg-gray-100">⚙️ Settings</a>
            </nav>
        </div>

        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

        <!-- Main Content -->
        <div id="main-content" class="transition-all md:ml-64 p-6">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="menu-toggle" class="md:hidden p-2 rounded hover:bg-gray-100 mr-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-2xl font-bold text-black">Order Management</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 rounded-lg hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-5 5v-5zM4 5h16a1 1 0 011 1v10a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z">
                                </path>
                            </svg>
                        </button>
                        <div class="w-8 h-8 bg-black rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-medium">JD</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Orders</p>
                                <p class="text-3xl font-bold text-black">142</p>
                            </div>
                            <div class="p-3 bg-black rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">+12% from last month</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Pending</p>
                                <p class="text-3xl font-bold text-yellow-600">8</p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-full">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Awaiting processing</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Shipped</p>
                                <p class="text-3xl font-bold text-blue-600">23</p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">On the way</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Spent</p>
                                <p class="text-3xl font-bold text-green-600">$8,429</p>
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
                        <p class="text-sm text-gray-500 mt-2">This year</p>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-lg border border-gray-200 mb-8">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-black">Recent Orders</h3>
                            <button class="text-sm text-gray-500 hover:text-black">View All</button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Items</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        #ORD-2024-001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-20</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 items</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full status-delivered">Delivered</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">$129.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-black hover:text-gray-600 font-medium">View
                                            Details</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        #ORD-2024-002</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-19</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 item</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full status-shipped">Shipped</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">$59.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-black hover:text-gray-600 font-medium">View
                                            Details</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        #ORD-2024-003</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-18</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 items</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full status-processing">Processing</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">$89.50</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-black hover:text-gray-600 font-medium">View
                                            Details</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        #ORD-2024-004</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-17</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4 items</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full status-pending">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">$199.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-black hover:text-gray-600 font-medium">View
                                            Details</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        #ORD-2024-005</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-15</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 item</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full status-delivered">Delivered</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">$39.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-black hover:text-gray-600 font-medium">View
                                            Details</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                        #ORD-2024-006</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-14</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 items</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full status-cancelled">Cancelled</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">$79.99</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-black hover:text-gray-600 font-medium">View
                                            Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Order Analytics -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-black mb-4">Order Status Distribution</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Delivered</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 78%"></div>
                                    </div>
                                    <span class="text-sm font-medium">111</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Shipped</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: 16%"></div>
                                    </div>
                                    <span class="text-sm font-medium">23</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Pending</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-yellow-600 h-2 rounded-full" style="width: 6%"></div>
                                    </div>
                                    <span class="text-sm font-medium">8</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-black mb-4">Monthly Spending</h3>
                        <div class="flex items-end space-x-2 h-32">
                            <div class="flex flex-col items-center">
                                <div class="bg-gray-300 chart-bar"
                                    style="height: 40%; width: 20px; margin-bottom: 8px;">
                                </div>
                                <span class="text-xs text-gray-500">Jan</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-gray-400 chart-bar"
                                    style="height: 60%; width: 20px; margin-bottom: 8px;">
                                </div>
                                <span class="text-xs text-gray-500">Feb</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-gray-500 chart-bar"
                                    style="height: 80%; width: 20px; margin-bottom: 8px;">
                                </div>
                                <span class="text-xs text-gray-500">Mar</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-gray-600 chart-bar"
                                    style="height: 45%; width: 20px; margin-bottom: 8px;">
                                </div>
                                <span class="text-xs text-gray-500">Apr</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-gray-700 chart-bar"
                                    style="height: 90%; width: 20px; margin-bottom: 8px;">
                                </div>
                                <span class="text-xs text-gray-500">May</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="bg-black chart-bar"
                                    style="height: 100%; width: 20px; margin-bottom: 8px;">
                                </div>
                                <span class="text-xs text-gray-500">Jun</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            document.getElementById('menu-toggle')?.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            });
            document.getElementById('close-sidebar')?.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
            overlay?.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        </script>
    </body>
</main>
