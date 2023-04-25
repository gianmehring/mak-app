const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
        "./resources/**/**/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: { 
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            /*
            fontSize: {
              sm: '0.8rem',
              base: '1rem',
              lg: '1.125rem',
              xl: '1.25rem',
              '2xl': '1.563rem',
              '3xl': '1.953rem',
              '4xl': '2.25rem',
              '5xl': '3rem',
              '6xl': '3.75rem',
              '7xl': '4.5rem',
              '8xl': '6rem',
              '9xl': '8rem',
            },
            */
        },
    },
    
    corePlugins: {
        container: false,
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
