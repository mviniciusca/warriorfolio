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
    safelist: [
        'notify', 'tag', 'dg', 'tl', 'ht', 'animate-pulse', 'animate-ping', 'rocket', 'bg-secondary-100', 'bg-black', 'bg-white'
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.purple,//accent color: default purple
                secondary: colors.zinc,//dark color: default zinc
                tertiary: colors.pink,//highlight fx color: default pink
                danger: colors.red,//danger color: default red
                success: colors.green,//success color: default green
                info: colors.blue,//info color: default blue
                warning: colors.yellow,//warning color: default yellow
            }
        },
    },
    plugins: [
    ],
}

