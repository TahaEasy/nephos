const priceInput = document.getElementById("price");
const currencyOutput = document.getElementById("currency-output");

const setPrice = () => {
    if (priceInput.value > 0) {
        currencyOutput.innerHTML =
            new Intl.NumberFormat().format(priceInput.value) + " تومان";
    } else if (priceInput.value < 0) {
        currencyOutput.innerHTML = "لطفا مقدار درست وارد کنید!";
    } else if (priceInput.value == 0) {
        currencyOutput.innerHTML = "لطفا مقداری وارد کنید";
    }
};

setPrice();

priceInput.addEventListener("input", (e) => {
    setPrice();
});
