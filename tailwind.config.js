import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const colors = require('tailwindcss/colors');
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': '#0e1112',
                'background': '#f6f7f7',
                'primary': '#7a8c93',
                'secondary': '#aeaebd',
                'accent': '#9c98ab',
                'drk-text': '#eef1f2',
                'drk-background': '#1d2121',
                'drk-primary': '#6c7d84',
                'drk-secondary': '#434351',
                'drk-accent': '#595568',
            },


            variants: {
            },
        },
    },

    plugins: [forms, typography],
};
