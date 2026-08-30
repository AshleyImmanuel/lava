import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
                orbitron: ['Orbitron', 'sans-serif'],
            },
            colors: {
                lava: {
                    50: '#ffebee',
                    100: '#ffcdd2',
                    200: '#ef9a9a',
                    300: '#e57373',
                    400: '#ef5350',
                    500: '#f44336',
                    600: '#e53935',
                    700: '#d32f2f',
                    800: '#c62828',
                    900: '#b71c1c',
                    950: '#8d0000',
                },
                ember: {
                    400: '#ffb74d',
                    500: '#ff9800',
                    600: '#fb8c00',
                },
                ash: {
                    200: '#eeeeee',
                    300: '#e0e0e0',
                    400: '#bdbdbd',
                    500: '#9e9e9e',
                    600: '#757575',
                    700: '#616161',
                    800: '#424242',
                    900: '#212121',
                    950: '#000000',
                },
            },
        },
    },

    plugins: [forms],
};
