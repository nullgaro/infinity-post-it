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
        'p-light-turquoise': '#90DDF0',
      },
    },
  },
  plugins: [],
}

export default config;