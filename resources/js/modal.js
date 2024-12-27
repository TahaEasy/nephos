const modalBoxes = document.getElementsByClassName("modal-box");
const openModalMenuBtns = document.getElementsByClassName("open-modal-menu");
const closeModalMenuBtns = document.getElementsByClassName("close-modal-menu");

let currentModal = "";

export const closeModalMenu = (dataModal) => {
    document
        .getElementById("modal-" + dataModal)
        .classList.remove("visible", "opacity-100", "pointer-events-auto");
    document
        .getElementById("modal-" + dataModal)
        .classList.add("invisible", "opacity-0", "pointer-events-none");
};
export const openModalMenu = (dataModal) => {
    currentModal = dataModal;

    document
        .getElementById("modal-" + dataModal)
        .classList.remove("invisible", "opacity-0", "pointer-events-none");
    document
        .getElementById("modal-" + dataModal)
        .classList.add("visible", "opacity-100", "pointer-events-auto");
};

document.addEventListener(
    "click",
    (e) => {
        for (let i = 0; i < modalBoxes.length; i++) {
            const modalBox = modalBoxes[i];
            const boxModalData = modalBox.getAttribute("data-modal");

            if (e.target.contains(modalBox) && boxModalData == currentModal) {
                closeModalMenu(boxModalData);
            }
        }
    },
    true
);

for (let i = 0; i < openModalMenuBtns.length; i++) {
    const button = openModalMenuBtns[i];
    button.addEventListener("click", () =>
        openModalMenu(button.getAttribute("data-modal"))
    );
}
for (let i = 0; i < closeModalMenuBtns.length; i++) {
    const button = closeModalMenuBtns[i];
    button.addEventListener("click", () =>
        closeModalMenu(button.getAttribute("data-modal"))
    );
}
