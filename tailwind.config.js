/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./components/**/*.php","./views/**/*..view.php", "./src/**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        brown: "#402000",
      }, 
      height: {
      },
    },
  plugins: []
  }
}

