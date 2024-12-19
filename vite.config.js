import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],  // Đảm bảo rằng đường dẫn chính xác
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',  // Tạo build vào thư mục public/build
        manifest: true,           // Kích hoạt tạo manifest.json
    },
});
