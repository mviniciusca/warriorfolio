/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'
const colors = require('tailwindcss/colors')
export default {
    // presets: [preset],
    content: [
         './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
darkMode: 'class',
  theme: {
      extend: {
          colors: {
              primary: colors.purple, // accent color
              secondary: colors.zinc, // choose a dark color.
              tertiary: colors.rose, // highlight effects color
        }
    },
  },
    plugins: [
  ],
}

