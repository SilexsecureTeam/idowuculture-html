// js/category.js
import categories from './categories.js';

let loading = true;

function renderCategories() {
  if (!categories || !categories.length) {
    console.error('Categories array is empty or undefined');
    return;
  }
  const container = document.getElementById('category-container');
  if (!container) {
    console.error('Category container element not found');
    return;
  }
  container.innerHTML = '';
  categories.forEach((category, index) => {
    const item = document.createElement('div');
    item.className = 'gap-2 items-center';
    item.innerHTML = `
      ${loading ? `
        <div class="skeleton h-[150px] md:h-[250px] w-full object-cover mb-2"></div>
      ` : `
        <picture>
          <img src="${category.image}" alt="${category.name}" ${index === 0 ? 'loading="eager"' : 'loading="lazy"'} class="h-[150px] md:h-[250px] w-full bg-gray-300 object-cover mb-2" width="300" height="250" onerror="this.src='/assets/fallback.jpg'" />
        </picture>
      `}
      <h2 class="text-base md:text-lg text-center poppins font-medium">${category.name}</h2>
    `;
    container.appendChild(item);
  });
}

setTimeout(() => {
  loading = false;
  console.log('Category loading complete, rendering categories');
  renderCategories();
}, 2000);

window.addEventListener('load', () => {
  console.log('Initializing category section...');
  renderCategories();
});