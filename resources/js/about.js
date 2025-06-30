
  // Enhanced image loading with fade-in effect
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('img[data-loading="true"]');
            
            images.forEach(img => {
                if (img.complete) {
                    showImage(img);
                } else {
                    setTimeout(() => showImage(img), 1500);
                    img.addEventListener('load', () => showImage(img));
                }
            });
            
            function showImage(img) {
                img.removeAttribute('data-loading');
                img.style.opacity = '0';
                img.style.display = 'block';
                
                const skeleton = img.parentElement.querySelector('.skeleton');
                if (skeleton) {
                    skeleton.style.opacity = '0';
                    setTimeout(() => skeleton.style.display = 'none', 300);
                }
                
                // Fade in the image
                setTimeout(() => {
                    img.style.transition = 'opacity 0.6s ease-in-out';
                    img.style.opacity = '1';
                }, 100);
            }
            
            // Scroll reveal animation
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.section-reveal').forEach(section => {
                observer.observe(section);
            });
        });

tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-right': 'slideRight 0.8s ease-out',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(50px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(-50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        }
                    }
                }
            }
        }