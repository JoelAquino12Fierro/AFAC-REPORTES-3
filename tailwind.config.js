import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'azul-afac':'rgba(0,55,100)',
                'dorado-afac':'rgba(188,149,92)',
                'azul-secundario':'rgba(149,168,190)',
                'dorado-secundario':'rgba(216,190,154)',
            }
        },
    },

    plugins: [forms, typography],
};
