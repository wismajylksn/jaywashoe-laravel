import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                serif: ['"Playfair Display"', 'serif'],
                sans: ['"DM Sans"', 'sans-serif']
            },
            colors: {
                brand: {
                    teal: '#629487',
                    mustard: '#DFA826',
                    red: '#C53A33',
                    dark: '#1E2322',
                    paper: '#F9F7F1',
                    muted: '#64748B'
                }
            },
            boxShadow: {
                'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                'float': '0 10px 30px -4px rgba(98, 148, 135, 0.15)',
                'glass': '0 4px 30px rgba(0, 0, 0, 0.05)',
            }
        }
    },
    plugins: [],
};