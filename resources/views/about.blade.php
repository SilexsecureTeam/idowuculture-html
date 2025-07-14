@extends('layouts.app')
@section('content')
    <style>
        .header-fixed {
            top: 2.5rem;
            /* top-10 */
        }

        .mon {
            font-family: 'Montserrat', sans-serif;
        }

        .rub {
            font-family: 'Rubik', sans-serif;
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 12px;
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        img[data-loading="true"] {
            display: none;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .image-overlay {
            background: linear-gradient(45deg, rgba(224, 182, 84, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
        }

        .stats-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 16px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #E0B654, #667eea);
        }

        .cta-button {
            background: linear-gradient(135deg, #ceaa1a 0%, #a29c4b 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .section-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .section-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <div class="mt-20 w-full">
        <!-- about section -->
        <div class="px-5 sm:px-10 lg:px-20 py-10">
            <!-- First Section: Two Images -->
            <div class="md:h-[80vh] h-fit flex space-x-5">
                <div class="md:w-2/3 w-full h-[80%] relative">
                    <div class="skeleton absolute inset-0"></div>
                    
                    @if (isset($about_details) && $about_details && isset($about_details->images) && is_array($about_details->images) && count($about_details->images) > 0)
                        <img src="{{ asset('storage/' . $about_details->images[0]) }}" alt="About Image 1"
                            class="w-full h-80 object-cover" data-loading="true" loading="lazy">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif

                </div>
                <div class="w-1/3 mt-[4%] h-[80%] relative hidden md:block">
                    <div class="skeleton absolute inset-0"></div>
                    @if (isset($about_details) && $about_details && isset($about_details->images) && is_array($about_details->images) && count($about_details->images) > 0)
                        <img src="{{ asset('storage/' . $about_details->images[1]) }}" alt="About Image 2"
                            class="w-full bg-gray-300  h-full hidden md:block object-cover" data-loading="true"
                            loading="lazy">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Second Section: Image and Story -->
            <div class="flex space-x-5 md:mt-7 md:space-x-10">
                <div class="md:h-60 md:w-60 relative hidden md:block rounded-lg">
                    <div class="skeleton absolute inset-0 rounded-lg"></div>
                    @if (isset($about_details) && $about_details && isset($about_details->images) && is_array($about_details->images) && count($about_details->images) > 0)
                        <img src="{{ asset('storage/' . $about_details->images[2]) }}" alt="About Image 3"
                            class="md:h-60 bg-gray-300 md:w-60 md:block hidden rounded-lg" data-loading="true"
                            loading="lazy">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif

                </div>
                <div class="mt-8 mb-10 flex-1">
                    <h2 class="mon font-bold text-2xl md:text-[40px] text-black">Our Story</h2>
                    <h2 class="mon text-black font-normal md:text-[23px] mt-2 text-base">
                       
                        @if (isset($about_details) && $about_details && isset($about_details->our_story) && is_array($about_details->our_story) && count($about_details->our_story) > 0)
                         {!! $about_details->our_story !!}
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Loading...</span>
                        </div>
                    @endif
                    </h2>
                    {{-- <h2 class="mon text-black font-normal md:text-[23px] mt-2 text-base">
                        Appropriately develop high-quality interfaces vis-a-vis granular e-markets. Globally integrate
                        accurate collaboration and idea-sharing after effective web services. Seamlessly streamline
                        bleeding-edge paradigms for technically.
                    </h2> --}}

                    <h2 class="mon font-bold md:text-2xl md:text-[23px] mt-6 text-base">
                        EST. 2015 <span class="mr-10"></span> 5 DESIGNERS <span class="mr-10"></span> WORLDWIDE DELIVERY
                    </h2>
                </div>
            </div>

            <!-- Third Section: Image and Worldwide Delivery -->
            <div
                class="flex h-full w-full flex-col md:mt-10 md:flex-row gap-4 justify-center md:justify-between items-center md:space-x-10">
                <div class="md:w-1/2 w-full h-60 md:h-90 relative">
                    <div class="skeleton absolute inset-0"></div>
                    @if (isset($about_details) && $about_details && isset($about_details->images) && is_array($about_details->images) && count($about_details->images) > 0)
                        <img src="{{ asset('storage/' . $about_details->images[3]) }}" alt="About Image 4"
                            class="bg-gray-300 w-full h-64 object-cover md:h-90" data-loading="true" loading="lazy">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif

                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="font-bold mb-2 mon text-xl md:text-[30px]">WORLDWIDE DELIVERY</h2>
                    <h2 class="text-normal text-base md:text-xl mon">
                        
                         @if (isset($about_details) && $about_details && isset($about_details->delivery) && is_array($about_details->delivery) && count($about_details->delivery) > 0)
                        {!! $about_details->delivery !!}
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Loading...</span>
                        </div>
                    @endif
                    </h2>
                </div>
            </div>

            <!-- Fourth Section: Full-width Image with Overlay -->
            <div class="relative pt-6">
                <div class="relative h-[60vh] w-full mt-10 md:mt-17 overflow-hidden">
                    <div class="skeleton absolute top-0 left-0 w-full h-[90vh]"></div>
                    @if (isset($about_details) && $about_details && isset($about_details->images) && is_array($about_details->images) && count($about_details->images) > 0)
                        <div class="absolute top-0 left-0 w-full h-[90vh] flex items-center justify-center bg-gray-300">
                            <img src="{{ asset('storage/' . $about_details->images[4]) }}" alt="About Image 5"
                                class="absolute bg-gray-300 top-0 left-0 w-full h-[90vh] object-cover object-top"
                                data-loading="true" loading="lazy">
                        </div>
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No image available</span>
                        </div>
                    @endif

                </div>
                <div
                    class="absolute py-4 md:w-[50%] w-[80%] mon left-1/2 transform -translate-x-1/2 md:text-[40px] text-base font-semibold text-center bottom-[-36px] bg-[#E0B654]">
                    Trusted Product
                </div>
            </div>

            <!-- Fifth Section: Centered Text -->
            <h2 class="mon text-base w-[80%] text-center md:text-start mx-auto mt-20 font-normal md:text-2xl">
                
                  @if (isset($about_details) && $about_details && isset($about_details->statement) && is_array($about_details->statement) && count($about_details->statement) > 0)
                       {!! $about_details->statement !!}
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Loading...</span>
                        </div>
                    @endif
            </h2>

            <!-- Sixth Section: Call to Action -->
            <div class="mt-10 flex w-full items-center gap-3 justify-center space-x-5 flex-col md:flex-row">
                <h2 class="text-[#7A7A7A] rub text-center font-bold text-xl md:text-3xl">
                    Start your journey with us now
                </h2>
                <div class="flex p-2 border border-black items-center space-x-3">
                    <i class="fas fa-envelope text-black"></i>
                    <h2>Email us</h2>
                </div>
            </div>

            <!-- Seventh Section: Newsletter (Secondletter Component) -->
            <div class="mt-25">
                <div class="bg-black w-full text-white md:p-8 py-5 my-8 rounded-xl flex items-center justify-between">
                    <div class="flex w-full flex-col md:flex-row items-center justify-between gap-4 px-4">
                        <div class="text-2xl md:text-[40px] font-bold max-w-[551px] text-center md:text-left">
                            STAY UPTO DATE ABOUT OUR LATEST OFFERS
                        </div>
                        <form class="flex flex-col gap-2 max-w-[350px] w-full">
                            <div class="relative">
                                <input type="email" placeholder="Enter your email address"
                                    class="px-4 pl-8 py-3 rounded-3xl bg-white max-w-[350px] w-full outline-none text-black flex-1">
                                <i class="fas fa-envelope absolute left-2 text-black opacity-80 w-[20px] top-3"></i>
                            </div>
                            <button
                                class="bg-white text-black max-w-[350px] w-full px-4 py-3 rounded-3xl font-semibold hover:bg-gray-200 transition">
                                Subscribe to Newsletter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
