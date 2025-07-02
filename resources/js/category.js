
        class CategoryManager {
            constructor() {
                this.loading = true;
                this.categories = categories;
                this.container = document.getElementById('collection-container');
                this.init();
            }

            init() {
                if (!this.container) {
                    console.error('Collection container element not found');
                    return;
                }
                this.renderSkeletons();

                setTimeout(() => {
                    this.loading = false;
                    this.renderCategories();
                }, 2000);
            }

            renderSkeletons() {
                this.container.innerHTML = '';
                for (let i = 0; i < 6; i++) {
                    const skeletonItem = document.createElement('div');
                    skeletonItem.className = 'collection-card skeleton';
                    this.container.appendChild(skeletonItem);
                }
            }

            renderCategories() {
                if (!this.categories || !this.categories.length) {
                    console.error('Categories array is empty or undefined');
                    return;
                }

                this.container.innerHTML = '';

                this.categories.forEach((category, index) => {
                    const item = document.createElement('div');
                    item.className = 'collection-card cursor-pointer hover:transform hover:scale-[1.02] transition-all duration-300 group shadow-lg hover:shadow-xl';

                    item.innerHTML = `
                        <img 
                            src="${category.image}" 
                            alt="${category.name}" 
                            ${index < 2 ? 'loading="eager"' : 'loading="lazy"'} 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
                            width="600" 
                            height="400"
                            onerror="this.src='https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=600&h=400&fit=crop'"
                        />
                        <div class="collection-content">
                            <div class="mb-2">
                                <span class="text-sm opacity-90 poppins">${category.subtitle}</span>
                                <div class="flex items-center mt-1">
                                    <span class="text-white text-xs opacity-75">Collections</span>
                                    <svg class="w-4 h-4 ml-2 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl md:text-2xl font-semibold poppins text-white leading-tight">
                                ${category.name}
                            </h3>
                        </div>
                    `;

                    // Add click handler
                    item.addEventListener('click', () => {
                        console.log(`Clicked on ${category.name}`);
                        // Add your navigation logic here
                    });

                    this.container.appendChild(item);
                });
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new CategoryManager();
        });