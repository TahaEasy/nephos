import Croppie from "croppie";
import { closeModalMenu } from "./modal";

const productInput = document.getElementById("image");
const productImage = document.getElementById("product-image");
const productPreview = document.getElementById("preview");
const uploadBox = document.getElementById("upload-box");
const setupBox = document.getElementById("setup-box");
const destroyImage = document.getElementById("destroy-image");
const saveImage = document.getElementById("save-image");
const base64Image = document.getElementById("base64-image");
const mainForm = document.getElementById("main-form");

const setUp = () => {
    let preview = new Croppie(document.getElementById("preview"), {
        mouseWheelZoom: true,
        viewport: { width: 150, height: 150 },
        boundary: { height: 300 },
        enableExif: true,
    });

    destroyImage.addEventListener("click", () => {
        preview.destroy();
        uploadBox.classList.toggle("hidden");
        setupBox.classList.toggle("hidden");

        productPreview.src = "";
    });
    saveImage.addEventListener("click", () => {
        preview.result("blob").then((blob) => {
            productImage.src = URL.createObjectURL(blob);
        });
        closeModalMenu("upload-product-image");
    });

    mainForm.addEventListener("submit", (e) => {
        e.preventDefault();

        preview.result("base64").then((result) => {
            base64Image.value = result;
            mainForm.submit();
        });
    });
};

productInput.addEventListener("change", (e) => {
    uploadBox.classList.toggle("hidden");
    setupBox.classList.toggle("hidden");

    productPreview.src = URL.createObjectURL(e.target.files[0]);

    setUp();
});
