import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/about.js',
                'resources/js/article.js',
                'resources/js/category.js',
                'resources/js/collection.js',
                'resources/js/footer.js',
                'resources/js/header.js',
                'resources/js/hero.js',
                'resources/js/hurray.js',
                'resources/js/image.js',
                'resources/js/newsletter.js',
                'resources/js/product.js'
            ],
            refresh: true,
        }),
    ],
});
