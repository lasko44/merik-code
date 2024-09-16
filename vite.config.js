import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    test: {
        coverage: {
            provider: 'v8',
            reporter: ['text', 'json', 'html'],
            reportsDirectory: './build/js/coverage',
            exclude:[
                './vendor/',
                './build',
                './public',
                'postcss.config.js',
                'tailwind.config.js',
                'vite.config.js',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'jest.config.mjs'
            ]
        },
    },
});
