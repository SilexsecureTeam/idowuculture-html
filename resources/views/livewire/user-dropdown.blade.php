<main>
    <div x-data="{ open: false }" class="relative">
    @auth
        <!-- Trigger -->
        <button @click="open = !open" class="flex items-center gap-2 cursor-pointer focus:outline-none">
            <i class="fas fa-user text-[#141718] text-lg"></i>
            <span class="text-[#141718] text-sm font-medium hidden sm:inline">{{ Auth::user()->name }}</span>
        </button>

        <!-- Dropdown -->
        <div 
            x-show="open" 
            @click.away="open = false"
            x-transition
            class="absolute right-0 mt-2 w-44 bg-white rounded-md shadow-lg border border-gray-200 z-50"
        >
            <ul class="py-2 text-sm text-gray-700">
                <li>
                    <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <!-- Guest -->
        <a href="{{ route('register') }}" title="Sign Up">
            <i class="fas fa-user text-[#141718] text-lg cursor-pointer"></i>
        </a>
    @endauth
</div>

</main>
