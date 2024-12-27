const downloadButton = document.getElementById("download-btn");
const content = document.getElementById("content");

downloadButton.addEventListener("click", async function () {
    const filename = "nephos-invoice.pdf";

    try {
        const opt = {
            filename: filename,
            image: {
                type: "jpeg",
                quality: 0.98,
            },
            html2canvas: {
                scale: 2,
            },
            jsPDF: {
                unit: "in",
                format: "letter",
                orientation: "portrait",
            },
        };
        await html2pdf().set(opt).from(content).save();
    } catch (error) {
        console.error("Error:", error.message);
    }
});

const printBtn = document.getElementById("print-btn");

printBtn.addEventListener("click", () => {
    window.print();
});
