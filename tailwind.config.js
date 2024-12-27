/** @type {import('tailwindcss').Config} */
import { createThemes } from "tw-colors";

export default {
    darkMode: ["selector", '[data-theme="dark"]'],
    content: [
        "./resources/**/*.blade.php",
        "./vendor/usernotnull/tall-toasts/config/**/*.php",
        "./vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            screens: {
                xxs: "460px",
                xs: "531px",
                mmd: "900px",
                llg: "1200px",
            },
            rotate: {
                225: "225deg",
                270: "270deg",
                360: "360deg",
                720: "720deg",
            },
            colors: {
                layout: "#F0F0F0",
                submit: "#00D1B2",
                default: "#0023FF",
                "default-light": "#304cff",
                sea: "#66a5d7",
                aquamarine: "#7FFFD4",
                purpley: "#7C00FF",
                livery: "#752c53",
                muddy: "#3b8456",
                sandy: "#a0563d",
                grown: "#5f5850",
                gold: "#ffd700",
                orangey: "#FFB000",
                redy: "#F93052",
                "withered-purple": "#817799",
                pinky: "#e17ea5",
                // green: "#00b289",
                greeny: "#75b85b",
                beige: "#f4cdaf",
                black: "#000000",
                "majorelle-blue": "#6050DC",
                tawny: "#CD5700",
            },
            fontFamily: {
                tanha: "Tanha",
            },
            backgroundImage: {
                "home-light": 'url("../../public/img/home/main-bg-light.jpg")',
                "home-dark": 'url("../../public/img/home/main-bg-dark.jpg")',
                "shop-accessories":
                    "url(../../public/img/shop/accessories.jpeg)",
                "shop-house": "url(../../public/img/shop/house.jpeg)",
                "shop-kids": "url(../../public/img/shop/kids.jpeg)",
                "shop-kitchen": "url(../../public/img/shop/kitchen.jpeg)",
                "shop-office": "url(../../public/img/shop/office.jpeg)",
                "avatar-preview":
                    "url(../../public/img/illustrations/preview-bg.jpg)",
            },
            fontSize: {
                "xxs": "0.7rem",
            },
            boxShadow: {
                'discount-glow': '0 0 20px 3px hsl(var(--twc-primary) / var(--twc-primary-opacity, 1))'
            }
        },
    },
    plugins: [
        createThemes(
            {
                light: {
                    primary: "#12f125",
                },
                default: {
                    primary: "#0023FF",
                },
                "default-light": {
                    primary: "#304cff",
                },
                sea: {
                    primary: "#66a5d7",
                },
                aquamarine: {
                    primary: "#7FFFD4",
                },
                purpley: {
                    primary: "#7C00FF",
                },
                livery: {
                    primary: "#752c53",
                },
                muddy: {
                    primary: "#3b8456",
                },
                sandy: {
                    primary: "#a0563d",
                },
                grown: {
                    primary: "#5f5850",
                },
                gold: {
                    primary: "#ffd700",
                },
                orangey: {
                    primary: "#FFB000",
                },
                redy: {
                    primary: "#F93052",
                },
                "withered-purple": {
                    primary: "#817799",
                },
                pinky: {
                    primary: "#e17ea5",
                },
                // green: {
                //     primary: "#00b289",
                // },
                greeny: {
                    primary: "#75b85b",
                },
                beige: {
                    primary: "#f4cdaf",
                },
                black: {
                    primary: "#000000",
                },
                "majorelle-blue": {
                    primary: "#6050DC",
                },
                tawny: {
                    primary: "#CD5700",
                },
            },
            {
                strict: false,
            }
        ),
    ],
};
