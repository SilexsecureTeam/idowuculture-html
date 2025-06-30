   // JavaScript to handle carousel and image loading
    const images = [
      './assets/hero-bg.png',
      './assets/hero-bg1.png',
      './assets/hero-bg2.png'
    ];
    let currentImage = 0;
    let loadedImages = [false, false, false];
    let intervalId = null;

    // Function to update carousel position
    function updateCarousel() {
      const carousel = document.getElementById('carousel');
      const translateX = -(100 / images.length) * currentImage;
      carousel.style.transform = `translateX(${translateX}%)`;
    }

    // Function to handle image load
window.handleImageLoad = function(index) {
  loadedImages[index] = true;
  const skeleton = document.getElementById(`skeleton-${index}`);
  if (skeleton) {
    skeleton.style.display = 'none';
  }
  // Fallback: hide skeleton after 5 seconds if not loaded
  setTimeout(() => {
    if (skeleton && skeleton.style.display !== 'none') {
      skeleton.style.display = 'none';
    }
  }, 5000);
};
    // Function to start the carousel
    function startCarousel() {
      intervalId = setInterval(() => {
        currentImage = (currentImage + 1) % images.length;
        updateCarousel();
      }, 3000);
    }

    // Function to stop the carousel
    function stopCarousel() {
      if (intervalId) {
        clearInterval(intervalId);
      }
    }

window.onload = () => {
  startCarousel();
  setTimeout(() => {
    for (let i = 0; i < 3; i++) {
      const skeleton = document.getElementById(`skeleton-${i}`);
      if (skeleton) skeleton.style.display = 'none';
    }
  }, 3000); // Hide after 3 seconds regardless
};
