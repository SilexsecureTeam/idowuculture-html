// Initialize cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];
console.log('app.js loaded - Initial cart:', cart);

// Save cart to localStorage
function saveCart() {
  console.log('Saving cart to localStorage:', cart);
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Add item to cart
function addToCart(product) {
  console.log('addToCart called with:', product, 'Current cart:', cart);
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
  if (window.location.pathname.includes('cart.html')) {
    renderCart();
  }
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
    const totalItems = cart.reduce((sum, item) => {
      const qty = Number(item.qty) || 0;
      return sum + qty;
    }, 0);
    console.log(`updateCartIcon called on ${window.location.pathname} - Cart:`, cart, 'Total items:', totalItems);
    cartCount.textContent = totalItems;
    cartCount.classList.toggle('hidden', totalItems === 0);
  } else {
    console.log(`updateCartIcon failed on ${window.location.pathname} - #cartCount element not found`);
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

// Render cart items for cart.html
function renderCart() {
  const cartItemsContainer = document.getElementById("cart-items");
  const cartEmptyMessage = document.getElementById("cart-empty-message");
  const cartContent = document.querySelector("#cart-content");

  if (!cartItemsContainer || !cartEmptyMessage || !cartContent) {
    console.log(`renderCart failed on ${window.location.pathname} - Cart elements not found`);
    return;
  }

  cartItemsContainer.innerHTML = "";

  if (cart.length === 0) {
    cartEmptyMessage.classList.remove("hidden");
    cartItemsContainer.style.display = "none";
    cartContent.style.display = "none";
    return;
  } else {
    cartEmptyMessage.classList.add("hidden");
    cartItemsContainer.style.display = "block";
    cartContent.style.display = "flex";
  }

  cart.forEach((item, index) => {
    const borderClass = index < cart.length - 1 ? "border-b border-b-gray-200" : "";
    const itemDiv = document.createElement("div");
    itemDiv.className = `${borderClass} flex items-center gap-x-2 py-3`;

    const img = document.createElement("img");
    img.src = item.image;
    img.alt = item.name;
    img.className = "w-20 h-22 rounded-sm object-cover";
    img.loading = "lazy";

    const detailsDiv = document.createElement("div");
    detailsDiv.className = "flex-1";

    const topRow = document.createElement("div");
    topRow.className = "flex items-center justify-between w-full";

    const nameDiv = document.createElement("div");
    nameDiv.className = "font-bold text-sm md:text-[20px] text-black";
    nameDiv.textContent = item.name;

    const removeBtn = document.createElement("button");
    removeBtn.className = "text-red-500 cursor-pointer hover:text-red-700";
    removeBtn.title = "Remove";
    removeBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
    removeBtn.addEventListener("click", () => removeFromCart(item.id));

    topRow.appendChild(nameDiv);
    topRow.appendChild(removeBtn);

    const infoDiv = document.createElement("div");
    infoDiv.className = "text-sm text-black font-normal";
    infoDiv.innerHTML = `Size: <span class="opacity-60">${item.size || "N/A"}</span><br />Color: <span class="opacity-60">${item.color || "N/A"}</span>`;

    const bottomRow = document.createElement("div");
    bottomRow.className = "flex items-center justify-between w-full";

    const priceDiv = document.createElement("div");
    priceDiv.className = "font-bold mt-1";
    priceDiv.textContent = `₦${item.price.toFixed(2)}`;

    const qtyControls = document.createElement("div");
    qtyControls.className = "flex items-center p-1 px-1.5 bg-[#F0F0F0] rounded-2xl gap-x-3";

    const btnMinus = document.createElement("button");
    btnMinus.className = "w-[20px] cursor-pointer";
    btnMinus.textContent = "-";
    btnMinus.addEventListener("click", () => updateQty(item.id, -1));

    const qtySpan = document.createElement("span");
    qtySpan.className = "text-[15px]";
    qtySpan.textContent = item.qty;

    const btnPlus = document.createElement("button");
    btnPlus.className = "w-[20px] cursor-pointer";
    btnPlus.textContent = "+";
    btnPlus.addEventListener("click", () => updateQty(item.id, 1));

    qtyControls.appendChild(btnMinus);
    qtyControls.appendChild(qtySpan);
    qtyControls.appendChild(btnPlus);

    bottomRow.appendChild(priceDiv);
    bottomRow.appendChild(qtyControls);

    detailsDiv.appendChild(topRow);
    detailsDiv.appendChild(infoDiv);
    detailsDiv.appendChild(bottomRow);

    itemDiv.appendChild(img);
    itemDiv.appendChild(detailsDiv);

    cartItemsContainer.appendChild(itemDiv);
  });

  updateSummary();
}

// Update order summary for cart.html
function updateSummary() {
  const subtotalEl = document.getElementById("subtotal");
  const discountEl = document.getElementById("discount");
  const deliveryEl = document.getElementById("delivery");
  const totalEl = document.getElementById("total");

  if (!subtotalEl || !discountEl || !deliveryEl || !totalEl) {
    console.log(`updateSummary failed on ${window.location.pathname} - Summary elements not found`);
    return;
  }

  const deliveryFee = 15;
  const discountPercent = 0.2;
  const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
  const discount = Math.round(subtotal * discountPercent);
  const total = subtotal - discount + deliveryFee;

  subtotalEl.textContent = `₦${subtotal.toFixed(2)}`;
  discountEl.textContent = `-₦${discount.toFixed(2)}`;
  deliveryEl.textContent = `₦${deliveryFee.toFixed(2)}`;
  totalEl.textContent = `₦${total.toFixed(2)}`;
}

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', () => {
  console.log(`app.js DOMContentLoaded on ${window.location.pathname}`);
  cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart = cart.filter(item => item && item.id && Number.isInteger(item.qty) && item.qty > 0);
  console.log('Cart after validation:', cart);
  saveCart();
  updateCartIcon();
  if (window.location.pathname.includes('cart.html')) {
    renderCart();
  }
});