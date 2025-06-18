
    function handleSubmit(event) {
      event.preventDefault();
      const emailInput = document.getElementById('email-input');
      const messageEl = document.getElementById('message');
      const email = emailInput.value.trim();

      if (!email) {
        messageEl.textContent = 'Please enter your email address.';
        messageEl.classList.remove('hidden');
        return;
      }

      // Basic email format validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        messageEl.textContent = 'Please enter a valid email address.';
        messageEl.classList.remove('hidden');
        return;
      }

      // Simulate successful signup
      messageEl.textContent = 'Thank you for signing up!';
      messageEl.classList.remove('hidden');
      emailInput.value = '';
    }
