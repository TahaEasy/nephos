// Product Menu -> stars
const starInputs = document.getElementsByClassName("star-input");
const ratingText = document.getElementById("rate-text");
let selectedStar = 0;

const isAnyChecked = () => {
    for (let i = 0; i < starInputs.length; i++) {
        const starInput = starInputs[i];
        if (starInput.checked) {
            return true;
        }
    }
    return false;
};

for (let i = 0; i < starInputs.length; i++) {
    const starInput = starInputs[i];
    const currentStar = document.getElementById("star-" + (i + 1));

    currentStar.addEventListener("mouseenter", () => {
        for (let j = i; j >= 0; j--) {
            const star = document.getElementById("star-" + (j + 1));

            if (isAnyChecked()) {
                star.classList.add("text-yellow-200");
            } else {
                star.classList.add("text-yellow-400");
            }
        }
    });
    currentStar.addEventListener("mouseleave", () => {
        for (let j = 0; j < 5; j++) {
            const star = document.getElementById("star-" + (j + 1));

            if (isAnyChecked()) {
                star.classList.remove("text-yellow-200");
            } else {
                star.classList.remove("text-yellow-400");
            }
        }
    });
    starInput.addEventListener("click", () => {
        selectedStar = i;
        switch (i) {
            case 0:
                ratingText.innerHTML = "افتضاح";
                break;
            case 1:
                ratingText.innerHTML = "بد";
                break;
            case 2:
                ratingText.innerHTML = "متوسط";
                break;
            case 3:
                ratingText.innerHTML = "خوب";
                break;
            case 4:
                ratingText.innerHTML = "عالی";
                break;
        }
        if (starInput.checked) {
            for (let j = 0; j < 5; j++) {
                const star = document.getElementById("star-" + (j + 1));

                if (j <= i) {
                    star.classList.remove(
                        "text-yellow-400",
                        "text-gray-400",
                        "text-yellow-200"
                    );
                    star.classList.add("text-yellow-400");
                } else {
                    star.classList.remove(
                        "text-yellow-400",
                        "text-gray-400",
                        "text-yellow-200"
                    );
                    star.classList.add("text-gray-400");
                }
            }
        }
    });
}
