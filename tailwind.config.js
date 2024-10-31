import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Mulish", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "main-color": "#437252", 
                "second-gray": "#60B15B",
                "tertiary-color": "#E2EDE0",
            },
        },
    },
    plugins: [

    ],
};
