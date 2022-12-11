import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        // laravel({
        //     input: ['resources/css/app.css', 'resources/js/app.js'],
        //     refresh: true,
        // }),
        laravel([
            'resources/css/album.css',
            'resources/css/app.css',
            'resources/css/header.css',
            'resources/css/landing.css',
            'resources/css/list.css',
            'resources/css/login.css',
            'resources/css/profile.css',
            'resources/css/register.css',
            'resources/css/reproductor.css',
            'resources/css/song.css',
            'resources/js/app.js',
            'resources/js/profile.js',
            'resources/js/song.js',
            'resources/js/reproductor.js',
            'resources/js/register.js'
        ]),
    ],
});
