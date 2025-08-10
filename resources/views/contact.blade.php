@extends('layouts.app')
@section('content')
    <!-- Thank You Message (Initially Hidden) -->
    <div id="thankYouMessage" class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto mt-20 hidden">
        <div class="text-center py-10">
            <h2 class="text-2xl font-bold text-green-600 mb-4">Thank You!</h2>
            <p class="mb-6">
                Your message has been submitted successfully. We'll get back to you soon.
            </p>
            <button onclick="handleNewMessage()"
                class="bg-[#38CB89] text-white py-2 px-6 rounded-md transition-colors hover:bg-green-600">
                Send Another Message
            </button>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Main Contact Form (Initially Visible) -->
    <div id="mainContent">
        <!-- Hero Image Section -->
        <div class="relative w-full ">
            <div class="relative w-full h-[55vh] overflow-hidden">
                <div class=" min-w-[100vw] min-h-[50vh]">
                    <img src="/assets/contact.png" alt="Contact us" class="h-full w-full object-cover object-center loading"
                        onload="this.classList.remove('loading'); this.classList.add('loaded');"
                        onerror="this.style.display='none';" />
                </div>
            </div>
        </div>

        <!-- Service Cards Section -->
        <div class="flex justify-center mt-15 items-center flex-wrap gap-x-6 gap-6">
            <!-- Policy Question -->
            <div class="bg-[#1F83401A] p-8 gap-4 rounded-lg flex flex-col items-center text-center">
                <i class="fas fa-question-circle w-8 h-8 text-teal-600 mb-3 text-2xl"></i>
                <h3 class="text-md font-semibold text-gray-800 mb-2">
                    Policy Question
                </h3>
                <p class="text-gray-600 text-sm w-[200px]">
                    Have a question about our products, please contact idowucouture.
                </p>
            </div>

            <!-- Report a Case -->
            <div class="bg-[#1F83401A] p-8 gap-4 rounded-lg flex flex-col items-center text-center">
                <i class="fas fa-exclamation-triangle w-8 h-8 text-teal-600 mb-3 text-2xl"></i>
                <h3 class="text-md font-semibold text-gray-800 mb-2">
                    Report a case
                </h3>
                <p class="text-gray-600 text-sm w-[200px]">
                    We guide you through the simple, hassle-free process securing your items.
                </p>
            </div>

            <!-- Ongoing Support -->
            <div class="bg-[#1F83401A] p-8 gap-4 rounded-lg flex flex-col items-center text-center">
                <i class="fas fa-headphones w-8 h-8 text-teal-600 mb-3 text-2xl"></i>
                <h3 class="text-md font-semibold text-gray-800 mb-2">
                    Ongoing Support
                </h3>
                <p class="text-gray-600 text-sm w-[200px]">
                    Enjoy peace of mind with our 24/7 support and assistance whenever you need it.
                </p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="py-20 pt-20" id="aniSection">
            <div
                class="bg-[#7AB58D0D] px-5 md:px-10 text-black lg:px-20 mb-5 py-10 flex space-x-10 items-start flex-wrap justify-center sm:justify-around">
                <!-- Contact Information Section -->
                <div class="grid gap-6 mb-6">
                    <!-- Enquiry Section -->
                    <div
                        class="bg-white max-w-[350px] border h-fit border-gray-500 sm:max-w-[500px] p-4 md:px-8 rounded-lg">
                        <div class="flex items-start">
                            <img src="/assets/call.png" alt="call" class="w-10 h-10 mr-2 loading"
                                onload="this.classList.remove('loading'); this.classList.add('loaded');"
                                onerror="this.style.display='none';" />
                            <div>
                                <h2 class="text-base poppins font-medium text-[#383C39]">
                                    Enquiry now
                                </h2>
                                <p class="text-black font-bold poppin text-[18px]">
                                    +234 80234545061
                                </p>
                                <p class="text-black font-bold poppin text-[16px]">
                                    info@idowucouture.ng
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div
                        class="bg-white max-w-[350px] border h-fit border-gray-500 sm:max-w-[500px] p-4 md:px-8 rounded-lg">
                        <div class="flex items-start mb-3">
                            <img src="/assets/geo.png" alt="location" class="w-10 h-10 mr-2 loading"
                                onload="this.classList.remove('loading'); this.classList.add('loaded');"
                                onerror="this.style.display='none';" />
                            <div>
                                <h2 class="text-base poppins font-medium text-[#383C39]">
                                    Address
                                </h2>
                                <p class="text-black poppins text-[16px] max-w-[300px]">
                                    Idowu Couture, Hse 120, adjacent TASTIA Restaurant 35Road
                                    junction, 3rd Avenue Gwarinpa
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="mb-6 flex-1">
                    <div id="formSection">
                        <h1 class="poppins font-medium text-[18px] md:text-[20px] text-[#6F6969] mb-1">
                            I'M NEW HERE
                        </h1>
                        <h1 class="text-2xl md:text-3xl font-medium text-black poppins mb-1">
                            Interested in a product?
                        </h1>
                        <h2 class="text-[#575454] poppins font-medium text-[20px] md:text-[25px] mb-1">
                            Talk to our sales team.
                        </h2>
                        <p class="text-gray-500 text-sm md:text-base poppins font-normal">
                            From questions about insurance to online personal policy, we're
                            here to connect & help get you started.
                        </p>

                        <div class="bg-white p-8 mt-4 rounded-lg shadow-md w-full max-w-3xl">
                            <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                                @csrf
                                <!-- Full Name and Email - Side by side on sm and above -->
                                <div class="flex flex-col sm:flex-row gap-4 mb-4">
                                    <div class="flex-1">
                                        <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">
                                            Full Name *
                                        </label>
                                        <input type="text" id="fullName" name="fullName"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200"
                                            placeholder="John Doe" />
                                        <p id="fullNameError" class="mt-1 text-sm text-red-600 hidden"></p>

                                    </div>

                                    <div class="flex-1">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                            Email Address *
                                        </label>
                                        <input type="email" id="email" name="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200"
                                            placeholder="johndoe@example.com" />
                                        <p id="emailError" class="mt-1 text-sm text-red-600 hidden"></p>
                                    </div>
                                </div>

                                <!-- Phone and Subject - Side by side on sm and above -->
                                <div class="flex flex-col sm:flex-row gap-4 mb-4">
                                    <div class="flex-1">
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                            Phone Number *
                                        </label>
                                        <input type="tel" id="phone" name="phone"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200"
                                            placeholder="(123) 456-7890" />
                                        <p id="phoneError" class="mt-1 text-sm text-red-600 hidden"></p>
                                    </div>

                                    <div class="flex-1">
                                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                                            Subject *
                                        </label>
                                        <select id="subject" name="subject"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200">
                                            <option value="">Select a topic</option>
                                            <option value="General Inquiry">General Inquiry</option>
                                            <option value="Technical Support">Technical Support</option>
                                            <option value="Billing Question">Billing Question</option>
                                            <option value="Partnership Opportunity">Partnership Opportunity</option>
                                            <option value="Feedback">Feedback</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <p id="subjectError" class="mt-1 text-sm text-red-600 hidden"></p>
                                    </div>
                                </div>

                                <!-- Message Textarea -->
                                <div class="mb-6">
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                                        Your Message *
                                    </label>
                                    <textarea id="message" name="message" rows="5"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200"
                                        placeholder="Please enter your message here..."></textarea>
                                    <p id="messageError" class="mt-1 text-sm text-red-600 hidden"></p>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" id="submitBtn"
                                        class="px-6 py-3 rounded-md bg-[#E0B654] transition duration-300 ease-in-out transform hover:scale-105 cursor-pointer text-white font-medium hover:bg-amber-300 hover:text-black transition-colors">
                                        Submit Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-5 sm:px-10 lg:px-20 py-10">
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
