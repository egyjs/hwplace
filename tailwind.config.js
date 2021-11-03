const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'media',
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                sky: colors.sky,
                cyan: colors.cyan,
            },
        },
    },
    variants: {
        // extend: {},
    },
    plugins: [
        // require('@tailwindcss/forms'),
        // require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
        // require('tailwindcss-children'),
    ],
}
