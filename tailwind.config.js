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
            colors:{
                jon: {
                    '50': '#f9f6f8',
                    '100': '#f5eef1',
                    '200': '#ecdee4',
                    '300': '#dec3ce',
                    '400': '#c89ead',
                    '500': '#b57f92',
                    '600': '#9e6475',
                    '700': '#86505e',
                    '800': '#70444f',
                    '900': '#5f3c44',
                    '950': '#3a2127',
                },
                cyan: colors.cyan,
            },
            variants: {
                extend: {
                    backgroundColor: ['hover','bg-cyan-700'],
                },
            },
        },
    },

    plugins: [forms, typography],
};
