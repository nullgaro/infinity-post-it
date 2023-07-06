/** @type {import('tailwindcss').Config} */

const config = {
  content: ["./src/**/*.{html,js,svelte}"],
  theme: {
    extend: {
      colors: {
        'p-black': '#222831',
        'p-gray': '#393E46',
        'p-brown': '#765C48',
        'p-navy': '#00ADB5',
        'p-light-navy': '#00BCC6',
        'p-light-gray': '#B8B8B8',
        'p-white': '#D3D3D3',
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