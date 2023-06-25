/** @type {import('tailwindcss').Config} */

const config = {
  content: ["./src/**/*.{html,js,svelte}"],
  theme: {
    extend: {
      colors: {
        'p-white': '#F0EDEE',
        'p-brown': '#4A001F',
        'p-dark-turquoise': '#07393C',
        'p-turquoise': '#2C666E',
        'p-light-turquoise': '#E0EBED',
      },
      screens: {
        'sm': '640px',
        // => @media (min-width: 640px) { ... }

        'md': '768px',
        // => @media (min-width: 768px) { ... }

        'lg': '1024px',
        // => @media (min-width: 1024px) { ... }

        'xl': '1280px',
        // => @media (min-width: 1280px) { ... }

        '2xl': '1536px',
        // => @media (min-width: 1536px) { ... }
      }
    },
  },
  plugins: [],
}

export default config;