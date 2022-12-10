import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        // laravel({
        //     input: ['resources/css/app.css', 'resources/js/app.js'],
        //     refresh: true,
        // }),
        laravel([
            'resources/css/landing.css',
            'resources/css/reproductor.css',
            'resources/css/app.css',
            'resources/css/form.css',
            'resources/css/album.css',
            'resources/css/header.css',
            'resources/css/profile.css',
            'resources/css/register.css',
            'resources/css/song.css',
            'resources/css/list.css',
            'resources/css/login.css',
            'resources/js/landing.js',
            'resources/js/app.js',
            'resources/js/profile.js',
            'resources/js/register.js',
            'resources/js/song.js',
            'resources/js/reproductor.js'
        ]),
    ],
});
