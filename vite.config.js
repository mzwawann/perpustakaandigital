import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        // tailwindcss(),
    ],
    // server: {
    //     host: true,  // Memungkinkan akses dari jaringan lokal
    //     port: 5173,  // Port default Vite (bisa diganti)
    //     strictPort: true,  // Pastikan port tidak berubah
    //     hmr: {
    //         host: '192.168.2.105', // Ganti dengan IP lokal komputer kamu
    //     }
    // }
});
