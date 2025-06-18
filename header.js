document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const cartBtn = document.getElementById("cartBtn");
  const cartCount = document.getElementById("cartCount");
  const signupBtn = document.getElementById("signupBtn");

  let menuOpen = false;
  let cartItemCount = 3; // Simulated cart count for example

  // Update cart count display
  if (cartItemCount > 0) {
    cartCount.textContent = cartItemCount;
    cartCount.classList.remove("hidden");
  }

  // Toggle mobile menu
  menuToggle.addEventListener("click", () => {
    menuOpen = !menuOpen;
    mobileMenu.classList.toggle("hidden");

    // Swap icon
    menuToggle.innerHTML = menuOpen
      ? '<i class="fas fa-times text-[#141718] text-xl"></i>'
      : '<i class="fas fa-bars text-[#141718] text-xl"></i>';
  });

  // Optional: Close menu when a menu item is clicked
  mobileMenu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      menuOpen = false;
      mobileMenu.classList.add("hidden");
      menuToggle.innerHTML = '<i class="fas fa-bars text-[#141718] text-xl"></i>';
    });
  });

  // Simulate navigation
  signupBtn.addEventListener("click", () => {
    window.location.href = "/signup.html";
  });

  cartBtn.addEventListener("click", () => {
    window.location.href = "/cart.html";
  });
});