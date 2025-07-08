document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const signupBtn = document.getElementById("signupBtn");

  let menuOpen = false;

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

});