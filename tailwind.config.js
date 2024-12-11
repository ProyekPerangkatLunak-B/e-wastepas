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
                "second-gray": "#888E86",
                "tertiary-color": "#E2EDE0",
                "first": "#E5E5E5",
                "second": "#F0F0F0",
                "third": "#595959",
                "fourth": "#437252",
                "five": "#F4F6F9",
                "six": "#60B15B",
                "seven": "#FF6969",
                
                
            },
        },
    },
    plugins: [],
};
