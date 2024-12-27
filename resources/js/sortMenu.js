

// Sorts Menu
const sortsMenu = document.getElementById("sorts-menu");
const btnToggleSortsMenu = document.getElementById("toggle-sorts-menu");

const toggleSortsMenu = () => {
    if (btnToggleSortsMenu.checked) {
        sortsMenu.classList.remove("-translate-x-full");
        sortsMenu.classList.add("translate-x-0");
    } else {
        sortsMenu.classList.remove("translate-x-0");
        sortsMenu.classList.add("-translate-x-full");
    }
};

btnToggleSortsMenu.addEventListener("click", toggleSortsMenu);

// const sorts = ["house", "office", "kids", "kitchen", "accessories", "top"];

// for (let i = 0; i <= sorts.length - 1; i++) {
//     const sort = sorts[i];
//     const sortBtn = document.getElementById("go-" + sort);
//     if (sort != "top") {
//         const sortEl = document.getElementById(sort);

//         sortBtn.addEventListener("click", () => {
//             sortEl.scrollIntoView({ behavior: "smooth" });
//         });
//     } else {
//         sortBtn.addEventListener("click", () => {
//             window.scroll({
//                 top: 0,
//                 behavior: "smooth",
//             });
//         });
//     }
// }