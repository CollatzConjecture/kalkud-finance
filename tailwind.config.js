/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

const capitalizeFirst = plugin(function ({ addUtilities }) {
  const newUtilities = {
      ".capitalize-first:first-letter": {
          textTransform: "uppercase",
      },
  };
  addUtilities(newUtilities);
});

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  theme: {
        screens: {
            sm: "576px",
            md: "768px",
            lg: "992px",
        },
        fontFamily: {
            sans: ["Poppins", "sans-serif"],
        },
        extend: {
            colors: {
                black: "#333333",
                navy: "#121F3E",
                blue: {
                    primary: "#005596",
                    secondary: "#2579D1",
                    accent: "#E1F0FF",
                    shadow: "#7E8CAC",
                },
                red: "#D71920",
                orange: "#FEBD57",
                orangeKarier: "#E28F17",
                orangeSecondary: "#EA971D",
                green: {
                    primary: "#50A718",
                    secondary: "#2ED16C",
                },
                grey: {
                    primary: "#66696F",
                    secondary: "#ABB3C4",
                    accent: "#E7EAF5",
                    stroke: "#F2F2F2",
                },
                background: "#F8F9Fd",
            },
        },
    },
    plugins: [capitalizeFirst],
}