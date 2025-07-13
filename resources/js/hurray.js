// Target date (e.g., 7 days from now)
const targetDate = new Date();
targetDate.setDate(targetDate.getDate() + 7);

// Get countdown elements safely
const daysEl = document.getElementById('days');
const hoursEl = document.getElementById('hours');
const minutesEl = document.getElementById('minutes');
const secondsEl = document.getElementById('seconds');

function updateCountdown() {
  const now = new Date();
  const timeDiff = targetDate - now;

  if (!daysEl || !hoursEl || !minutesEl || !secondsEl) {
    clearInterval(countdownInterval);
    console.warn('Countdown elements not found in the DOM');
    return;
  }

  if (timeDiff <= 0) {
    clearInterval(countdownInterval);
    daysEl.textContent = '00';
    hoursEl.textContent = '00';
    minutesEl.textContent = '00';
    secondsEl.textContent = '00';

    // Optionally show expired message
    const container = document.querySelector('.flex.justify-center.sm\\:justify-start.gap-x-2.mb-6');
    if (container) {
      const expiredMsg = document.createElement('div');
      expiredMsg.className = 'text-red-500 font-bold text-center';
      expiredMsg.textContent = 'Offer Expired!';
      container.appendChild(expiredMsg);
    }
    return;
  }

  const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

  daysEl.textContent = days.toString().padStart(2, '0');
  hoursEl.textContent = hours.toString().padStart(2, '0');
  minutesEl.textContent = minutes.toString().padStart(2, '0');
  secondsEl.textContent = seconds.toString().padStart(2, '0');
}

document.addEventListener('DOMContentLoaded', () => {
  if (daysEl && hoursEl && minutesEl && secondsEl) {
    updateCountdown(); // Run immediately
    countdownInterval = setInterval(updateCountdown, 1000);
    console.log('Countdown loaded and running');
  } else {
    console.warn('Countdown not started because one or more elements are missing');
  }
});

let countdownInterval;
