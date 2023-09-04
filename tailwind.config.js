/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Noto Sans Adlam", ...defaultTheme.fontFamily.sans],
                title: ["ADLaM Display", "sans"],
            },
        },
    },
};
