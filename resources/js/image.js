const images = [
      { id: 1, src: "assets/dimage6.jpg", alt: "Image 1" },
      { id: 2, src: "assets/dimage5.jpg", alt: "Image 2" },
      { id: 3, src: "assets/dimage2.jpg", alt: "Image 3" },
      { id: 4, src: "assets/dimage1.jpg", alt: "Image 4" },
      { id: 5, src: "assets/dimage4.jpg", alt: "Image 5" },
      { id: 6, src: "assets/dimage3.jpg", alt: "Image 6" },
    ];

    const grid = document.getElementById("image-grid");

    images.forEach(({ src, alt }) => {
      const container = document.createElement("div");
      container.className = "overflow-hidden relative w-full h-56 bg-gray-300 animate-pulse";

      const img = document.createElement("img");
      img.src = src;
      img.alt = alt;
      img.loading = "lazy";
      img.className = "absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-500";

      img.onload = () => {
        img.classList.remove("opacity-0");
        container.classList.remove("animate-pulse", "bg-gray-300");
      };

      container.appendChild(img);
      grid.appendChild(container);
    });