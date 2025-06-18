// Target date (e.g., 7 days from now)
const targetDate = new Date();
targetDate.setDate(targetDate.getDate() + 7);

function updateCountdown() {
  const now = new Date();
  const timeDiff = targetDate - now;

  if (timeDiff <= 0) {
    clearInterval(countdownInterval);
    document.querySelectorAll('.countdown').forEach(el => {
      el.textContent = 'Offer expired!';
    });
    return;
  }

  const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

  document.querySelectorAll('.days').forEach(el => el.textContent = days.toString().padStart(2, '0'));
  document.querySelectorAll('.hours').forEach(el => el.textContent = hours.toString().padStart(2, '0'));
  document.querySelectorAll('.minutes').forEach(el => el.textContent = minutes.toString().padStart(2, '0'));
  document.querySelectorAll('.seconds').forEach(el => el.textContent = seconds.toString().padStart(2, '0'));
}

// Initialize countdown
let countdownInterval = setInterval(updateCountdown, 1000);
updateCountdown();

document.addEventListener('DOMContentLoaded', () => {
  console.log('hurray.js loaded');
});