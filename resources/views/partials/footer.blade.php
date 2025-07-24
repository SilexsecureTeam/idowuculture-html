  <!-- Footer -->
  <footer class="bg-black text-white px-5 sm:px-10 lg:px-20 py-10">
      <div class="w-full mx-auto flex flex-col md:flex-row md:justify-between gap-10 md:gap-0">
          <div id="footer-left" class="md:w-1/3 mb-2 md:mb-0 border-b border-b-gray-700 md:border-b-0 pb-4">
              <img src="/assets/logo.png" alt="logo" class="h-20 mb-4" />
              <p class="text-[20px] poppins font-medium text-[#fefefe] mb-6 text-center md:text-left">
                  More than just a game.<br>It’s a lifestyle.
              </p>
              <div class="flex gap-4 justify-center md:justify-start">
                  <a href="#" aria-label="Instagram" class="text-[#fefefe]"><i
                          class="fab fa-instagram fa-lg"></i></a>
                  <a href="#" aria-label="Facebook" class="text-[#fefefe]"><i
                          class="fab fa-facebook fa-lg"></i></a>
                  <a href="#" aria-label="YouTube" class="text-[#fefefe]"><i class="fab fa-youtube fa-lg"></i></a>
              </div>
          </div>
          <div class="flex flex-wrap justify-between md:justify-start gap-10">
              <div class="md:w-[160px] w-full border-b border-b-gray-700 md:border-b-0 pb-4">
                  <div class="flex justify-between items-center">
                      <h3 class="font-medium mb-4 poppins text-[16px] text-[#fefefe]">Page</h3>
                      <button data-section="page" class="md:hidden">
                          <i class="fas fa-chevron-up"></i>
                      </button>
                  </div>
                  <ul data-list="page" class="space-y-3 text-[14px] text-[#fefefe]">
                      <li><a href="{{ '/' }}" class="hover:text-white transition">Home</a></li>
                      <li><a href="{{ route('about-page') }}" class="hover:text-white transition">About Us</a></li>
                      <li><a href="{{ route('all-products-page') }}" class="hover:text-white transition">Product</a></li>
                      <li><a href="#" class="hover:text-white transition">Articles</a></li>
                      <li><a href="{{ route('contact-page') }}" class="hover:text-white transition">Contact Us</a></li>
                  </ul>
              </div>
              <div class="md:w-[160px] w-full border-b border-b-gray-700 md:border-b-0 pb-4">
                  <div class="flex justify-between items-center">
                      <h3 class="font-medium mb-4 poppins text-[16px] text-[#fefefe]">Info</h3>
                      <button data-section="info" class="md:hidden">
                          <i class="fas fa-chevron-up"></i>
                      </button>
                  </div>
                  <ul data-list="info" class="space-y-3 text-[14px] text-[#fefefe]">
                      <li><a href="#" class="hover:text-white transition">Shipping Policy</a></li>
                      <li><a href="#" class="hover:text-white transition">Return & Refund</a></li>
                      <li><a href="term.html" class="hover:text-white transition">Terms and Conditions</a></li>
                      <li><a href="privacy.html" class="hover:text-white transition">Privacy Policy</a></li>
                      <li><a href="#" class="hover:text-white transition">FAQs</a></li>
                  </ul>
              </div>
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
                      <li class="mt-3">+234 8023454506</li>
                  </ul>
              </div>
          </div>
      </div>
      <div
          class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
          <div class="flex flex-col gap-6 md:hidden text-center">
              <div class="flex gap-2 items-center justify-center flex-wrap">
                  <img src="/assets/visa.png" class="h-6" alt="Visa" />
                  <img src="/assets/express.png" class="h-6" alt="Amex" />
                  <img src="/assets/card.png" class="h-6" alt="Mastercard" />
                  <img src="/assets/stripe.png" class="h-6" alt="Stripe" />
                  <img src="/assets/pay.png" class="h-6" alt="PayPal" />
                  <img src="/assets/paypal.png" class="h-6" alt="Apple Pay" />
              </div>
              <ul class="flex gap-4 text-[#6C7275] text-[12px] justify-center poppins">
                  <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                  <li><a href="#" class="hover:text-white">Terms & Conditions</a></li>
              </ul>
              <p class="text-[#E8ECEF] poppins text-[12px]">
                  © 2025 Idowucouture. All rights reserved
              </p>
          </div>
          <div class="hidden md:flex w-full items-center justify-between">
              <p class="text-[#E8ECEF] poppins text-[12px]">
                  © 2025 Idowucouture. All rights reserved |
                  <a href="#" class="text-[#6C7275] hover:text-white ml-1">Privacy Policy</a>
                  <a href="#" class="text-[#6C7275] hover:text-white ml-1">Terms & Conditions</a>
              </p>
              <div class="flex gap-2 items-center flex-wrap">
                  <img src="/assets/visa.png" class="h-6" alt="Visa" />
                  <img src="/assets/express.png" class="h-6" alt="Amex" />
                  <img src="/assets/card.png" class="h-6" alt="Mastercard" />
                  <img src="/assets/stripe.png" class="h-6" alt="Stripe" />
                  <img src="/assets/pay.png" class="h-6" alt="PayPal" />
                  <img src="/assets/paypal.png" class="h-6" alt="Apple Pay" />
              </div>
          </div>
      </div>
  </footer>
  
