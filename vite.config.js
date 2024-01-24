import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

// import react from '@vitejs/plugin-react';
// import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // frontend
                "resources/assets/css/app-frontend.scss",
                "resources/assets/js/app-frontend.js",
                // backend
                "resources/assets/css/app-backend.scss",
                "resources/assets/js/app-backend.js",
            ],
            refresh: [
                "app/View/Components/**",
                "lang/**",
                "resources/lang/**",
                "resources/views/**",
                "resources/routes/**",
                "routes/**",
                "modules/**/Resources/lang/**",
                "modules/**/Resources/views/**/*.blade.php",
            ],
        }),
        // react(),
        // vue({
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
    ],
    resolve: {
        alias: {
            "~node_modules": path.resolve(__dirname, "node_modules"),
            "~vendor": path.resolve(__dirname, "vendor"),
        },
    },
});