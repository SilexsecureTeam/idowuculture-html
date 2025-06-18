// Handle image loading
document.addEventListener('DOMContentLoaded', () => {
  const images = document.querySelectorAll('img[data-loading="true"]');
  
  images.forEach(img => {
    // If image is already cached, show immediately
    if (img.complete) {
      img.removeAttribute('data-loading');
      img.parentElement.querySelector('.skeleton').style.display = 'none';
    } else {
      // Simulate 2-second loading delay (matching React useEffect)
      setTimeout(() => {
        img.removeAttribute('data-loading');
        img.parentElement.querySelector('.skeleton').style.display = 'none';
      }, 2000);
      
      // Also listen for actual load event for optimization
      img.addEventListener('load', () => {
        img.removeAttribute('data-loading');
        img.parentElement.querySelector('.skeleton').style.display = 'none';
      });
    }
  });
});