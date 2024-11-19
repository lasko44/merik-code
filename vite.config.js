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
        globals: true,
        environment: "jsdom",
        coverage: {
            provider: 'v8',
            reporter: ['text', 'json', 'html'],
            reportsDirectory: './build/js/coverage',
            thresholds: {
                lines: 75,
                functions: 75,
                branches: 75,
                statements: 75
            },
            exclude:[
                './vendor/',
                './build',
                './public',
                'tests',
                'postcss.config.js',
                'tailwind.config.js',
                'vite.config.js',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/Shared/Typography/utils/classes.js',
                'resources/js/Shared/Inputs/utils/classes.js',
                'jest.config.mjs',
                'eslint.config.js'
            ]
        },
    },
});
