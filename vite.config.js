import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        // laravel({
        //     input: ['resources/css/app.css', 'resources/js/app.js'],
        //     refresh: true,
        // }),
        laravel([
            'resources/css/app.css',
            'resources/css/form.css',
            'resources/css/header.css',
            'resources/css/profile.css',
            'resources/css/song.css',
            'resources/js/app.js',
            'resources/js/song.js',
        ]),
    ],
});
