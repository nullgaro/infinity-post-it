/** @type {import('tailwindcss').Config} */

const config = {
  content: ["./src/**/*.{html,js,svelte}"],
  theme: {
    extend: {
      colors: {
        'p-white': '#FCFCFC',
        'p-black': '#292D32',
        'p-blue': '#C4DFDF',
        'p-light-blue': '#F8F6F4',
        'p-yellow': '#FFD966',
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