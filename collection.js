const collections = [
  { title: "Juniors Set", image: "./assets/collection.jpg", link: "#" },
  { title: "Men’s Set", image: "./assets/men.jpg", link: "#" },
  { title: "Women’s Set", image: "./assets/women.jpg", link: "#" },
];

const container = document.getElementById("collection-container");

// Create placeholder skeletons
container.innerHTML = `
  <div class="relative flex-1 h-full md:h-auto md:max-h-[80vh] flex flex-col">
    <div class="skeleton w-full h-full"></div>
  </div>
  <div class="flex flex-col gap-4 flex-1 h-full md:h-auto md:max-h-[77vh]">
    <div class="skeleton w-full h-1/2"></div>
    <div class="skeleton w-full h-1/2"></div>
  </div>
`;

// Simulate image loading
setTimeout(() => {
  container.innerHTML = `
    <div class="relative flex-1 h-full md:h-auto md:max-h-[80vh] flex flex-col">
      <img src="${collections[0].image}" alt="${collections[0].title}" class="w-full h-full object-cover bg-gray-300" loading="lazy" />
      <div class="absolute bottom-4 left-4">
        <h3 class="sm:text-[34px] text-xl poppins text-[#9E0505] font-medium mb-1 md:mb-2">${collections[0].title}</h3>
        <a href="${collections[0].link}" class="text-base text-white font-medium flex items-center gap-1 border-b border-white pb-1 w-fit">
          Collections <span>→</span>
        </a>
      </div>
    </div>

    <div class="flex flex-col gap-4 flex-1 h-full md:h-auto md:max-h-[77vh]">
      <div class="relative flex-1 h-1/2">
        <img src="${collections[1].image}" alt="${collections[1].title}" class="w-full h-full object-cover bg-gray-300" loading="lazy" />
        <div class="absolute bottom-4 left-4">
          <h3 class="sm:text-[34px] text-xl poppins text-[#9E0505] font-medium mb-1 md:mb-2">${collections[1].title}</h3>
          <a href="${collections[1].link}" class="text-base text-white font-medium flex items-center gap-1 border-b border-white pb-1 w-fit">
            Collections <span>→</span>
          </a>
        </div>
      </div>

      <div class="relative flex-1 h-1/2">
        <img src="${collections[2].image}" alt="${collections[2].title}" class="w-full h-full object-cover bg-gray-300" loading="lazy" />
        <div class="absolute bottom-4 left-4">
          <h3 class="sm:text-[34px] text-xl poppins text-[#9E0505] font-medium mb-1 md:mb-2">${collections[2].title}</h3>
          <a href="${collections[2].link}" class="text-base text-white font-medium flex items-center gap-1 border-b border-white pb-1 w-fit">
            Collections <span>→</span>
          </a>
        </div>
      </div>
    </div>
  `;
}, 2000);
