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
        'notify', 'tag', 'dg', 'tl', 'ht', 'animate-pulse', 'animate-ping', 'rocket', 'bg-secondary-100', 'bg-black', 'bg-white', 'w-10', 'h-10',
        // Grid classes for card-grid component
        'grid-cols-1', 'grid-cols-2', 'grid-cols-3', 'grid-cols-4',
        'md:grid-cols-2', 'md:grid-cols-3', 'md:grid-cols-4',
        'lg:grid-cols-3', 'lg:grid-cols-4',
        'xl:grid-cols-4',
        // Gap classes
        'gap-1', 'gap-2', 'gap-3', 'gap-4', 'gap-5', 'gap-6', 'gap-8',
    ],
    theme: {
        extend: {
            colors: {
                saturn: colors.zinc,//main color: default zinc
                primary: colors.purple,//accent color: default purple

                info: colors.blue,//info color: default blue
                danger: colors.red,//danger color: default red
                success: colors.green,//success color: default green
                warning: colors.yellow,//warning color: default yellow

                secondary: colors.zinc,//dark color: default zinc
                tertiary: colors.pink,//highlight fx color: default pink
            }
        },
    },
    plugins: [
    ],
}

