/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'
const colors = require('tailwindcss/colors')

/**
 * Paleta neutra da Saturn UI (texto, bordas, `saturn-50`…`saturn-950`).
 * Trocar para `colors.slate`, `colors.stone`, etc. realinha escala + superfícies escuras.
 */
const saturnNeutral = colors.zinc

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
        'notify', 'saturn-tag', 'saturn-notify', 'dg', 'tl', 'ht', 'animate-pulse', 'animate-ping', 'rocket', 'bg-secondary-100', 'bg-black', 'bg-white', 'w-10', 'h-10',
        // Grid classes for card-grid component
        'grid-cols-1', 'grid-cols-2', 'grid-cols-3', 'grid-cols-4',
        'md:grid-cols-2', 'md:grid-cols-3', 'md:grid-cols-4',
        'lg:grid-cols-3', 'lg:grid-cols-4',
        'xl:grid-cols-4',
        // Gap classes
        'gap-1', 'gap-2', 'gap-3', 'gap-4', 'gap-5', 'gap-6', 'gap-8', 'gap-10', 'gap-12', 'gap-16',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Geist"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                primary: colors.violet,
                info: colors.blue,
                danger: colors.red,
                success: colors.green,
                warning: colors.yellow,
                secondary: colors.zinc,
                tertiary: colors.pink,

                /** Escala neutra Saturn — ver `saturnNeutral` no topo do ficheiro */
                saturn: saturnNeutral,

                /** Fundo página claro / escuro (`.saturn-bg`, `.saturn-bg-inverse`) */
                'saturn-surface': '#ffffff',
                'saturn-surface-dark': saturnNeutral[950],

                /** Trilhos suaves (`.saturn-bg-accent`, tabs) */
                'saturn-dark-accent': '#0f0f11',
                'saturn-light-accent': '#fcfcfc',
            }
        },
    },
    plugins: [
    ],
}
