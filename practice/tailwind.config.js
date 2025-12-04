/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,php,js}",          // all HTML/PHP/JS files in practice/
    "./**/*.{html,php,js}"        // all HTML/PHP/JS files in subfolders
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
