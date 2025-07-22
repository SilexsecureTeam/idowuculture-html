<main>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(10px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -468px 0;
            }

            100% {
                background-position: 468px 0;
            }
        }

        .glassmorphism {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .glassmorphism-light {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 215, 0, 0.3);
        }

        .gradient-text {
            background: linear-gradient(135deg, #FFD700, #FFA500, #FF8C00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gold-shimmer {
            background: linear-gradient(45deg, #FFD700, #FFA500, #FFD700);
            background-size: 400% 400%;
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
    <div class="bg-gradient-to-br from-white via-gray-300 to-white min-h-screen font-sans text-white">

        <!-- Header -->
        {{-- <header class="glassmorphism shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold gradient-text">StyleHub</h1>
                    <div class="relative hidden md:block">
                        <i class="fas fa-search absolute left-3 top-3 text-gold-400"></i>
                        <input type="text" placeholder="Search products..." 
                               class="pl-10 pr-4 py-2 w-64 rounded-full border border-gold-400 focus:border-gold-300 focus:ring-2 focus:ring-gold-300 transition-all duration-300 bg-black/50 text-white placeholder-gold-300">
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-gold-400 hover:text-gold-300 cursor-pointer transition-colors text-lg"></i>
                        <span class="absolute -top-1 -right-1 bg-gold-500 text-black text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse font-bold">3</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-gradient-to-r from-gold-600 to-gold-400 rounded-full p-3 text-black shadow-lg">
                        <i class="fas fa-user"></i>
                        <span class="font-bold hidden sm:inline">{{ Auth::user()->name ?? 'Sarah Johnson' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}

        <div class="max-w-8xl mx-auto px-6 py-8" x-data="{ activeTab: 'overview' }">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <div class="lg:w-64">
                    <div class="glassmorphism rounded-2xl shadow-xl p-6 sticky top-24">
                        <nav class="space-y-2">
                            <button @click="activeTab = 'overview'"
                                :class="activeTab === 'overview' ?
                                    'bg-gradient-to-r from-gold-600 to-gold-400 text-black shadow-xl transform scale-105' :
                                    'text-white hover:bg-gold-600/20 hover:text-gold-300'"
                                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                                <i class="fas fa-chart-line w-5 h-5"></i>
                                <span class="font-medium">Overview</span>
                            </button>
                            <button @click="activeTab = 'orders'"
                                :class="activeTab === 'orders' ?
                                    'bg-gradient-to-r from-gold-600 to-gold-400 text-black shadow-xl transform scale-105' :
                                    'text-gold-200 hover:bg-gold-600/20 hover:text-gold-300'"
                                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                                <i class="fas fa-box w-5 h-5"></i>
                                <span class="font-medium">My Orders</span>
                            </button>
                            <button @click="activeTab = 'profile'"
                                :class="activeTab === 'profile' ?
                                    'bg-gradient-to-r from-gold-600 to-gold-400 text-black shadow-xl transform scale-105' :
                                    'text-gold-200 hover:bg-gold-600/20 hover:text-gold-300'"
                                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                                <i class="fas fa-user w-5 h-5"></i>
                                <span class="font-medium">Profile</span>
                            </button>
                            <button @click="activeTab = 'addresses'"
                                :class="activeTab === 'addresses' ?
                                    'bg-gradient-to-r from-gold-600 to-gold-400 text-black shadow-xl transform scale-105' :
                                    'text-gold-200 hover:bg-gold-600/20 hover:text-gold-300'"
                                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                                <i class="fas fa-map-marker-alt w-5 h-5"></i>
                                <span class="font-medium">Addresses</span>
                            </button>
                            <button @click="activeTab = 'settings'"
                                :class="activeTab === 'settings' ?
                                    'bg-gradient-to-r from-gold-600 to-gold-400 text-black shadow-xl transform scale-105' :
                                    'text-gold-200 hover:bg-gold-600/20 hover:text-gold-300'"
                                class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-300">
                                <i class="fas fa-cog w-5 h-5"></i>
                                <span class="font-medium">Settings</span>
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Overview Tab -->
                    <div x-show="activeTab === 'overview'" class="space-y-8 animate-fade-in">
                        <!-- Welcome Section -->
                        <div
                            class="bg-gradient-to-r from-gold-300 to-gold-200 rounded-2xl p-8 text-black shadow-2xl relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-gold-300/20 to-gold-200/20 gold-shimmer">
                            </div>
                            <div class="relative z-10">
                                <h2 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->firstname }}! ✨</h2>
                                <p class="text-black/80 text-lg mb-6">Ready to discover your next luxury piece?</p>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="bg-black/20 backdrop-blur-sm rounded-xl p-4">
                                        <p class="text-sm text-black/80 mb-1">Total Orders</p>
                                        <p class="text-2xl font-bold">{{ $cartCount }}</p>
                                        
                                    </div>
                                    <div class="bg-black/20 backdrop-blur-sm rounded-xl p-4">
                                        <p class="text-sm text-black/80 mb-1">Total Spent</p>
                                        <p class="text-2xl font-bold">$2,847</p>
                                    </div>
                                    <div class="bg-black/20 backdrop-blur-sm rounded-xl p-4">
                                        <p class="text-sm text-black/80 mb-1">Saved Items</p>
                                        <p class="text-2xl font-bold">18</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders -->
                        <div class="glassmorphism rounded-2xl shadow-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-xl font-semibold text-gold-300">Recent Orders</h3>
                                <a href="#"
                                    class="text-gold-400 hover:text-gold-300 font-medium transition-colors">View All</a>
                            </div>
                            <div class="space-y-4">
                                <div
                                    class="flex items-center space-x-4 p-4 glassmorphism-light rounded-xl hover:shadow-md transition-all duration-300">
                                    <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=80&h=80&fit=crop"
                                        alt="Summer Dress"
                                        class="w-16 h-16 rounded-lg object-cover border border-gold-600">
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gold-200">Summer Dress</h4>
                                        <p class="text-sm text-gold-400">#ORD001 • July 15, 2025</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-gold-300">$89.99</p>
                                        <span
                                            class="inline-block px-2 py-1 bg-green-600/80 text-green-200 text-xs rounded-full">Delivered</span>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center space-x-4 p-4 glassmorphism-light rounded-xl hover:shadow-md transition-all duration-300">
                                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=80&h=80&fit=crop"
                                        alt="Denim Jacket"
                                        class="w-16 h-16 rounded-lg object-cover border border-gold-600">
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gold-200">Denim Jacket</h4>
                                        <p class="text-sm text-gold-400">#ORD002 • July 18, 2025</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-gold-300">$124.99</p>
                                        <span
                                            class="inline-block px-2 py-1 bg-blue-600/80 text-blue-200 text-xs rounded-full">Shipped</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div x-show="activeTab === 'orders'" class="animate-fade-in">
                        <div class="glassmorphism rounded-2xl shadow-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800">Order History</h3>
                                <div class="flex space-x-2">
                                    <select
                                        class="px-3 py-2 rounded-lg border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100">
                                        <option>All Orders</option>
                                        <option>Delivered</option>
                                        <option>Shipped</option>
                                        <option>Processing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <!-- Order items would be dynamically generated here -->
                                <div
                                    class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Order #ORD001</h4>
                                            <p class="text-sm text-gray-500">Placed on July 15, 2025</p>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-600 rounded-full font-medium">Delivered</span>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=60&h=60&fit=crop"
                                            alt="Product" class="w-16 h-16 rounded-lg object-cover">
                                        <div class="flex-1">
                                            <h5 class="font-medium">Summer Dress</h5>
                                            <p class="text-sm text-gray-500">Size: M, Color: Blue</p>
                                        </div>
                                        <p class="font-semibold">$89.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- profile Tab -->
                    <div x-show="activeTab === 'profile'" class="animate-fade-in">
                        <div class="glassmorphism rounded-2xl shadow-xl p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800">Order History</h3>
                                <div class="flex space-x-2">
                                    <select
                                        class="px-3 py-2 rounded-lg border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100">
                                        <option>All Orders</option>
                                        <option>Delivered</option>
                                        <option>Shipped</option>
                                        <option>Processing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <!-- Order items would be dynamically generated here -->
                                <div
                                    class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all duration-300">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Order #ORD001</h4>
                                            <p class="text-sm text-gray-500">Placed on July 15, 2025</p>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-600 rounded-full font-medium">Delivered</span>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=60&h=60&fit=crop"
                                            alt="Product" class="w-16 h-16 rounded-lg object-cover">
                                        <div class="flex-1">
                                            <h5 class="font-medium">Summer Dress</h5>
                                            <p class="text-sm text-gray-500">Size: M, Color: Blue</p>
                                        </div>
                                        <p class="font-semibold">$89.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist Tab -->
                    <div x-show="activeTab === 'wishlist'" class="animate-fade-in">
                        <div class="glassmorphism rounded-2xl shadow-xl p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">My Wishlist</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <!-- Wishlist items would be dynamically generated here -->
                                <div
                                    class="group bg-white/60 rounded-xl p-4 hover:shadow-lg transition-all duration-300">
                                    <div class="relative overflow-hidden rounded-lg mb-4">
                                        <img src="https://images.unsplash.com/photo-1564257577-8a19a6e8ad0a?w=300&h=300&fit=crop"
                                            alt="Silk Blouse"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <button
                                            class="absolute top-2 right-2 bg-white/80 hover:bg-white p-2 rounded-full transition-all">
                                            <i class="fas fa-heart text-red-500"></i>
                                        </button>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-1">Silk Blouse</h4>
                                    <p class="text-purple-600 font-bold text-lg mb-3">$78.00</p>
                                    <button
                                        class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-2 rounded-lg hover:shadow-lg transition-all duration-300">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                        colors: {
                            gold: {
                                50: '#fffdf7',
                                100: '#fffbeb',
                                200: '#fef3c7',
                                300: '#fde68a',
                                400: '#fcd34d',
                                500: '#f59e0b',
                                600: '#d97706',
                                700: '#b45309',
                                800: '#92400e',
                                900: '#78350f',
                            }
                        },
                        animation: {
                            'fade-in': 'fadeIn 0.5s ease-in-out',
                            'slide-up': 'slideUp 0.3s ease-out',
                            'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                            'shimmer': 'shimmer 2s linear infinite',
                        }
                    }
                }
            }
        </script>
</main>
