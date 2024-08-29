import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true,
        origin: 'http://localhost:5174', // Use a different port here
        port: 5174, // Change to the new port
        strictPort: true, // Keep this if you want to ensure Vite uses the specified port
        cors: {
            origin: 'http://localhost:5174', // Update CORS origin to match the new port
            credentials: true,
        },
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
