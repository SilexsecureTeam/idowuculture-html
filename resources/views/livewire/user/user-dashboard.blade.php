<main>
    <div class="min-h-screen bg-white text-black font-sans">
        <!-- Header -->
        <div class="bg-black text-white py-6 px-6 flex justify-between items-center shadow-md">
            <h1 class="text-2xl font-bold">User Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-white">Hello, {{ $user->name }}</span>
                <a href="{{ route('logout') }}" class="text-[#E0B654] hover:underline">Logout</a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="grid grid-cols-1 md:grid-cols-4">
            <!-- Sidebar -->
            <aside class="bg-[#E0B654] text-black px-6 py-10 space-y-4">
                <h2 class="font-bold text-lg mb-4">Navigation</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Dashboard</a></li>
                    <li><a href="#" class="hover:text-white">My Orders</a></li>
                    <li><a href="#" class="hover:text-white">Settings</a></li>
                </ul>
            </aside>

            <!-- Main Section -->
            <main class="col-span-3 px-8 py-10">
                <h2 class="text-xl font-semibold mb-4">Welcome to your dashboard</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-[#E0B654] text-black rounded-xl p-6 shadow-md">
                        <h3 class="text-lg font-bold">Orders</h3>
                        <p class="text-2xl mt-2">12</p>
                    </div>
                    <div class="bg-black text-white rounded-xl p-6 shadow-md">
                        <h3 class="text-lg font-bold">Wishlist</h3>
                        <p class="text-2xl mt-2">3</p>
                    </div>
                    <div class="bg-white border border-black rounded-xl p-6 shadow-md">
                        <h3 class="text-lg font-bold text-black">Profile</h3>
                        <p class="text-2xl mt-2">{{ $user->email }}</p>
                    </div>
                </div>

                <!-- Tabs -->
                <div>
                    <ul class="flex border-b border-black mb-6">
                        <li class="mr-4">
                            <button class="font-semibold py-2 px-4 border-b-4 border-[#E0B654]">Order History</button>
                        </li>
                        <li class="mr-4">
                            <button class="font-semibold py-2 px-4 hover:text-[#E0B654]">Update Profile</button>
                        </li>
                    </ul>

                    <!-- Order History Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-black">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b border-black text-left">Order ID</th>
                                    <th class="px-4 py-2 border-b border-black text-left">Date</th>
                                    <th class="px-4 py-2 border-b border-black text-left">Total</th>
                                    <th class="px-4 py-2 border-b border-black text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Row -->
                                <tr>
                                    <td class="px-4 py-2 border-b">#12345</td>
                                    <td class="px-4 py-2 border-b">2025-07-13</td>
                                    <td class="px-4 py-2 border-b">₦15,000</td>
                                    <td class="px-4 py-2 border-b">Delivered</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Update Profile Form -->
                    <div class="mt-10">
                        <h3 class="text-lg font-bold mb-4">Update Profile</h3>
                        <form wire:submit.prevent="updateProfile" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm">Full Name</label>
                                <input type="text" wire:model="user.name"
                                    class="w-full border border-gray-300 px-3 py-2" />
                            </div>
                            <div>
                                <label class="block mb-1 text-sm">Email</label>
                                <input type="email" wire:model="user.email"
                                    class="w-full border border-gray-300 px-3 py-2" />
                            </div>
                            <div class="col-span-2">
                                <button
                                    class="bg-black text-white px-6 py-2 mt-2 rounded hover:bg-[#E0B654] transition">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</main>
