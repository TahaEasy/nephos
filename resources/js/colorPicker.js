// ----------------------------------------->
const swatches = document.getElementsByClassName("swatch");
const documentElement = document.documentElement;
const body = document.body;

for (let i = 0; i < swatches.length; i++) {
    const swatch = swatches[i];

    swatch.addEventListener("click", () => {
        body.setAttribute("data-theme", swatch.value);
        localStorage.themeColor = swatch.value;
    });
}

const setSystemTheme = () => {
    if (
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
        documentElement.setAttribute("data-theme", "dark");
        body.setAttribute("data-theme", "default-light");
        if (!localStorage.themeColor) {
            localStorage.themeColor = "default-light";
        }
        localStorage.theme = "dark";
    } else {
        documentElement.setAttribute("data-theme", "light");
        body.setAttribute("data-theme", "default");
        if (!localStorage.themeColor) {
            localStorage.themeColor = "default";
        }
        localStorage.theme = "light";
    }
};

if (!localStorage.theme) {
    setSystemTheme();
} else {
    if (localStorage.theme == "light") {
        documentElement.setAttribute("data-theme", "light");
    } else {
        documentElement.setAttribute(
            "data-theme",
            localStorage.theme || "light"
        );
    }
}
body.setAttribute("data-theme", localStorage.themeColor || "default");
// ----------------------------------------->
