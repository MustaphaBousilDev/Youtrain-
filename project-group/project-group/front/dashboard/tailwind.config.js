/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.{html,js,php}',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'my-blue': '#334155',
      'my-color-red': '#e11d48',
      'my-gray': '#6b7280',
      'my-gray-border':'#e2e8f0',
      'my-gray-light': '#9ca3af',
      'my-blue-vairalble':'#3AAFD2',
      'my-pink':'#F5B1B0',
      'my-orange':'#EBA170',
      'silver': '#ecebff',
      'bubble-gum': '#ff77e9',
      'bermuda': '#78dcca',
      'my-green':'rgb(128, 255, 96)'
    },
    screens:{
      xs:'300px',
      sm:'576px',
      md:'768px',
      lg:'992px',
      xl:'1200px'
    },
    container:{
      center:true,
      padding:'0.1rem'//padding container 
    },
    extend: {
      fontFamily:{
        poppins: "'Poppins', sans-serif",
        roboto : "'Roboto', sans-serif"
      },
      colors:{
        'primary'  :'#FD3D57',//principal color     
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
