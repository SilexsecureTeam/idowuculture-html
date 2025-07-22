<main class="pb-3 ">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-xl mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">My Profile</h2>

        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="updateProfile" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" wire:model.defer="firstname"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                @error('firstname')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" wire:model.defer="lastname"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                @error('lastname')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" wire:model.defer="email" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" wire:model.defer="phone"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" wire:model.defer="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" wire:model.defer="password_confirmation"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-md shadow-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</main>
