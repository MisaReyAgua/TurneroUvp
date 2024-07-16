import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/chart.js',
                'resources/js/codemirror.js',
                'resources/js/dashboard.js',
                'resources/js/file-upload.js',
                'resources/js/jquery-file-upload.js',
                'resources/js/jquery.cookie.js',
                'resources/js/misc.js',
                'resources/js/off-canvas.js',
                'resources/js/select2.js',
                'resources/js/settings.js',
                'resources/js/todolist.js',
                'resources/js/typeahead.js',
                
                ],
            refresh: true,
        }),
    ],
});
