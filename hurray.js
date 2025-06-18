
    // Target date for countdown
    const targetDate = new Date("2025-05-08T17:46:00").getTime();

    // Elements
    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");

    function formatNumber(num) {
      return num.toString().padStart(2, "0");
    }

    function updateCountdown() {
      const now = new Date().getTime();
      const difference = targetDate - now;

      if (difference <= 0) {
        daysEl.textContent = "00";
        hoursEl.textContent = "00";
        minutesEl.textContent = "00";
        secondsEl.textContent = "00";
        clearInterval(interval);
        return;
      }

      const days = Math.floor(difference / (1000 * 60 * 60 * 24));
      const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((difference % (1000 * 60)) / 1000);

      daysEl.textContent = formatNumber(days);
      hoursEl.textContent = formatNumber(hours);
      minutesEl.textContent = formatNumber(minutes);
      secondsEl.textContent = formatNumber(seconds);
    }

    // Initial call
    updateCountdown();

    // Update every second
    const interval = setInterval(updateCountdown, 1000);
 