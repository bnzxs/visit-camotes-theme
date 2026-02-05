/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./inc/**/*.php",
    "./template-parts/**/*.php",
  ],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "primary": "#ee6c2b",
        "background-light": "#f8f6f6",
        "background-dark": "#221610",
        "text-main": "#181311",
        "text-sub": "#896f61",
        "border": "#f4f2f0",
      },
      fontFamily: {
        "display": ["Plus Jakarta Sans", "sans-serif"],
        "body": ["Noto Sans", "sans-serif"],
      },
      borderRadius: {
        "DEFAULT": "0.25rem",
        "lg": "0.5rem",
        "xl": "0.75rem",
        "2xl": "1rem",
        "full": "9999px"
      },
      boxShadow: {
        "editorial": "0 4px 20px -2px rgb(0 0 0 / 20%)",
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/container-queries'),
  ],
}
