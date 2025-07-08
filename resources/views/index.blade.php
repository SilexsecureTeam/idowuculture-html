@extends('layouts.app')
@section('content')
    <style>
        /* features */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 8px;
        }

        .product-card:hover .hover-overlay {
            opacity: 1;
        }

        /* //////////////// */
        .cart-animation {
            animation: cartBounce 0.6s ease-out;
        }

        @keyframes cartBounce {

            0%,
            20%,
            60%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            80% {
                transform: translateY(-5px);
            }
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes skeleton-loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .poppins {
            font-family: 'Poppins', sans-serif;
        }

        .article-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .article-image {
            transition: transform 0.3s ease;
        }

        .article-card:hover .article-image {
            transform: scale(1.05);
        }

        .read-more-link {
            transition: border-color 0.3s ease;
        }

        .read-more-link:hover {
            border-color: #E0B654;
        }

        /* collection */
        .collection-card {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            height: 300px;
        }

        .collection-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.1) 100%);
            z-index: 1;
        }

        .collection-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px;
            z-index: 2;
            color: white;
        }

        @media (min-width: 768px) {
            .collection-card {
                height: 350px;
            }
        }

        @media (min-width: 1024px) {
            .collection-card {
                height: 400px;
            }
        }
    </style>
    <!-- Hero -->
    <div class="relative px-5 sm:px-10 lg:px-20 w-full pt-26 md:h-[90vh] h-[50vh] pb-14 bg-black overflow-hidden">
        <div id="carousel" class="absolute inset-0 flex transition-transform duration-500 ease-in-out" style="width: 300%;">

            @if (isset($slider) && $slider && isset($slider->sliders) && is_array($slider->sliders) && count($slider->sliders) > 0)
                 <div class="w-full h-full relative">
                    <div id="skeleton-0" class="w-full h-full skeleton absolute inset-0" style="z-index: 10;"></div>
                    <img src="{{ asset('storage/' . $slider->sliders[0]) }}" alt="Hero background 1" loading="eager"
                        class="w-full h-full object-cover absolute inset-0 " style="z-index: 9;"
                        onload="handleImageLoad(0)" />
                </div>
                <div class="w-full h-full relative">
                    <div id="skeleton-1" class="w-full h-full skeleton absolute inset-0" style="z-index: 10;"></div>
                    <img src="{{ asset('storage/' . $slider->sliders[1]) }}" alt="Hero background 2" loading="eager"
                        class="w-full h-full object-cover absolute inset-0 " style="z-index: 9;"
                        onload="handleImageLoad(1)" />
                </div>
                <div class="w-full h-full relative">
                    <div id="skeleton-2" class="w-full h-full skeleton absolute inset-0" style="z-index: 10;"></div>
                    <img src="{{ asset('storage/' . $slider->sliders[2]) }}" alt="Hero background 3" loading="eager"
                        class="w-full h-full object-cover absolute inset-0" style="z-index: 9;"
                        onload="handleImageLoad(2)" />
                </div>
            @else
                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500">No slides available</span>
                </div>
            @endif


        </div>
        <div class="absolute bottom-16 left-0 right-0 flex justify-center">
            <a href="{{ route('all-products-page') }}"
                class="bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 cursor-pointer text-black font-medium py-3 px-8 rounded-md">
                Shop Now
            </a>
        </div>
    </div>

    <!-- Feature Section -->
    @livewire('product-index')

    <!-- Category Section -->
    <section class="px-5 sm:px-10 lg:px-20 py-8">
        <h2 class="text-2xl md:text-[40px] font-medium poppins mb-8">Shop Collection</h2>
        <!-- Grid layout matching the fashion collection style -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            @if ($collections->count() > 0)
                <div class="relative flex-1 h-full md:h-auto md:max-h-[80vh] flex flex-col">
                    <img src="{{ asset('storage/' . $collections[0]['image']) }}" alt="{{ $collections[0]['title'] }}"
                        class="w-full h-full object-cover bg-gray-300" loading="lazy" />
                    <div class="absolute bottom-4 left-4">
                        <h3 class="sm:text-[34px] text-xl poppins text-[#9E0505] font-medium mb-1 md:mb-2">
                            {{ $collections[0]['title'] }}</h3>
                        <a href="{{ route('products-page', ['collection' => $collections[0]['slug']]) }}"
                            class="text-base text-white font-medium flex items-center gap-1 border-b border-white pb-1 w-fit">
                            Collections <span>→</span>
                        </a>
                    </div>
                </div>
            @endif

            <div class="flex flex-col gap-4 flex-1 h-full md:h-auto md:max-h-[77vh]">
                @foreach ($collections as $key => $item)
                    @if ($key > 0 && $key < 3)
                        <div class="relative flex-1 h-1/2">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}"
                                class="w-full h-full object-cover bg-gray-300" loading="lazy" />
                            <div class="absolute bottom-4 left-4">
                                <h3 class="sm:text-[34px] text-xl poppins text-[#9E0505] font-medium mb-1 md:mb-2">
                                    {{ $item['title'] }}</h3>
                                <a href="{{ route('products-page', ['collection' => $item['slug']]) }}"
                                    class="text-base text-white font-medium flex items-center gap-1 border-b border-white pb-1 w-fit">
                                    Collections <span>→</span>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </section>

    <!-- Hurray Section -->
    <div class="flex flex-wrap w-full h-fit items-stretch">
        <div class="bg-[#E0B654] px-5 sm:px-10 py-5 w-full sm:w-1/2 flex flex-col justify-center">
            <h3 class="text-black text-center sm:text-start font-bold mb-2 text-base">
                LIMITED EDITION
            </h3>
            <h1 class="text-2xl text-center sm:text-start md:text-[40px] font-medium poppins mb-2 text-white">
                Hurry up: 30% OFF
            </h1>
            <h3 class="text-[20px] font-normal text-[#fefefe] text-center sm:text-start mb-8">
                Find clubs that are right for your game
            </h3>
            <h4 class="text-base font-normal text-[#fefefe] text-center sm:text-start mb-2">
                Offer expires in:
            </h4>
            <div class="flex justify-center sm:justify-start gap-x-2 mb-6">
                <span id="days" class="bg-white text-black p-2 text-center text-[20px]">00</span>
                <span id="hours" class="bg-white text-black p-2 text-center text-[20px]">00</span>
                <span id="minutes" class="bg-white text-black p-2 text-center text-[20px]">00</span>
                <span id="seconds" class="bg-white text-black p-2 text-center text-[20px]">00</span>
            </div>
            <div class="flex justify-center sm:justify-start">
                <a href="{{ route('all-products-page') }}"
                    class="rounded-xl text-white mx-auto sm:mx-0 font-medium cursor-pointer text-base px-6 py-2 bg-black">
                    Shop now
                </a>
            </div>
        </div>
        <div class="w-full sm:w-1/2">
            @if (count($hurray->hurray_image) > 0)
                <img src="{{ asset('storage/' . $hurray->hurray_image[0]) }}" alt="hurray Image 3"
                    class="h-full w-full bg-gray-300 object-cover" data-loading="true" loading="lazy">
            @else
                <img src="/assets/hurray.jpg" alt="img" class="h-full w-full bg-gray-300 object-cover" />
            @endif

        </div>
    </div>

    <!-- Article Section -->
    <section class="px-5 sm:px-10 lg:px-20 py-8" id="article">
        <div class="flex justify-between items-center mb-6">
            <h1 class="poppins text-[20px] md:text-[40px] font-medium">Latest Articles</h1>
            <a href="{{ route('all-products-page') }}"
                class="text-base text-[#121212] h-fit pb-1 font-medium flex items-center gap-1 border-b border-black hover:border-[#E0B654] transition-colors">
                View More <span>→</span>
            </a>
        </div>
        <div id="" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($articles as $item)
                <div
                    class = "card article-card flex flex-col bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer">

                    <div class="overflow-hidden">
                        <img src="{{ asset('storage/' . $item->images[0]) }}" alt="no"
                            class="article-image w-full h-60 md:h-64 object-cover"
                            style="opacity: 0; transition: opacity 0.3s ease;" />
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-[20px] poppins text-[#23262F] font-medium mb-3 line-clamp-2 flex-1">
                            {{ $item->heading }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {!! $item->content !!}
                        </p>

                        <a href="${article.link}"
                            class="read-more-link text-base text-[#141718] font-medium flex items-center gap-1 border-b border-black pb-1 w-fit mt-auto hover:text-[#E0B654] transition-colors">
                            Read More <span class="transition-transform group-hover:translate-x-1">→</span>
                        </a>
                    </div>
                </div>
            @empty
                <h2>
                    NO ARTICLE
                </h2>
            @endforelse

    </section>

    <!-- Newsletter Section -->
    <div class="bg-[#E0B654] py-18 px-5 bg-no-repeat bg-center h-fit w-full">
        <div class="max-w-[520px] w-full mx-auto">
            <h1 class="poppins text-white text-[20px] md:text-[40px] font-medium text-center mb-0">
                Join Our Newsletter
            </h1>
            <p class="text-center text-normal mt-0 mb:text-[18px] text-sm text-[#fefefe] mb-6">
                Sign up for deals, new products and promotions
            </p>
            <form id="newsletter-form" class="flex items-center pb-2 border-b border-b-[#fefefe] justify-between gap-4"
                onsubmit="handleSubmit(event)">
                <div class="flex gap-x-2 items-center flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V6a2 2 0 012-2h18a2 2 0 012 2v8a2 2 0 01-2 2z" />
                    </svg>
                    <input type="email" id="email-input" placeholder="Email address"
                        class="border-0 placeholder-white text-white outline-none flex-1 py-2 bg-transparent" required
                        aria-label="Email address" />
                </div>
                <button type="submit" class="text-white cursor-pointer">Signup</button>
            </form>
            <p id="message" class="text-white mt-3 text-center hidden"></p>
        </div>
    </div>

    <!-- Newsfeed Section -->
    <div class="py-8 text-center px-5 sm:px-10 lg:px-20">
        <h1 class="text-[#6C7275] font-semibold text-base mb-2">NEWSFEED</h1>
        <h2 class="poppins text-[#141718] font-medium text-[24px] md:text-[40px] mb-2">Instagram</h2>
        <h3 class="text-[#141718] font-normal text-[20px] mb-2">Follow us on social media for more discount &
            promotions
        </h3>
        <h4 class="text-[#6C7275] poppins font-medium text-[20px]">@Idowu_Couture</h4>
    </div>

    <!-- Image Section -->
    <div class="w-full">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6" id="image-grid"></div>
    </div>

    <script>
        const container = document.getElementById('productContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        nextBtn.addEventListener('click', () => {
            container.scrollBy({
                left: 280,
                behavior: 'smooth'
            });
        });

        prevBtn.addEventListener('click', () => {
            container.scrollBy({
                left: -280,
                behavior: 'smooth'
            });
        });

        // Hide/show buttons based on scroll position
        function updateButtons() {
            prevBtn.style.opacity = container.scrollLeft > 0 ? '1' : '0.5';
            nextBtn.style.opacity =
                container.scrollLeft < container.scrollWidth - container.clientWidth ? '1' : '0.5';
        }

        container.addEventListener('scroll', updateButtons);
        updateButtons();
    </script>
@endsection
