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
</style>
     <!-- Feature Slider Section -->
    <section class="py-8 px-4 max-w-7xl mx-auto w-full overflow-hidden">
      <div class="flex justify-between items-center mb-6 overflow-hidden">
        <h2 class="md:text-[28px] text-[20px] font-medium">You might also like</h2>
        <a href="#" class="text-base font-medium text-[#141718] hover:underline">More Products →</a>
      </div>
      <div class="swiper-container ">
        <div class="swiper-wrapper ">
           @livewire('all-product')
        </div>
        <!-- <div class="swiper-pagination mt-4"></div> -->
      </div>
    </section>
    <!-- Newsletter Section -->
    <div class="my-20 px-5 sm:px-10 lg:px-20">
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
   
   
    