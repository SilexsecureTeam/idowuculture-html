<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Home of African Wears</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- AOS CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600,
            once: true,
        });
    </script> --}}


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/about.js', 'resources/js/article.js', 'resources/js/category.js', 'resources/js/collection.js', 'resources/js/footer.js', 'resources/js/header.js', 'resources/js/hero.js', 'resources/js/hurray.js', 'resources/js/image.js', 'resources/js/newsletter.js', 'resources/js/product.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .header-fixed {
            top: 2.5rem;
        }

        /* Skeleton loader styles */
        .skeleton {
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

        /* Swiper styles */
        .swiper-container {
            cursor: grab;
            overflow-x: hidden;
        }

        .swiper-container:active {
            cursor: grabbing;
        }

        @media (max-width: 768px) {
            .swiper-container {
                cursor: pointer;
            }
        }

        .swiper-pagination {
            position: absolute;
            top: -45px;
            right: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 6px;
        }

        .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background-color: gray;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .swiper-pagination-bullet:hover {
            background-color: black;
        }

        .swiper-pagination-bullet-active {
            background-color: black;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 14rem;
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
            overflow: hidden;
            background-color: black;
            cursor: pointer;
        }

        .overlay {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 0.375rem 0.375rem 0 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        @media (min-width: 768px) {
            .image-container:hover .overlay {
                opacity: 1;
                visibility: visible;
            }
        }

        .swiper-wrapper {
            transition: transform 0.5s ease;
        }

        /* Blur placeholder */
        .blur-up {
            filter: blur(20px);
            transition: filter 0.5s ease-out;
        }

        .blur-up.lazyloaded {
            filter: blur(0);
        }
    </style>
    @livewireStyles
</head>
<!-- Page Content -->
<!-- AOS JS -->


<body class="w-full pt-26 mx-auto max-w-[1500px]">
    <div>
        @include('partials.navbar')
        <main>
            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </main>
        @include('partials.footer')
    </div>
    @livewireScripts
</body>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
{{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
<script defer src="https://unpkg.com/alpinejs"></script>

</html>
