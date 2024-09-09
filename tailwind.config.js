/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./components/**/*.php","./views/**/*.{php,html,js}", "./src/**/*.{php,html,js}"],
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

