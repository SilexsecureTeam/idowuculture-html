<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .poppins {
            font-family: 'Poppins', sans-serif;
        }
        .loading {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .loaded {
            opacity: 1;
        }
        /* Custom checkbox styling */
        input[type="checkbox"] {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            position: relative;
            cursor: pointer;
        }
        input[type="checkbox"]:checked {
            background-color: #009345;
            border-color: #009345;
        }
        input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            top: -2px;
            left: 2px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen bg-gray-50 flex flex-col md:flex-row">
        <!-- Left side - Image -->
        <div class="relative w-full md:w-1/2 h-[45vh] md:h-screen overflow-hidden">
            <img
                src="/assets/sign-in.png"
                alt="Auth visual"
                class="md:absolute top-0 left-0 w-full loading"
                onload="this.classList.remove('loading'); this.classList.add('loaded');"
                onerror="this.style.display='none';"
            />
        </div>

        <!-- Right side - Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center md:justify-start px-5 md:px-10 lg:px-15 py-10 md:py-0">
            <div class="w-full max-w-md">
                <div class="flex w-full items-center justify-center">
                    <img 
                        src="/assets/logo.png" 
                        alt="Logo" 
                        class="h-18 mb-2 loading"
                        onload="this.classList.remove('loading'); this.classList.add('loaded');"
                        onerror="this.style.display='none';"
                    />
                </div>
                <h2 class="text-center text-[28px] mb-0 poppins font-semibold text-black">
                    Welcome back
                </h2>
                <h2 class="text-center md:text-xl mt-0 poppins font-normal text-[#4D4E50] mb-5">
                    Please enter your details
                </h2>

                <!-- Error Message -->
                <p id="errorMessage" class="text-red-500 text-sm mb-4 hidden"></p>
                
                <!-- Success Message -->
                <div id="successMessage" class="bg-green-100 text-green-700 p-3 mb-4 rounded text-sm hidden">
                    Successfully logged in.
                </div>

                <form id="loginForm" class="space-y-4">
                    <input
                        type="text"
                        name="identifier"
                        id="identifier"
                        placeholder="Enter your email"
                        class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                        required
                    />

                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Enter your Password"
                            class="w-full pl-6 bg-white py-2 border outline-none text-[#6C7275] placeholder:text-[#6C7275] border-[#D3CDCD]"
                            required
                        />
                        <span
                            id="togglePassword"
                            class="absolute right-3 top-3 cursor-pointer text-sm text-gray-600"
                        >
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>

                    <label class="flex items-center justify-between w-full mt-2 space-x-2 text-sm">
                        <div class="flex items-center gap-x-3">
                            <input
                                type="checkbox"
                                name="agree"
                                id="agree"
                                class="cursor-pointer"
                            />
                            <span class="text-[#0B0A0A] text-base font-normal">
                                Remember me
                            </span>
                        </div>
                        <a
                            href="/forgot-password"
                            class="text-[#009345] hover:underline"
                        >
                            Forgot password?
                        </a>
                    </label>

                    <button
                        type="submit"
                        id="submitBtn"
                        class="w-full bg-[#E0B654] hover:bg-amber-300 transition duration-300 ease-in-out transform hover:scale-105 mt-2 mb-2 text-white py-2 rounded cursor-pointer"
                    >
                        Sign In
                    </button>
                </form>
                
                <p class="text-base font-normal pl-7 text-[#000000] mb-6">
                    Don't have a PHC account?
                    <a href="/signup.html" class="text-[#009345] pl-2 hover:underline">
                        Sign up
                    </a>
                </p>
                
                <div class="w-full mx-auto">
                    <div class="flex items-center my-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="mx-4 text-[#151417] font-normal text-sm">
                            or sign in with your work email
                        </span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>
                    <div class="flex justify-center space-x-6 mt-4">
                        <img
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg"
                            alt="Google"
                            class="w-6 h-6 cursor-pointer hover:opacity-80 transition-opacity loading"
                            onload="this.classList.remove('loading'); this.classList.add('loaded');"
                            onerror="this.style.display='none';"
                        />
                        <img
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg"
                            alt="LinkedIn"
                            class="w-6 h-6 cursor-pointer hover:opacity-80 transition-opacity loading"
                            onload="this.classList.remove('loading'); this.classList.add('loaded');"
                            onerror="this.style.display='none';"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form data state
        let formData = {
            identifier: "",
            password: "",
            agree: false
        };

        let showPassword = false;
        let error = "";
        let submitted = false;

        // Get DOM elements
        const form = document.getElementById('loginForm');
        const identifierInput = document.getElementById('identifier');
        const passwordInput = document.getElementById('password');
        const agreeCheckbox = document.getElementById('agree');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');
        const errorMessage = document.getElementById('errorMessage');
        const successMessage = document.getElementById('successMessage');
        const submitBtn = document.getElementById('submitBtn');

        // Handle input changes
        function handleChange(e) {
            const { name, value, type, checked } = e.target;
            
            if (type === 'checkbox') {
                formData[name] = checked;
            } else {
                formData[name] = value;
            }

            // Clear error and success messages
            hideError();
            hideSuccess();
            submitted = false;
        }

        // Show error message
        function showError(message) {
            error = message;
            errorMessage.textContent = message;
            errorMessage.classList.remove('hidden');
        }

        // Hide error message
        function hideError() {
            error = "";
            errorMessage.classList.add('hidden');
        }

        // Show success message
        function showSuccess() {
            successMessage.classList.remove('hidden');
        }

        // Hide success message
        function hideSuccess() {
            successMessage.classList.add('hidden');
        }

        // Toggle password visibility
        function togglePassword() {
            showPassword = !showPassword;
            
            if (showPassword) {
                passwordInput.type = 'text';
                eyeIcon.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                eyeIcon.className = 'fas fa-eye';
            }
        }

        // Handle form submission
        function handleSubmit(e) {
            e.preventDefault();

            const { identifier, password } = formData;
            
            if (!identifier || !password) {
                showError("Please fill in both fields.");
                return;
            }

            hideError();
            submitted = true;
            
            // Simulate form submission
            submitBtn.textContent = 'Signing In...';
            submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
            
            setTimeout(() => {
                console.log('Form submitted:', formData);
                showSuccess();
                submitBtn.textContent = 'Sign In';
                submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
                
                // Simulate navigation (in a real app, you'd use window.location.href or similar)
                setTimeout(() => {
                    console.log('Navigating to profile...');
                    window.location.href = '/profile.html';
                }, 1000);
            }, 1000);
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners to form inputs
            identifierInput.addEventListener('input', handleChange);
            passwordInput.addEventListener('input', handleChange);
            agreeCheckbox.addEventListener('change', handleChange);

            // Password toggle
            togglePasswordBtn.addEventListener('click', togglePassword);

            // Form submission
            form.addEventListener('submit', handleSubmit);

            // Initialize form data
            formData.identifier = identifierInput.value;
            formData.password = passwordInput.value;
            formData.agree = agreeCheckbox.checked;
        });

        // Handle social login clicks (placeholder functionality)
        document.addEventListener('click', function(e) {
            if (e.target.alt === 'Google') {
                console.log('Google login clicked');
                // Implement Google OAuth here
            } else if (e.target.alt === 'LinkedIn') {
                console.log('LinkedIn login clicked');
                // Implement LinkedIn OAuth here
            }
        });
    </script>
</body>
</html>