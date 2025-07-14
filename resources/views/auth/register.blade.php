@extends('layouts.app')
@section('content')
    
    <style>
        .poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* Image loading optimization */
        .auth-image {
            background-color: #f3f4f6;
            transition: opacity 0.3s ease-in-out;
        }

        .auth-image.loaded {
            opacity: 1;
        }

        .auth-image:not(.loaded) {
            opacity: 0;
        }

        /* Loading skeleton */
        .image-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .logo-image {
            transition: opacity 0.3s ease-in-out;
        }

        .logo-image.loaded {
            opacity: 1;
        }

        .logo-image:not(.loaded) {
            opacity: 0;
        }
    </style>
</head>

<body>
    <div class="bg-gray-50 flex flex-col md:flex-row">
        <!-- Left side - Image -->
        <div class="relative hidden md:block w-full md:w-1/2 h-screen  overflow-hidden">
            <!-- Loading skeleton -->
            <div id="imageSkeleton" class="absolute inset-0 image-skeleton"></div>

            <img id="authImage" src="/assets/sign-up.png" alt="Auth visual" class="md:absolute top-0 left-0 w-full "
                loading="eager" decoding="async" />
        </div>

        <!-- Right side - Form -->
        <div
            class="w-full md:w-1/2 flex items-center justify-center md:justify-start px-5 md:px-10 lg:px-15 py-10 md:py-0">
            <div class="w-full max-w-md">
                <div class="flex w-full items-center justify-center">
                    <img id="logoImage" src="/assets/logo.png" alt="Logo" class="logo-image h-18 mb-2"
                        loading="eager" decoding="async" />
                </div>

                <h2 class="text-center text-[28px] mb-0 poppins font-semibold text-black">
                    Welcome Onboard
                </h2>
                <h2 class="text-center md:text-xl mt-0 poppins font-normal text-[#4D4E50] mb-5">
                    Please enter your details
                </h2>

                <form id="signupForm" action="{{ route('register') }}" method="POST" class="space-y-2">
                    @csrf

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div id="errorMessage"
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Display success message -->
                    @if (session('success'))
                        <div id="successMessage"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <input type="text" name="firstname" placeholder="{{ old('firstname') }}"
                        class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                        required />

                    <input type="text" name="lastname" placeholder="{{ old('lastname') }}"
                        class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                        required />

                    <input type="email" name="email" placeholder="{{ old('email') }}"
                        class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                        required />

                    <input type="tel" name="phone" inputmode="numeric" pattern="[0-9]*"
                        placeholder="{{ old('phone') }}"
                        class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                        required />

                    <!-- Password -->
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                            required />
                        <span id="passwordToggle" class="absolute right-3 top-3 cursor-pointer text-sm text-gray-600">
                            <i class="fas fa-eye" id="passwordIcon"></i>
                        </span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="confirmPassword"
                            placeholder="Confirm Password"
                            class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                            required />
                       
                    </div>

                    <button type="submit"
                        class="w-full bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 mt-3 mb-2 text-white py-2 rounded cursor-pointer">
                        Sign Up
                    </button>
                </form>

                <p class="text-base font-normal text-[#000000] mb-6">
                    Already have a PHC account?
                    <a href="{{ route('login') }}" class="text-[#009345] pl-2 hover:underline">Login</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordToggle = document.getElementById('passwordToggle');
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');

            if (passwordToggle) {
                passwordToggle.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        passwordIcon.className = 'fas fa-eye-slash';
                    } else {
                        passwordInput.type = 'password';
                        passwordIcon.className = 'fas fa-eye';
                    }
                });
            }
        });
    </script>
@endsection
