import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
const path = require("path");

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                background: "var(--background)",
                foreground: "var(--foreground)",
                primary: "var(--primary)",
            },
            fontFamily: {
                sora: ["var(--font-sora)"],
                poppins: ["var(--font-poppins)"],
            },
            keyframes: {
                typing: {
                    "0%": {
                        width: "0%",
                        visibility: "hidden",
                    },
                    "100%": {
                        width: "100%",
                    },
                },
                blink: {
                    "50%": {
                        borderColor: "transparent",
                    },
                    "100%": {
                        borderColor: "white",
                    },
                },
            },
            animation: {
                typing: "typing 5s steps(20) infinite alternate, blink .7s infinite",
            },
        },
    },

    plugins: [forms],
};
