<!DOCTYPE html>
@extends('layouts.app')
@section('content')
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .header-fixed {
        top: 2.5rem;
      }
      .feature-wrapper {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 4 per row for large screens */
        gap: 1rem;
        padding: 0 1rem;
      }

      @media (max-width: 1024px) {
        .feature-wrapper {
          grid-template-columns: repeat(2, 1fr); /* 2 per row for smaller screens */
        }
      }

      @media (max-width: 640px) {
        .feature-wrapper {
          grid-template-columns: 1fr; /* 1 per row for mobile */
        }
      }

      /* Custom feature section layout */
      .feature-section-custom {
        display: flex;
        flex-direction: row;
        gap: 2rem;
        width: 100%;
      }

      /* Filter on the left, product on the right (desktop) */
      .filter-dropdown-container-custom {
        max-width: 260px;
        background: #f9f9f9;
        padding: 1rem;
        border-radius: 0.375rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
        margin-bottom: 0;
        display: block;
      }
      .feature-container-custom {
        flex: 1;
        overflow-x: hidden;
        max-height: calc(100vh - 12rem);
        overflow-y: scroll;
        scrollbar-width: thin;
        scrollbar-color: #E0B654 #f0f0f0;
      }

      /* Responsive: stack vertically on small screens */
      @media (max-width: 1024px) {
        .feature-section-custom {
          flex-direction: column;
          gap: 1.5rem;
        }
        .filter-dropdown-container-custom {
          width: 100%;
          margin-bottom: 1rem;
          display: block !important;
        }
        .feature-container-custom {
          max-height: calc(100vh - 16rem);
        }
      }

      /* Hide filter toggle button (not needed anymore) */
      .filter-toggle {
        display: none !important;
      }

      /* Overlay for buttons */
      .overlay {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 0.375rem 0.375rem 0 0;
        opacity: 0;
        transition: opacity 0.3s ease;
      }
      .overlay.active {
        opacity: 1;
      }
    </style>

    <!-- Feature Section with Dropdown Filter -->
    <section class="w-full mx-auto py-8 px-5 sm:px-10 lg:px-20">
      <!-- Feature Title -->
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl md:text-[40px] poppins text-black font-semibold">Browse all our products</h2>
        <div class="swiper-pagination"></div>
      </div>
      <!-- Responsive Grid: Filter | Products -->
      <div class="feature-section-custom w-full">
        <!-- Filter (always visible on small, left on large) -->
        <div class="filter-dropdown-container-custom mx-auto" id="filterDropdown">
          <h3 class="poppins font-semibold mb-3">Categories</h3>
          <select
            class="filter-dropdown border-2 border-[#E0B654] rounded-2xl p-2 focus:outline-none focus:ring-1 focus:ring-[#E0B654] focus:border-[#E0B654] transition"
            onchange="filterProducts()"
          >
            <option value="All" selected>All</option>
            <option value="Women’s Wear">Women’s Wear</option>
            <option value="Men’s Wear">Men’s Wear</option>
            <option value="Children Female Wear">Children Female Wear</option>
            <option value="Children Male Wear">Children Male Wear</option>
            <option value="Accessories">Accessories</option>
          </select>
        </div>
        <!-- Products -->
        <div class="feature-container-custom">
          <div class="swiper-wrapper feature-wrapper">
            <!-- Products will be dynamically inserted here -->
          </div>
        </div>
      </div>
    </section>
   
    <!-- Scripts -->
    <script>
      // Sample products data with categories
      const products = [
        {
          id: 1,
          name: "Men's Cabretta Golf Glove",
          price: 19.0,
          image: "/assets/fimage1.jpg",
          rating: 5,
          hot: true,
          discount: null,
          category: "Accessories"
        },
        {
          id: 2,
          name: "Greg Norman - Men's Shirt",
          price: 24.99,
          originalPrice: 40.0,
          image: "/assets/fimage2.jpg",
          rating: 5,
          hot: true,
          discount: 50,
          category: "Men’s Wear"
        },
        {
          id: 3,
          name: "G/FORE - Mens 2023",
          price: 30.0,
          image: "/assets/fimage3.jpg",
          rating: 5,
          hot: true,
          discount: null,
          category: "Men’s Wear"
        },
        {
          id: 4,
          name: "Utility Rover-R Double - 2023",
          price: 209.99,
          image: "/assets/fimage4.jpg",
          rating: 5,
          hot: true,
          discount: null,
          category: "Accessories"
        },
        {
          id: 5,
          name: "Air Jordan 1 - SS23",
          price: 111.99,
          originalPrice: 200.0,
          image: "/assets/fimage5.jpg",
          rating: 5,
          hot: true,
          discount: 50,
          category: "Women’s Wear"
        },
        {
          id: 6,
          name: "Children's Floral Dress",
          price: 29.99,
          originalPrice: 50.0,
          image: "/assets/fimage6.jpg",
          rating: 4,
          hot: false,
          discount: 40,
          category: "Children Female Wear"
        },
        {
          id: 7,
          name: "Boys' Casual Jacket",
          price: 34.99,
          image: "/assets/fimage7.jpg",
          rating: 5,
          hot: true,
          discount: null,
          category: "Children Male Wear"
        }
      ];

      // Filter products function
      function filterProducts() {
        const dropdown = document.querySelector('.filter-dropdown');
        const selectedCategory = dropdown.value;

        // Filter products based on selected category
        let filteredProducts = products;
        if (selectedCategory !== 'All') {
          filteredProducts = products.filter(product => product.category === selectedCategory);
        }

        renderFilteredProducts(filteredProducts);
      }

      // Modified renderProducts to handle filtered products
      function renderFilteredProducts(filteredProducts) {
        const swiperWrapper = document.querySelector('.swiper-wrapper');
        swiperWrapper.innerHTML = '';
        filteredProducts.forEach((product) => {
          const slide = document.createElement('div');
          slide.className = 'swiper-slide pl-5 sm:pl-10';
          slide.setAttribute('data-product-id', product.id);

          const cartItem = cart.find((item) => item.id === product.id && item.color === 'default');
          const qty = cartItem ? cartItem.qty : 0;
          const buttonText = qty > 0 ? `Add to cart (${qty})` : 'Add to cart';

          slide.innerHTML = `
            <div class="bg-white rounded-md relative clickable-product">
              ${product.hot ? `<span class="absolute top-3 left-3 bg-white text-black text-xs font-semibold px-2 py-0.5 rounded z-20">HOT</span>` : ''}
              ${product.discount ? `<span class="absolute top-3 left-16 bg-green-500 text-white text-xs font-semibold px-2 py-0.5 rounded z-20">-${product.discount}%</span>` : ''}
              <div class="image-container h-56"
                   onmouseenter="if (window.innerWidth >= 768) toggleButtons(${product.id}, true)"
                   onmouseleave="if (window.innerWidth >= 768) toggleButtons(${product.id}, false)"
                   onclick="if (window.innerWidth < 768) toggleButtons(${product.id}, !document.querySelector('[data-product-id=${product.id}] .overlay').classList.contains('active'))">
                <img src="${product.image}" alt="${product.name}" class="w-full h-56 object-cover bg-black rounded-t-md" style="display: none;" />
                <div class="absolute inset-0 bg-gray-200 rounded-t-md animate-pulse"></div>
                <div class="overlay flex flex-col gap-2 items-center justify-center absolute inset-0 bg-black bg-opacity-50 rounded-t-md">
                  <button class="add-to-cart ${window.innerWidth >= 768 ? 'bg-black text-white text-sm py-2 px-6 rounded' : 'bg-black text-white p-2 rounded-full'} hover:bg-gray-800 transition-all duration-300"
                          aria-label="Add ${product.name} to cart"
                          onclick="event.stopPropagation(); handleAddToCart(${product.id})">
                    ${window.innerWidth >= 768 ? buttonText : '<i class="fas fa-shopping-cart w-5 h-5"></i>'}
                  </button>
                  <button class="${window.innerWidth >= 768 ? 'bg-gray-900 text-white text-sm py-2 px-6 rounded' : 'bg-gray-900 text-white p-2 rounded-full'} hover:bg-green-500 transition-all duration-300"
                          onclick="event.stopPropagation(); window.location.href = 'product.html?id=${product.id}'">
                    ${window.innerWidth >= 768 ? 'View Details' : '<i class="fas fa-eye w-5 h-5"></i>'}
                  </button>
                </div>
              </div>
              <div class="px-3 pt-3">
                <div class="flex text-yellow-400 mb-1">
                  ${Array(5).fill().map((_, i) => `
                    <svg class="w-4 h-4 fill-current ${i < product.rating ? 'text-yellow-400' : 'text-gray-300'}" viewBox="0 0 20 20" aria-hidden="true">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.388 2.46a1 1 0 00-.364 1.118l1.287 3.974c.3.921-.755 1.688-1.54 1.118l-3.388-2.46a1 1 0 00-1.175 0l-3.388 2.46c-.784.57-1.838-.197-1.539-1.118l1.287-3.974a1 1 0 00-.364-1.118L2.045 9.4c-.783-.57-.38-1.81.588-.181h4.18a1 1 0 00.95-.69l1.286-3.974z" />
                    </svg>
                  `).join('')}
                </div>
              </div>
              <h3 class="text-sm font-semibold px-3">${product.name}</h3>
              <div class="px-3 pb-3 mt-1 flex flex-col gap-2">
                <div class="flex items-center gap-2">
                  <span class="font-semibold">₦${product.price.toFixed(2)}</span>
                  ${product.originalPrice ? `<span class="line-through text-gray-400 text-xs">₦${product.originalPrice.toFixed(2)}</span>` : ''}
                </div>
              </div>
            </div>
          `;
          swiperWrapper.appendChild(slide);
        });

        // Simulate image loading
        setTimeout(() => {
          document.querySelectorAll('.image-container img').forEach(img => {
            img.style.display = 'block';
          });
          document.querySelectorAll('.image-container .animate-pulse').forEach(skeleton => {
            skeleton.style.display = 'none';
          });
        }, 2000);

        // Update button texts after rendering
        filteredProducts.forEach(product => {
          updateButtonText(product.id);
        });
      }

      // Toggle buttons visibility
      function toggleButtons(productId, show) {
        const overlay = document.querySelector(`[data-product-id="${productId}"] .overlay`);
        if (overlay) {
          overlay.classList.toggle('active', show);
        }
      }

      // Handle add to cart
      function handleAddToCart(productId) {
        const product = products.find(p => p.id === productId);
        if (!product) return;
        addToCart({
          id: product.id,
          name: product.name,
          price: product.price,
          image: product.image,
          color: 'default',
          qty: 1
        });
      }

      // Initialize on page load
      document.addEventListener('DOMContentLoaded', () => {
        filterProducts(); // Initial render with all products
        updateCartIcon(); // Update cart icon on load
      });
    </script>
   @endsection