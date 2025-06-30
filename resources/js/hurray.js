// Target date (e.g., 7 days from now)
const targetDate = new Date();
targetDate.setDate(targetDate.getDate() + 7);

function updateCountdown() {
  const now = new Date();
  const timeDiff = targetDate - now;

  if (timeDiff <= 0) {
    clearInterval(countdownInterval);
    // Show expired message
    document.getElementById('days').textContent = '00';
    document.getElementById('hours').textContent = '00';
    document.getElementById('minutes').textContent = '00';
    document.getElementById('seconds').textContent = '00';

    // Optionally show expired message
    const expiredMsg = document.createElement('div');
    expiredMsg.className = 'text-red-500 font-bold text-center';
    expiredMsg.textContent = 'Offer Expired!';
    document.querySelector('.flex.justify-center.sm\\:justify-start.gap-x-2.mb-6').appendChild(expiredMsg);
    return;
  }

  const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

  // Update the countdown display using IDs
  document.getElementById('days').textContent = days.toString().padStart(2, '0');
  document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
  document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
  document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
}

// Initialize countdown
let countdownInterval = setInterval(updateCountdown, 1000);
updateCountdown(); // Run immediately

document.addEventListener('DOMContentLoaded', () => {
  console.log('Countdown loaded and running');
});