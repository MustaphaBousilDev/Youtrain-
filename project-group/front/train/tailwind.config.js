/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html'],
  theme: {
    screens: {
      sm: '280px',
      md: '768px',
      lg: '976px',
      xl: '1440px',

      // xs:'300px',
      // sm: '576px',
      // md: '768px',
      // lg: '992px',
      // xl: '1200px',
    },
    extend: {},
  },
  plugins: [],
}
