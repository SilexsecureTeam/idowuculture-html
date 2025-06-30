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
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
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
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .image-overlay {
            background: linear-gradient(45deg, rgba(224, 182, 84, 0.1) 0%, rgba(0,0,0,0.3) 100%);
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
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
        <!-- Hero Section with improved spacing -->
        <div class="px-5 sm:px-10 lg:px-20 py-16">
            
            <!-- Enhanced First Section: Two Images with better composition -->
            <div class="section-reveal mb-20">
                <div class="text-center mb-12">
                    <h1 class="mon text-4xl md:text-6xl font-bold text-black mb-4">About Our Journey</h1>
                    <p class="text-gray-600 text-lg md:text-xl max-w-2xl mx-auto">Crafting excellence since 2015, delivering quality products worldwide</p>
                </div>
                
                <div class="md:h-[80vh] h-fit flex gap-6">
                    <div class="md:w-2/3 w-full h-full relative group hover-lift">
                        <div class="skeleton absolute inset-0 rounded-2xl"></div>
                        <img src="{{ asset('assets/dimage1.jpg') }}" 
                             alt="About Image 1" 
                             class="w-full h-full object-cover rounded-2xl shadow-2xl" 
                             data-loading="true" loading="lazy">
                        <div class="absolute inset-0 image-overlay rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="w-1/3 mt-[8%] h-[70%] relative hidden md:block group hover-lift">
                        <div class="skeleton absolute inset-0 rounded-2xl"></div>
                        <img src="{{ asset('assets/dimage2.jpg') }}" 
                             alt="About Image 2"
                             class="w-full h-full object-cover rounded-2xl shadow-xl" 
                             data-loading="true" loading="lazy">
                        <div class="absolute inset-0 image-overlay rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Second Section: Our Story with better typography -->
            <div class="section-reveal mb-20">
                <div class="flex gap-8 md:gap-16 items-start">
                    <div class="md:h-80 md:w-80 relative hidden md:block rounded-2xl group hover-lift">
                        <div class="skeleton absolute inset-0 rounded-2xl"></div>
                        <img src="{{ asset('assets/dimage2.jpg') }}" 
                             alt="About Image 3"
                             class="w-full h-full object-cover rounded-2xl shadow-xl" 
                             data-loading="true" loading="lazy">
                        <div class="absolute inset-0 image-overlay rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <div class="flex-1 space-y-8">
                        <div>
                            <h2 class="mon font-bold text-3xl md:text-5xl text-gray-900 mb-6">Our Story</h2>
                            <p class="mon text-gray-700 text-lg md:text-xl leading-relaxed">
                                Appropriately develop high-quality interfaces vis-a-vis granular e-markets. Globally integrate
                                accurate collaboration and idea-sharing after effective web services. Seamlessly streamline
                                bleeding-edge paradigms for technically sound solutions.
                            </p>
                        </div>
                        
                        <!-- Enhanced Stats Section -->
                        <div class="stats-card">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-gray-900 mb-2">EST. 2015</div>
                                    <div class="text-gray-600">Years of Excellence</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-gray-900 mb-2">5+</div>
                                    <div class="text-gray-600">Expert Designers</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-gray-900 mb-2">50+</div>
                                    <div class="text-gray-600">Countries Served</div>
                                </div>
                            </div>
                        </div>
                        
                        <p class="mon text-gray-700 text-lg leading-relaxed">
                            Appropriately develop high-quality interfaces vis-a-vis granular e-markets. Globally integrate
                            accurate collaboration and idea-sharing after effective web services. Seamlessly streamline
                            bleeding-edge paradigms for technically sound ROI.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Enhanced Third Section: Worldwide Delivery -->
            <div class="section-reveal mb-20">
                <div class="flex flex-col md:flex-row gap-8 md:gap-16 items-center">
                    <div class="w-full md:w-1/2 relative group hover-lift">
                        <div class="skeleton absolute inset-0 rounded-2xl"></div>
                        <img src="{{ asset('assets/dimage3.jpg') }}" 
                             alt="About Image 4"
                             class="w-full h-80 md:h-96 object-cover rounded-2xl shadow-xl" 
                             data-loading="true" loading="lazy">
                        <div class="absolute inset-0 image-overlay rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <div class="w-full md:w-1/2 space-y-6">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-[#E0B654] to-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-globe text-white text-xl"></i>
                            </div>
                            <h2 class="font-bold mon text-2xl md:text-4xl text-gray-900">WORLDWIDE DELIVERY</h2>
                        </div>
                        
                        <p class="text-gray-700 text-lg leading-relaxed mon">
                            Appropriately develop high-quality interfaces vis-a-vis granular e-markets. Globally integrate
                            accurate collaboration and idea-sharing after effective web services. Seamlessly streamline
                            bleeding-edge paradigms for technically sound ROI.
                        </p>
                        
                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-xl border-l-4 border-[#E0B654]">
                            <p class="text-gray-700 leading-relaxed mon">
                                Globally integrate accurate collaboration and idea-sharing after effective web services.
                                Seamlessly streamline bleeding-edge paradigms for technically sound ROI.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Fourth Section: Full-width Hero Image -->
            <div class="section-reveal mb-20">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <div class="relative h-[70vh] w-full">
                        <div class="skeleton absolute inset-0"></div>
                        <img src="{{ asset('assets/dimage4.jpg') }}" 
                             alt="About Image 5"
                             class="absolute inset-0 w-full h-full object-cover" 
                             data-loading="true" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Enhanced overlay badge -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 -bottom-8">
                        <div class="glass-effect px-8 py-4 rounded-2xl shadow-2xl">
                            <h3 class="mon text-xl md:text-3xl font-bold text-white text-center">
                                Trusted Quality Products
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Fifth Section: Mission Statement -->
            <div class="section-reveal mb-20 text-center">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100">
                        <div class="w-16 h-16 bg-gradient-to-r from-[#E0B654] to-yellow-400 rounded-full mx-auto mb-8 flex items-center justify-center">
                            <i class="fas fa-quote-left text-white text-2xl"></i>
                        </div>
                        <blockquote class="mon text-lg md:text-2xl text-gray-700 leading-relaxed italic">
                            "Appropriately develop high-quality interfaces vis-a-vis granular e-markets. Globally integrate accurate
                            collaboration and idea-sharing after effective web services. Seamlessly streamline bleeding-edge
                            paradigms for technically sound solutions that drive innovation."
                        </blockquote>
                    </div>
                </div>
            </div>

            <!-- Enhanced Sixth Section: Call to Action -->
            <div class="section-reveal mb-20">
                <div class="bg-gray-800 rounded-3xl p-8 md:p-16 text-center shadow-2xl">
                    <h2 class="text-white rub font-bold text-2xl md:text-4xl mb-8">
                        Start your journey with us now
                    </h2>
                    
                    <div class="flex flex-col md:flex-row gap-6 justify-center items-center">
                        <button class="cta-button text-white px-8 py-4 rounded-full font-semibold text-lg flex items-center space-x-3 hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-envelope"></i>
                            <span>Email us</span>
                        </button>
                        
                        <button class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 flex items-center space-x-3">
                            <i class="fas fa-phone"></i>
                            <span>Call us</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Enhanced Newsletter Section -->
            <div class="section-reveal">
                <div class="bg-black text-white p-8 md:p-12 rounded-3xl shadow-2xl relative overflow-hidden">
                    <!-- Background decoration -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-[#E0B654]/20 to-transparent rounded-full -translate-y-32 translate-x-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-purple-500/20 to-transparent rounded-full translate-y-24 -translate-x-24"></div>
                    
                    <div class="relative flex flex-col md:flex-row items-center justify-between gap-8">
                        <div class="text-center md:text-left max-w-md">
                            <h3 class="text-2xl md:text-4xl font-bold mb-4">
                                STAY UP TO DATE ABOUT OUR LATEST OFFERS
                            </h3>
                            <p class="text-gray-300">Join thousands of satisfied customers</p>
                        </div>
                        
                        <form class="flex flex-col gap-4 max-w-sm w-full">
                            <div class="relative">
                                <input type="email" 
                                       placeholder="Enter your email address"
                                       class="w-full px-6 py-4 pl-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 outline-none text-white placeholder-gray-300 focus:border-[#E0B654] transition-colors">
                                <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                            </div>
                            <button class="cta-button w-full px-6 py-4 rounded-full font-semibold text-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                                Subscribe to Newsletter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
        