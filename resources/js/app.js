import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();
// Initialize cart from localStorage
import Swal from 'sweetalert2'

window.Swal = Swal

// let cart = JSON.parse(localStorage.getItem('cart')) || [];

/// Initialize cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];
console.log('Initial cart on page load:', cart);

// Save cart to localStorage
function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Add item to cart
function addToCart(product) {
  console.log('addToCart called with:', product, 'Current cart:', cart); // Debug
  const productToAdd = {
    id: product.id,
    name: product.name,
    price: product.price,
    image: product.image,
    color: product.color || 'default',
    qty: product.qty || 1,
  };

  const existingItemIndex = cart.findIndex(
    (item) => item.id === productToAdd.id && item.color === productToAdd.color
  );

  if (existingItemIndex >= 0) {
    cart[existingItemIndex].qty += productToAdd.qty;
  } else {
    cart.push(productToAdd);
  }
  saveCart();
  updateCartIcon();
  updateButtonText(product.id);
}

// Remove item from cart
function removeFromCart(id) {
  cart = cart.filter((item) => item.id !== id);
  saveCart();
  updateCartIcon();
  if (window.location.pathname.includes('cart.html')) {
    renderCart();
  }
}

// Update quantity
function updateQty(id, change) {
  cart = cart.map((item) =>
    item.id === id ? { ...item, qty: Math.max(1, item.qty + change) } : item
  );
  saveCart();
  updateCartIcon();
  if (window.location.pathname.includes('cart.html')) {
    renderCart();
  }
}

// Update cart icon
function updateCartIcon() {
  const cartCount = document.querySelector('#cartCount');
  if (cartCount) {
    const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
    console.log('updateCartIcon called - Cart:', cart, 'Total items:', totalItems); // Debug
    cartCount.textContent = totalItems;
    cartCount.classList.toggle('hidden', totalItems === 0);
  }
}

// Update button text in feature section
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

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', () => {
  cart = JSON.parse(localStorage.getItem('cart')) || [];
  console.log('Cart after initialization:', cart);
  updateCartIcon();
});