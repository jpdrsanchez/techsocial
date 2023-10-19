const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.css",
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Inter Variable', ...defaultTheme.fontFamily.sans],
      }
    },
  },
  plugins: [],
}

