import "./bootstrap";

// installer toast system
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";

Alpine.plugin(ToastComponent);
// end toasts

// Nav Bar
const btnOpenSearchs = document.getElementsByClassName("open-search");
const btnCloseSearchs = document.getElementsByClassName("close-search");
const searchMenu = document.getElementById("search-menu");

const btnOpenShop = document.getElementById("open-shop");
const btnCloseShop = document.getElementById("close-shop");
const shopMenu = document.getElementById("shop-menu");

const btnOpenCart = document.getElementById("open-cart");
const btnCloseCart = document.getElementById("close-cart");
const cartMenu = document.getElementById("cart-menu");

let isShopMenuClose = true;
let isCartMenuClose = true;

// shop menu
const openShopMenu = () => {
    if (btnOpenCart && btnCloseCart) {
        closeCartMenu();
    }
    shopMenu.classList.remove("translate-x-full");
    shopMenu.classList.add("translate-x-0");
    btnOpenShop.children[0].classList.add("fill-primary/20", "stroke-primary", "glow-primary");
    isShopMenuClose = false;
};

const closeShopMenu = () => {
    shopMenu.classList.remove("translate-x-0");
    shopMenu.classList.add("translate-x-full");
    btnOpenShop.children[0].classList.remove(
        "fill-primary/20",
        "stroke-primary",
        "glow-primary"
    );
    isShopMenuClose = true;
};

btnOpenShop.addEventListener("click", () =>
    isShopMenuClose ? openShopMenu() : closeShopMenu()
);
btnCloseShop.addEventListener("click", closeShopMenu);

// cart menu
const openCartMenu = () => {
    closeShopMenu();
    cartMenu.classList.remove("translate-x-full");
    cartMenu.classList.add("translate-x-0");
    btnOpenCart.children[0].classList.add("fill-primary/20", "stroke-primary", "glow-primary");
    isCartMenuClose = false;
};

const closeCartMenu = () => {
    cartMenu.classList.remove("translate-x-0");
    cartMenu.classList.add("translate-x-full");
    btnOpenCart.children[0].classList.remove(
        "fill-primary/20",
        "stroke-primary",
        "glow-primary"
    );
    isCartMenuClose = true;
};

if (btnOpenCart && btnCloseCart) {
    btnOpenCart.addEventListener("click", () =>
        isCartMenuClose ? openCartMenu() : closeCartMenu()
    );
    btnCloseCart.addEventListener("click", closeCartMenu);
}

// search menu
const openSearchMenu = () => {
    searchMenu.classList.remove("translate-x-full");
    searchMenu.classList.add("translate-x-0");

    for (let i = 0; i < btnOpenSearchs.length; i++) {
        const btnOpenSearch = btnOpenSearchs[i];
        btnOpenSearch.classList.toggle("hidden");
        btnOpenSearch.classList.toggle("flex");
    }

    for (let i = 0; i < btnCloseSearchs.length; i++) {
        const btnCloseSearch = btnCloseSearchs[i];
        btnCloseSearch.classList.toggle("hidden");
        btnCloseSearch.classList.toggle("flex");
    }
};

const closeSearchMenu = () => {
    searchMenu.classList.remove("translate-x-0");
    searchMenu.classList.add("translate-x-full");
    
    for (let i = 0; i < btnCloseSearchs.length; i++) {
        const btnCloseSearch = btnCloseSearchs[i];
        btnCloseSearch.classList.toggle("hidden");
        btnCloseSearch.classList.toggle("flex");
    }

    for (let i = 0; i < btnOpenSearchs.length; i++) {
        const btnOpenSearch = btnOpenSearchs[i];
        btnOpenSearch.classList.toggle("hidden");
        btnOpenSearch.classList.toggle("flex");
    }
};

for (let i = 0; i < btnOpenSearchs.length; i++) {
    const btnOpenSearch = btnOpenSearchs[i];
    btnOpenSearch.addEventListener("click", openSearchMenu);
}

for (let i = 0; i < btnCloseSearchs.length; i++) {
    const btnCloseSearch = btnCloseSearchs[i];
    btnCloseSearch.addEventListener("click", closeSearchMenu);
}

// Mobile Nav Bar
const btnToggleMobileNav = document.getElementById("toggle-mobile-menu");
const mobileMenu = document.getElementById("mobile-menu");

const openMobileMenu = () => {
    mobileMenu.classList.remove("-translate-y-full");
    mobileMenu.classList.add("translate-y-0");
};
const closeMobileMenu = () => {
    mobileMenu.classList.remove("translate-y-0");
    mobileMenu.classList.add("-translate-y-full");
};

btnToggleMobileNav.addEventListener("click", () => {
    btnToggleMobileNav.checked ? openMobileMenu() : closeMobileMenu();
});

// Dropdowns' outside click
const dropdowns = document.getElementsByClassName("dropdown");

const detectOutsideClick = (e) => {
    for (let i = dropdowns.length - 1; i >= 0; i--) {
        const dropdown = dropdowns[i];
        if (!e.target.contains(dropdown) && dropdown.checked) {
            dropdown.checked = false;
        }
    }
};

document.body.addEventListener("click", detectOutsideClick);

var animateButton = function (e) {
    e.preventDefault;
    //reset animation
    e.target.classList.remove("animate");

    e.target.classList.add("animate");
    setTimeout(function () {
        e.target.classList.remove("animate");
    }, 700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

if (bubblyButtons) {
    for (var i = 0; i < bubblyButtons.length; i++) {
        bubblyButtons[i].addEventListener("click", animateButton, false);
    }
}

window.onload = () => {
    const content = document.getElementById('all-contents')
    const loading = document.getElementById('loading-page')
    const body = document.body

    content.classList.toggle('hidden');
    loading.classList.toggle('hidden');
    body.classList.toggle('overflow-hidden');
}
