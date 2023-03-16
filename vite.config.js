import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/images-preview.js',
                'resources/js/image-actions.js',
                'resources/js/admin/admin.js',
                'resources/sass/app.scss',
                'resources/sass/admin/admin.scss',
                'resources/js/payments/paypal.js',
                'resources/js/product-actions.js'
            ],
            refresh: true,
        }),
    ],
});
