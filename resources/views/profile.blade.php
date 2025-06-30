<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
     .header-fixed {
      top: 2.5rem; /* top-10 */
    }
  </style>
</head>
<body class="w-full pt-26 mx-auto max-w-[1500px]">
    <!-- notification -->
    <div class="fixed top-0 left-0 w-full z-50">
      <div class="bg-[#E0B654] w-full text-black h-10 flex items-center justify-center relative">
        <div class="noti flex justify-center items-center gap-x-2 w-full text-[12px] sm:text-[14px] font-semibold">
           <i class="fa-solid fa-server"></i>
         <h2 class="flex items-center justify-center flex gap-x-2">30% off storewide — Limited time!
          <span class="flex items-center gap-x-1 sm:border-b-2 border-b-1 pb-[0.5px] sm:pb-[1px] border-b-black">
            Shop Now <ArrowRightIcon class="font-light" size={18} />
          </span>
          </h2> 
        </div>
        <i class="fa-solid fa-xmark absolute right-2 sm:right-4 top-3 w-3.5 h-3.5 cursor-pointer"></i>
      </div>
    </div>
<!-- header -->
      <div class="fixed header-fixed left-0 w-full z-50">
    <div class="flex px-5 sm:px-10 lg:px-20 items-center justify-between h-16 bg-white relative">

      <!-- Logo -->
      <img src="assets/logo.jpg" alt="logo" class="h-16" />

      <!-- Desktop Navigation -->
      <ul class="hidden md:flex justify-between items-center w-full max-w-[330px]">
        <li><a href="index.html" class="cursor-pointer font-semibold">Home</a></li>
        <li><a href="about.html" class="text-[#6C7275] cursor-pointer font-medium">About Us</a></li>
        <li><a href="product.html" class="text-[#6C7275] cursor-pointer font-medium">Product</a></a>
