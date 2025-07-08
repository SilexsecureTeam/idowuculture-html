//  const articles = [
//             { 
//                 id: 1, 
//                 title: "Air Jordan x Travis Scott Event", 
//                 image: "https://images.unsplash.com/photo-1556906781-9a412961c28c?w=400&h=300&fit=crop", 
//                 link: "#",
//                 excerpt: "Exclusive collaboration brings street style to the golf course"
//             },
//             { 
//                 id: 2, 
//                 title: "The timeless classics on the green", 
//                 image: "https://images.unsplash.com/photo-1535131749006-b7f58c99034b?w=400&h=300&fit=crop", 
//                 link: "#",
//                 excerpt: "Discover the enduring appeal of traditional golf equipment"
//             },
//             { 
//                 id: 3, 
//                 title: "The 2023 Ryder Cup", 
//                 image: "https://images.unsplash.com/photo-1593111774240-d529f12cf4bb?w=400&h=300&fit=crop", 
//                 link: "#",
//                 excerpt: "Highlights from the most exciting tournament of the year"
//             },
//         ];

//         class ArticleManager {
//             constructor() {
//                 this.articles = articles;
//                 this.container = document.getElementById("article-list");
//                 this.init();
//             }

//             init() {
//                 if (!this.container) {
//                     console.error('Article container not found');
//                     return;
//                 }

//                 this.showSkeletons();
                
//                 // Simulate loading delay
//                 setTimeout(() => {
//                     this.renderArticles();
//                 }, 2000);
//             }

//             showSkeletons() {
//                 this.container.innerHTML = "";
                
//                 // Create skeleton for each article
//                 for (let i = 0; i < this.articles.length; i++) {
//                     const skeletonCard = document.createElement("div");
//                     skeletonCard.className = "flex flex-col";
                    
//                     skeletonCard.innerHTML = `
//                         <div class="skeleton h-60 md:h-64 w-full rounded-lg mb-4"></div>
//                         <div class="skeleton h-6 w-3/4 mb-2 rounded"></div>
//                         <div class="skeleton h-4 w-1/2 rounded"></div>
//                     `;
                    
//                     this.container.appendChild(skeletonCard);
//                 }
//             }

//             renderArticles() {
//                 this.container.innerHTML = ""; // Clear skeletons

//                 this.articles.forEach((article, index) => {
//                     const card = this.createArticleCard(article, index);
//                     this.container.appendChild(card);
//                 });
//             }

            
//                 // Add click event for the entire card
                

                
//             }

//             handleImageError(img, article) {
//                 console.warn(`Failed to load image for article: ${article.title}`);
                
//                 // Create fallback
//                 const fallback = document.createElement('div');
//                 fallback.className = 'w-full h-60 md:h-64 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-500';
//                 fallback.innerHTML = `
//                     <div class="text-center">
//                         <svg class="w-12 h-12 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
//                             <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
//                         </svg>
//                         <p class="text-sm">Image not available</p>
//                     </div>
//                 `;
                
//                 img.parentElement.replaceChild(fallback, img);
//             }

//             handleArticleClick(article) {
//                 console.log(`Article clicked: ${article.title}`, article);
//                 // Add your navigation logic here
//                 // Example: window.location.href = article.link;
                
//                 // For demo purposes
//                 alert(`Navigate to article: ${article.title}`);
//             }

//             // Method to add new articles
//             addArticle(article) {
//                 this.articles.push(article);
//                 this.renderArticles();
//             }

//             // Method to update articles
//             updateArticles(newArticles) {
//                 this.articles = newArticles;
//                 this.renderArticles();
//             }
//         }

//         // Initialize when DOM is loaded
//         document.addEventListener('DOMContentLoaded', () => {
//             window.articleManager = new ArticleManager();
//         });

//         // Add custom styles for line clamping
//         const style = document.createElement('style');
//         style.textContent = `
//             .line-clamp-2 {
//                 display: -webkit-box;
//                 -webkit-line-clamp: 2;
//                 -webkit-box-orient: vertical;
//                 overflow: hidden;
//             }
//         `;
//         document.head.appendChild(style);

//         // Demo refresh button
//         const refreshBtn = document.createElement('button');
//         refreshBtn.textContent = 'Refresh Articles';
//         refreshBtn.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors';
//         refreshBtn.addEventListener('click', () => {
//             if (window.articleManager) {
//                 window.articleManager.showSkeletons();
//                 setTimeout(() => {
//                     window.articleManager.renderArticles();
//                 }, 1000);
//             }
//         });
//         document.body.appendChild(refreshBtn);