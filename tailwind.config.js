/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.{vue,js,ts}'
  ],
  theme: {
    extend: {
      colors: {
        salmon: '#fb9678',
        'metallic-yellow': '#fec90f',
        turqoise: '#03c9d7',
        'persian-green': '#05b187'
      }
    },
  },
  plugins: [],
}

