// State to track which product overlays are visible
let showButtons = {};

// Select the swiper wrapper
const swiperWrapper = document.querySelector('.swiper-wrapper');

// Toggle overlay visibility
function toggleButtons(productId, show) {
  showButtons[productId] = show;
  const overlay = document.querySelector(`[data-product-id="${productId}"] .overlay`);
  if (overlay) {
    overlay.classList.toggle('active', show);
  }
}

// Update button text based on cart quantity
function updateButtonText(productId) {
  const cartItem = cart.find((item) => item.id === productId && item.color === 'default');
  const qty = cartItem ? cartItem.qty : 0;
  const button = document.querySelector(`[data-product-id="${productId}"] .add-to-cart`);
  if (button) {
    if (window.innerWidth >= 768) {
      button.innerText = qty > 0 ? `Add to cart (${qty})` : 'Add to cart';
    } else {
      button.innerHTML = `<i class="fas fa-shopping-cart w-5 h-5"></i>`;
    }
  }
}

// Render products
function renderProducts() {
  swiperWrapper.innerHTML = '';
  products.forEach((product) => {
    const cartItem = cart.find((item) => item.id === product.id && item.color === 'default');
    const qty = cartItem ? cartItem.qty : 0;
    const buttonText = qty > 0 ? `Add to cart (${qty})` : 'Add to cart';

    const slide = document.createElement('div');
    slide.className = 'swiper-slide pl-5 sm:pl-10';
    slide.setAttribute('data-product-id', product.id);

    slide.innerHTML = `
      <div class="bg-white rounded-md relative clickable-product">
        ${product.hot ? `<span class="absolute top-3 left-3 bg-white text-black text-xs font-semibold px-2 py-0.5 rounded z-20">HOT</span>` : ''}
        ${product.discount ? `<span class="absolute top-3 left-16 bg-green-500 text-white text-xs font-semibold px-2 py-0.5 rounded z-20">-${product.discount}%</span>` : ''}
        <div class="image-container h-56"
             onmouseenter="if (window.innerWidth >= 768) toggleButtons(${product.id}, true)"
             onmouseleave="if (window.innerWidth >= 768) toggleButtons(${product.id}, false)"
             onclick="if (window.innerWidth < 768) toggleButtons(${product.id}, !${showButtons[product.id] || false})">
          <img src="${product.image}" alt="${product.name}" class="w-full h-56 object-cover bg-black rounded-t-md blur-up" style="display: none;" />
          <div class="absolute inset-0 bg-gray-200 rounded-t-md animate-pulse"></div>
          <div class="overlay flex flex-col gap-2 items-center justify-center absolute inset-0 bg-black bg-opacity-50 rounded-t-md">
            <button class="add-to-cart ${window.innerWidth >= 768 ? 'bg-black text-white text-sm py-2 px-6 rounded' : 'bg-black text-white p-2 rounded-full'} hover:bg-gray-800 transition-all duration-300"
                    onclick="event.stopPropagation(); addToCart({ id: ${product.id}, name: '${product.name}', price: ${product.price}, image: '${product.image}', color: 'default', qty: 1 }); updateButtonText(${product.id});">
              ${window.innerWidth >= 768 ? buttonText : '<i class="fas fa-shopping-cart w-5 h-5"></i>'}
            </button>
            <button class="${window.innerWidth >= 768 ? 'bg-gray-900 text-white text-sm py-2 px-6 rounded' : 'bg-gray-900 text-white p-2 rounded-full'} hover:bg-green-500 transition-all duration-300"
                    onclick="event.stopPropagation(); viewDetails(${product.id});">
              ${window.innerWidth >= 768 ? 'View Details' : '<i class="fas fa-eye w-5 h-5"></i>'}
            </button>
          </div>
        </div>
        <div class="px-3 pt-3">
          <div class="flex text-yellow-400 mb-1">
            ${Array(5)
              .fill()
              .map(
                (_, i) => `
              <svg class="w-4 h-4 fill-current ${i < product.rating ? 'text-yellow-400' : 'text-gray-300'}" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.974a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.388 2.46a1 1 0 00-.364 1.118l1.287 3.974c.3.921-.755 1.688-1.54 1.118l-3.388-2.46a1 1 0 00-1.175 0l-3.388 2.46c-.784.57-1.838-.197-1.539-1.118l1.287-3.974a1 1 0 00-.364-1.118L2.045 9.4c-.783-.57-.38-1.81.588-.181h4.18a1 1 0 00.95-.69l1.286-3.974z" />
              </svg>
            `
              )
              .join('')}
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
    document.querySelectorAll('.image-container img').forEach((img) => {
      img.style.display = 'block';
      img.classList.add('lazyloaded');
    });
    document.querySelectorAll('.image-container .animate-pulse').forEach((skeleton) => {
      skeleton.style.display = 'none';
    });
  }, 2000);

  // Initialize Swiper
  new Swiper('.swiper-container', {
    slidesPerView: 2, // Mobile: 2 slides per row
    spaceBetween: 0,
    loop: true,
    speed: 500,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: (index, className) => `<span class="${className} w-2 h-2 bg-gray-400 rounded-full transition-colors duration-200 hover:bg-black"></span>`,
    },
    breakpoints: {
      640: { slidesPerView: 2 }, // Mobile (≤640px): 2 slides
      768: { slidesPerView: 3 }, // Tablet (≥768px): 3 slides
      1024: { slidesPerView: 4 }, // Large screens (≥1024px): 4 slides
    },
  });

  // Update button texts for all products
  products.forEach((product) => updateButtonText(product.id));
}

// View details function
function viewDetails(productId) {
  window.location.href = `product.html?id=${productId}`;
}

// Initialize on load
document.addEventListener('DOMContentLoaded', () => {
  renderProducts();
  updateCartIcon();
});