import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Warnings disabled
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler', // Using the modern compiler
                silenceDeprecations: [
                    'import',
                    'global-builtin',
                    'color-functions',
                    'legacy-js-api'
                ],
            },
        },
    },
});
