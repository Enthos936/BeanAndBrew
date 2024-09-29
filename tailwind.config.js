const plugin = require('tailwindcss/plugin')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./components/**/*.php","./views/**/*.view.php", "./src/**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        brown: "#402000",
        cream: "#E0E5B6"
      }, 
      height: {
      },
      fontFamily: {
        "jura": ["Jura","sans-serif"]
      },
      screens: {
        "desktop": "1600px",
      }
    },
    plugins: [
    ],
  },
}

