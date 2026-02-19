import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            // Deux entries : CSS en <link> direct + JS → CSS visible même si le script charge après
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**',
                'resources/css/**',
                'resources/js/**',
            ],
        }),
        tailwindcss(),
    ],
    server: {
        host: true, // Écoute sur 0.0.0.0 pour être joignable (évite problèmes réseau)
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',
            port: 5173,
            protocol: 'ws',
            clientPort: 5173,
        },
        watch: {
            usePolling: true,
            ignored: ['**/storage/framework/views/**', '**/node_modules/**'],
        },
        origin: 'http://localhost:5173',
    },
});
