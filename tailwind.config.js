/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
        "./app/Livewire/Tables/*.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Noto Sans Adlam", ...defaultTheme.fontFamily.sans],
                title: ["ADLaM Display", "sans"],
            },
        },
    },
};
