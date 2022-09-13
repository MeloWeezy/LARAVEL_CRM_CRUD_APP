import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import viteBasicSslPlugin from "@vitejs/plugin-basic-ssl";

export default defineConfig({
    plugins: [
        viteBasicSslPlugin(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: true,
        host: 'localhost',
        hmr: {
            overlay: true
        }
    }
});
