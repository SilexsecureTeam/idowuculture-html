// article.js
const articles = [
  { id: 1, title: "Air Jordan x Travis Scott Event", image: "./assets/art1.jpg", link: "#" },
  { id: 2, title: "The timeless classics on the green", image: "./assets/art2.jpg", link: "#" },
  { id: 3, title: "The 2023 Ryder Cup", image: "./assets/cup.png", link: "#" },
];

const container = document.getElementById("article-list");

// Show skeletons
for (let i = 0; i < articles.length; i++) {
  const skeleton = document.createElement("div");
  skeleton.className = "skeleton h-60 md:h-64 w-full mb-2";
  container.appendChild(skeleton);
}

// Simulate loading
setTimeout(() => {
  container.innerHTML = ""; // Clear skeletons

  articles.forEach((article) => {
    const card = document.createElement("div");
    card.className = "relative flex flex-col h-full";

    card.innerHTML = `
      <img src="${article.image}" alt="${article.title}" class="w-full h-60 md:h-64 object-cover mb-2 bg-gray-300" loading="lazy" />
      <div class="bottom-4 left-4">
        <h3 class="text-[20px] poppins text-[#23262F] font-medium mb-1 md:mb-2">${article.title}</h3>
        <a href="${article.link}" class="text-base text-[#141718] font-medium flex items-center gap-1 border-b border-black pb-1 w-fit">
          Read More <span>→</span>
        </a>
      </div>
    `;

    container.appendChild(card);
  });
}, 2000);