</li>
<li><a href="contact.html" class="text-[#6C7275] cursor-pointer font-medium">Contact Us</a></a>
</li>
      </ul>

      <!-- Icons Section -->
      <div class="flex gap-x-3 items-center">
        <i class="fas fa-search text-[#141718] text-lg cursor-pointer"></i>
        <button id="signupBtn" class="signupBtn">
          <a href="signup.html" title="signup">
          <i class="fas fa-user text-[#141718] text-lg cursor-pointer"></i> </a>
        </button>
        <button id="cartBtn" class="relative">
          <a href="cart.html" title="cart">
          <i class="fas fa-shopping-bag text-[#141718] text-lg cursor-pointer"></i> 
          <div id="cartCount" class="hidden absolute bg-black text-white text-[10px] h-4 w-4 rounded-full flex items-center justify-center top-0 -right-2">0</div> </a>
        </button>
      </div>

      <!-- Mobile Menu Toggle -->
      <button id="menuToggle" class="md:hidden ml-2 cursor-pointer" aria-label="Toggle menu">
        <i class="fas fa-bars text-[#141718] text-xl"></i>
      </button>

      <!-- Mobile Menu -->
      <div id="mobileMenu" class="hidden absolute top-full left-0 w-full bg-white shadow-md z-50 md:hidden">
        <ul class="flex flex-col items-center py-4 space-y-2">
          <li><a href="index.html" class="cursor-pointer font-medium">Home</a></li>
          <li><a href="about.html" class="text-[#6C7275] cursor-pointer font-medium">About Us</a></li>
          <li><a href="product.html" class="text-[#6C7275] cursor-pointer font-medium">Product</a></li>
          <li><a href="contact.html" class="text-[#6C7275] cursor-pointer font-medium">Contact Us</a></li>
        </ul>
      </div>

    </div>
  </div>
  <!-- main content -->
  <div class="min-h-fit bg-white flex flex-col pt-15 pb-20 md:flex-row px-5 sm:px-10 lg:px-20">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-[#DCFFEF] shadow md:mr-8 mb-4 md:mb-0 flex flex-col">
      <div class="bg-[#E0B654] text-white text-center py-4 mon font-semibold tracking-wide">
        IDOWUCOUTURE ACCOUNT
      </div>
      <nav class="flex-1 px-6 py-4">
        <ul class="space-y-2">
          <li>
            <a href="/tracking" class="flex items-center cursor-pointer hover:bg-amber-300 poppins font-normal text-[16px] w-full text-[#00659D] px-2 py-2 rounded transition">
              <i class="fas fa-user text-[#2DD4BF] w-4 h-4 mr-2"></i>
              <span class="text-black">Orders</span>
            </a>
          </li>
          <li>
            <button class="flex items-center cursor-pointer hover:bg-amber-300 poppins font-normal text-[16px] w-full text-[#00659D] px-2 py-2 rounded transition">
              <i class="fas fa-heart text-[#2DD4BF] w-4 h-4 mr-2"></i>
              <span class="text-black">Wishlist</span>
            </button>
          </li>
          <li>
            <button class="flex items-center cursor-pointer hover:bg-amber-300 poppins font-normal text-[16px] w-full text-[#00659D] px-2 py-2 rounded transition">
              <i class="fas fa-eye text-[#2DD4BF] w-4 h-4 mr-2"></i>
              <span class="text-black">Recently Viewed</span>
            </button>
          </li>
          <li>
            <button class="flex items-center cursor-pointer hover:bg-amber-300 poppins font-normal text-[16px] w-full text-[#00659D] px-2 py-2 rounded transition">
              <i class="fas fa-user text-[#2DD4BF] w-4 h-4 mr-2"></i>
              <span class="text-black">Profile</span>
            </button>
          </li>
          <li>
            <button class="flex items-center cursor-pointer hover:bg-amber-300 poppins font-normal text-[16px] w-full text-[#00659D] px-2 py-2 rounded transition">
              <i class="fas fa-cog text-[#2DD4BF] w-4 h-4 mr-2"></i>
              <span class="text-black">Setting</span>
            </button>
          </li>
        </ul>
      </nav>
      <div class="p-6">
        <button class="w-full flex items-center cursor-pointer justify-center bg-[#E0B654] text-white py-2 rounded-lg font-semibold hover:bg-green-800 transition">
          <i class="fas fa-sign-out-alt w-4 h-4 mr-2"></i>
          LOGOUT
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-[#DCFFEF] shadow p-4 md:p-8">
      <div class="flex items-center justify-between border-b border-b-C pb-2 mb-4">
        <h2 class="font-semibold text-lg md:text-xl text-[#E0B654]">
          Account Overview
        </h2>
        <button class="text-green-900 hover:bg-green-200 p-2 rounded" aria-label="Edit">
          <i class="fas fa-edit w-5 h-5"></i>
        </button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Account Details -->
        <section class="rounded border min-h-[150px] border-[#00659D]">
          <h3 class="font-medium border-b border-b-[#00659D] p-3 text-black mb-2 text-sm">
            ACCOUNT DETAILS
          </h3>
          <div class="p-4">
            <div class="text-black font-semibold">NSIKAK NELSON</div>
            <div class="text-black text-sm">nsikak.joseph@gmail.com</div>
          </div>
        </section>

        <!-- Address Book -->
        <section class="rounded border min-h-[150px] border-[#00659D]">
          <div class="flex items-center justify-between font-medium border-b border-b-[#00659D] p-3 text-black mb-2 text-sm">
            <h3 class="font-medium text-sm">ADDRESS BOOK</h3>
            <button class="text-green-700 hover:bg-green-100 p-1 rounded" aria-label="Edit Address">
              <i class="fas fa-edit w-4 h-4"></i>
            </button>
          </div>
          <div class="p-4 text-sm">
            24 T Ijagbani Street, Jabi Abuja Nigeria
          </div>
        </section>

        <!-- DOB / Marital Status -->
        <section class="rounded border min-h-[150px] border-[#00659D]">
          <h3 class="font-medium border-b border-b-[#00659D] p-3 text-black text-sm">
            Date of birth/Status
          </h3>
          <div class="flex">
            <div class="w-1/2 border-r h-[100px] flex justify-center items-center border-r-[#00659D]">
              <div class="text-sm">1/1/1990</div>
            </div>
            <div class="w-1/2 text-black h-[100px] flex justify-center items-center">
              <div class="text-sm">Married</div>
            </div>
          </div>
        </section>

        <!-- Newsletter Preferences -->
        <section class="rounded border min-h-[150px] border-[#00659D]">
          <h3 class="font-medium border-b border-b-[#00659D] p-3 text-black mb-2 text-sm">
            NEWSLETTER PREFERENCES
          </h3>
          <div class="p-4 text-sm">
            You are currently subscribed to following newsletters:
          </div>
        </section>
      </div>
    </main>
  </div>
  <!-- Seventh Section: Newsletter (Secondletter Component) -->
    <div class="my-25 px-5 sm:px-10 lg:px-20">
      <div class="bg-black w-full text-white md:p-8 py-5 my-8 rounded-xl flex items-center justify-between">
        <div class="flex w-full flex-col md:flex-row items-center justify-between gap-4 px-4">
          <div class="text-2xl md:text-[40px] font-bold max-w-[551px] text-center md:text-left">
            STAY UPTO DATE ABOUT OUR LATEST OFFERS
          </div>
          <form class="flex flex-col gap-2 max-w-[350px] w-full">
            <div class="relative">
              <input
                type="email"
                placeholder="Enter your email address"
                class="px-4 pl-8 py-3 rounded-3xl bg-white max-w-[350px] w-full outline-none text-black flex-1"
              >
              <i class="fas fa-envelope absolute left-2 text-black opacity-80 w-[20px] top-3"></i>
            </div>
            <button class="bg-white text-black max-w-[350px] w-full px-4 py-3 rounded-3xl font-semibold hover:bg-gray-200 transition">
              Subscribe to Newsletter
            </button>
          </form>
        </div>
      </div>
    </div>
 <!-- Footer -->
  <footer class="bg-black text-white px-5 sm:px-10 lg:px-20 py-10">
    <div class="w-full mx-auto flex flex-col md:flex-row md:justify-between gap-10 md:gap-0">
      
      <!-- Logo & Socials -->
      <div id="footer-left" class="md:w-1/3 mb-2 md:mb-0 border-b-1 border-b-gray-700 md:border-b-0 pb-4">
        <img src="assets/logo.png" alt="logo" class="h-20 mb-4" />
        <p class="text-[20px] poppins font-medium text-[#fefefe] mb-6">
          More than just a game.<br>It’s a lifestyle.
        </p>
        <div class="flex gap-4">
          <a href="#" aria-label="Instagram" class="text-[#fefefe]"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" aria-label="Facebook" class="text-[#fefefe]"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" aria-label="YouTube" class="text-[#fefefe]"><i class="fab fa-youtube fa-lg"></i></a>
        </div>
      </div>

      <!-- Link Sections -->
      <div class="flex flex-wrap justify-between md:justify-start gap-10" id="footer-sections">
        
        <!-- Page -->
        <div class="md:w-[160px] w-full border-b-1 border-b-gray-700 md:border-b-0 pb-4">
          <div class="flex justify-between items-center">
            <h3 class="font-medium mb-4 poppins text-[16px] text-[#fefefe]">Page</h3>
            <button data-section="page" class="md:hidden">
              <i class="fas fa-chevron-up"></i>
            </button>
          </div>
          <ul data-list="page" class="space-y-3 text-[14px] text-[#fefefe]">
            <li><a href="index.html" class="hover:text-white transition">Home</a></li>
            <li><a href="about.html" class="hover:text-white transition">About Us</a></li>
            <li><a href="product.html" class="hover:text-white transition">Product</a></li>
            <li><a href="#article" class="hover:text-white transition">Articles</a></li>
            <li><a href="contact.html" class="hover:text-white transition">Contact Us</a></li>
          </ul>
        </div>

        <!-- Info -->
        <div class="md:w-[160px] w-full border-b-1 border-b-gray-700 md:border-b-0 pb-4">
          <div class="flex justify-between items-center">
            <h3 class="font-medium mb-4 poppins text-[16px] text-[#fefefe]">Info</h3>
            <button data-section="info" class="md:hidden">
              <i class="fas fa-chevron-up"></i>
            </button>
          </div>
          <ul data-list="info" class="space-y-3 text-[14px] text-[#fefefe]">
            <li><a href="#" class="hover:text-white transition">Shipping Policy</a></li>
            <li><a href="#" class="hover:text-white transition">Return & Refund</a></li>
            <li><a href="term.html" class="hover:text-white transition">Terms and Condition</a></li>
            <li><a href="privacy.html" class="hover:text-white transition">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-white transition">FAQs</a></li>
          </ul>
        </div>

        <!-- Office -->
        <div class="md:w-[160px] w-full">
          <div class="flex justify-between items-center">
            <h3 class="font-medium mb-4 poppins text-[16px] text-[#fefefe]">Office</h3>
            <button data-section="office" class="md:hidden">
              <i class="fas fa-chevron-up"></i>
            </button>
          </div>
          <ul data-list="office" class="space-y-1.5 text-[14px] text-[#fefefe]">
            <li>Idowu Couture, Hse 120, adjacent TASTIA Restaurant 35Road junction, 3rd Avenue Gwarinpa</li>
            <li>Abuja</li>
            <li class="mt-3">+234 80234545061</li>
          </ul>
        </div>

      </div>
    </div>

    <!-- Bottom Area -->
    <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
      
      <!-- Mobile -->
      <div class="flex flex-col gap-6 md:hidden text-center">
        <div class="flex gap-2 items-center justify-center flex-wrap">
          <img src="assets/visa.png" class="h-6" alt="Visa" />
          <img src="assets/express.png" class="h-6" alt="Amex" />
          <img src="assets/card.png" class="h-6" alt="Mastercard" />
          <img src="assets/stripe.png" class="h-6" alt="Stripe" />
          <img src="assets/pay.png" class="h-6" alt="PayPal" />
          <img src="assets/paypal.png" class="h-6" alt="Apple Pay" />
        </div>
        <ul class="flex gap-4 text-[#6C7275] text-[12px] justify-center poppins">
          <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
          <li><a href="#" class="hover:text-white">Terms & Conditions</a></li>
        </ul>
        <p class="text-[#E8ECEF] poppins text-[12px]">
          © 2025 Idowucouture. All rights reserved
        </p>
      </div>

      <!-- Desktop -->
      <div class="hidden md:flex w-full items-center justify-between">
        <p class="text-[#E8ECEF] poppins text-[12px]">
          © 2025 Idowucouture. All rights reserved |
          <a href="#" class="text-[#6C7275] hover:text-white ml-1">Privacy Policy</a>
          <a href="#" class="text-[#6C7275] hover:text-white ml-1">Terms & Conditions</a>
        </p>
        <div class="flex gap-2 items-center flex-wrap">
          <img src="assets/visa.png" class="h-6" alt="Visa" />
          <img src="assets/express.png" class="h-6" alt="Amex" />
          <img src="assets/card.png" class="h-6" alt="Mastercard" />
          <img src="assets/stripe.png" class="h-6" alt="Stripe" />
          <img src="assets/pay.png" class="h-6" alt="PayPal" />
          <img src="assets/paypal.png" class="h-6" alt="Apple Pay" />
        </div>
      </div>

    </div>
  </footer>
</body>
<script  src="header.js"></script>
</html>
