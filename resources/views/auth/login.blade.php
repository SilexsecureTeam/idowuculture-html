@extends('layouts.app')
@section('content')
    

    <style>
        .poppins {
            font-family: 'Poppins', sans-serif;
        }

        .loading {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .loaded {
            opacity: 1;
        }

        /* Custom checkbox styling */
        input[type="checkbox"] {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            position: relative;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #009345;
            border-color: #009345;
        }

        input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: -2px;
            left: 2px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen bg-gray-50 flex flex-col md:flex-row">
        <!-- Left side - Image -->
        <div class="relative w-full md:w-1/2 h-[45vh] md:h-screen overflow-hidden">
            <img src="/assets/sign-in.png" alt="Auth visual" class="md:absolute top-0 left-0 w-full loading"
                onload="this.classList.remove('loading'); this.classList.add('loaded');"
                onerror="this.style.display='none';" />
        </div>

        <!-- Right side - Form -->
        <div
            class="w-full md:w-1/2 flex items-center justify-center md:justify-start px-5 md:px-10 lg:px-15 py-10 md:py-0">
            <div class="w-full max-w-md">
                <div class="flex w-full items-center justify-center">
                    <img src="/assets/logo.png" alt="Logo" class="h-18 mb-2 loading"
                        onload="this.classList.remove('loading'); this.classList.add('loaded');"
                        onerror="this.style.display='none';" />
                </div>
                <h2 class="text-center text-[28px] mb-0 poppins font-semibold text-black">
                    Welcome back
                </h2>
                <h2 class="text-center md:text-xl mt-0 poppins font-normal text-[#4D4E50] mb-5">
                    Please enter your details
                </h2>

                <!-- Display Laravel validation errors -->
                @if ($errors->any())
                    <div id="errorMessage" class="text-red-500 text-sm mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Display success message -->
                @if (session('success'))
                    <div id="successMessage" class="bg-green-100 text-green-700 p-3 mb-4 rounded text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Display error message -->
                @if (session('error'))
                    <div class="text-red-500 text-sm mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf

                    <input type="email" name="email" id="identifier" placeholder="Enter your email"
                        class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD] @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" required />

                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Enter your Password"
                            class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD] @error('password') border-red-500 @enderror"
                            required />
                        <span id="togglePassword" class="absolute right-3 top-3 cursor-pointer text-sm text-gray-600">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>

                    <label class="flex items-center justify-between w-full mt-2 space-x-2 text-sm">
                        <div class="flex items-center gap-x-3">
                            <input type="checkbox" name="remember" id="remember" class="cursor-pointer" />
                            <span class="text-[#0B0A0A] text-base font-normal">
                                Remember me
                            </span>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-[#009345] hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </label>

                    <button type="submit" id="submitBtn"
                        class="w-full bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 mt-2 mb-2 text-white py-2 rounded cursor-pointer">
                        Sign In
                    </button>
                </form>

                <p class="text-base font-normal pl-7 text-[#000000] mb-6">
                    Don't have a PHC account?
                    <a href="{{ route('register') }}" class="text-[#009345] pl-2 hover:underline">
                        Sign up
                    </a>
                </p>

                <div class="w-full mx-auto">
                    <div class="flex items-center my-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="mx-4 text-[#151417] font-normal text-sm">
                            or sign in with your work email
                        </span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>
                    <div class="flex justify-center space-x-6 mt-4">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg"
                            alt="Google" class="w-6 h-6 cursor-pointer hover:opacity-80 transition-opacity" />
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg"
                            alt="LinkedIn" class="w-6 h-6 cursor-pointer hover:opacity-80 transition-opacity" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (togglePasswordBtn) {
                togglePasswordBtn.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeIcon.className = 'fas fa-eye-slash';
                    } else {
                        passwordInput.type = 'password';
                        eyeIcon.className = 'fas fa-eye';
                    }
                });
            }
        });
    </script>
</body>

</html>
@endsection
