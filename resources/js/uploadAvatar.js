import Croppie from "croppie";
import { closeModalMenu } from "./modal";

const avatarInput = document.getElementById("avatar");
const avatarImage = document.getElementById("avatar-image");
const avatarPreview = document.getElementById("preview");
const uploadBox = document.getElementById("upload-box");
const setupBox = document.getElementById("setup-box");
const destroyImage = document.getElementById("destroy-image");
const saveImage = document.getElementById("save-image");
const base64Image = document.getElementById("base64-image");
const mainForm = document.getElementById("main-form");

const setUp = () => {
    let preview = new Croppie(document.getElementById("preview"), {
        mouseWheelZoom: true,
        viewport: { width: 150, height: 150, type: "circle" },
        boundary: { height: 300 },
        enableExif: true,
    });

    destroyImage.addEventListener("click", () => {
        preview.destroy();
        uploadBox.classList.toggle("hidden");
        setupBox.classList.toggle("hidden");

        avatarPreview.src = "";
    });
    saveImage.addEventListener("click", () => {
        preview.result("blob").then((blob) => {
            avatarImage.src = URL.createObjectURL(blob);
        });
        closeModalMenu("upload-avatar");
    });

    mainForm.addEventListener("submit", (e) => {
        e.preventDefault();

        preview.result("base64").then((result) => {
            base64Image.value = result;
            mainForm.submit();
        });
    });
};

avatarInput.addEventListener("change", (e) => {
    uploadBox.classList.toggle("hidden");
    setupBox.classList.toggle("hidden");

    avatarPreview.src = URL.createObjectURL(e.target.files[0]);

    setUp();
});

// toggle theme and avatar boxes
const closeThemeBoxIcon = document.getElementById("close-theme-box-icon");
const openThemeBoxIcon = document.getElementById("open-theme-box-icon");
const toggleBoxesInput = document.getElementById("toggle-boxes");

toggleBoxesInput.addEventListener("change", () => {
    if (toggleBoxesInput.checked) {
        closeThemeBoxIcon.classList.remove("opacity-0", "invisible");
        closeThemeBoxIcon.classList.add("opacity-100", "visible");

        openThemeBoxIcon.classList.remove("opacity-100", "visible");
        openThemeBoxIcon.classList.add("opacity-0", "invisible");
    } else {
        closeThemeBoxIcon.classList.remove("opacity-100", "visible");
        closeThemeBoxIcon.classList.add("opacity-0", "invisible");

        openThemeBoxIcon.classList.remove("opacity-0", "invisible");
        openThemeBoxIcon.classList.add("opacity-100", "visible");
    }
});
