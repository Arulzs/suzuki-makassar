/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#b90014",
        "primary-container": "#e31b23",
        "racing-red-hover": "#c4151c",
        "navy-depth": "#06182a",
        "emerald-action": "#059669",
        "surface-ice": "#f8fafc",
        "border-subtle": "#e2e8f0",
        "border-strong": "#cbd5e1",
        secondary: "#49607e",
        "secondary-fixed": "#d2e4ff",
        "surface-container-low": "#f0f3ff",
        "surface-container-lowest": "#ffffff",
      },
      fontFamily: {
        headline: ['"Plus Jakarta Sans"', 'sans-serif'],
        body: ['"Inter"', 'sans-serif'],
      },
    },
  },
  plugins: [],
}