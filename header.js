document.addEventListener("DOMContentLoaded", () => {
  console.log(`header.js loaded on ${window.location.pathname}`);
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const cartBtn = document.getElementById("cartBtn");
  const signupBtn = document.getElementById("signupBtn");

  let menuOpen = false;

  // Toggle mobile menu
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => {
      menuOpen = !menuOpen;
      mobileMenu.classList.toggle("hidden");
      menuToggle.innerHTML = menuOpen
        ? '<i class="fas fa-times text-[#141718] text-xl"></i>'
        : '<i class="fas fa-bars text-[#141718] text-xl"></i>';
    });

    // Close menu when a menu item is clicked
    mobileMenu.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        menuOpen = false;
        mobileMenu.classList.add("hidden");
        menuToggle.innerHTML = '<i class="fas fa-bars text-[#141718] text-xl"></i>';
      });
    });
  } else {
    console.log(`header.js: menuToggle or mobileMenu not found on ${window.location.pathname}`);
  }

  // Navigate to signup page
  if (signupBtn) {
    signupBtn.addEventListener("click", () => {
      window.location.href = "/signup.html";
    });
  }

  // Navigate to cart page
  if (cartBtn) {
    cartBtn.addEventListener("click", () => {
      window.location.href = "/cart.html";
    });
  }

  // Call updateCartIcon from app.js
  if (typeof updateCartIcon === 'function') {
    console.log(`header.js: Calling updateCartIcon on ${window.location.pathname}`);
    updateCartIcon();
  } else {
    console.log(`header.js: updateCartIcon not found on ${window.location.pathname}; ensure app.js is loaded`);
  }
});