// icon
const authToggler = document.getElementById("auth-toggler");
const registerIcon = document.getElementById("register-icon");
const loginIcon = document.getElementById("login-icon");

const goRegisterBtns = document.getElementsByClassName("go-register");
const goLoginBtns = document.getElementsByClassName("go-login");

for (let i = 0; i < goRegisterBtns.length; i++) {
    const goRegisterBtn = goRegisterBtns[i];
    
    goRegisterBtn.addEventListener("click", () => {
        authToggler.checked = true;
        registerIcon.classList.remove("hidden");
        registerIcon.classList.add("block");
        loginIcon.classList.remove("block");
        loginIcon.classList.add("hidden");
    });
}

for (let i = 0; i < goLoginBtns.length; i++) {
    const goLoginBtn = goLoginBtns[i];

    goLoginBtn.addEventListener("click", () => {
        authToggler.checked = false;
        loginIcon.classList.remove("hidden");
        loginIcon.classList.add("block");
        registerIcon.classList.remove("block");
        registerIcon.classList.add("hidden");
    });
}


// show/hide password
const passwordInputs = document.getElementsByClassName("password-input");
const eyeTogglers = document.getElementsByClassName("eye-toggler");
const eyes = document.getElementsByClassName("eye");
const eyeSlashes = document.getElementsByClassName("eye-slash");

const showPasswords = (i) => {
    passwordInputs[i].setAttribute("type", "text");
    eyeSlashes[i].classList.remove("hidden");
    eyes[i].classList.add("hidden");
};

const hidePasswords = (i) => {
    passwordInputs[i].setAttribute("type", "password");
    eyes[i].classList.remove("hidden");
    eyeSlashes[i].classList.add("hidden");
};

for (let i = 0; i < eyeTogglers.length; i++) {
    const eyeToggler = eyeTogglers[i];
    const passwordInput = passwordInputs[i];

    eyeToggler.addEventListener("click", () => {
        const isPasswordHidden =
            passwordInput.getAttribute("type") == "password";
        isPasswordHidden ? showPasswords(i) : hidePasswords(i);
    });
}

// offer check
const offerToggler = document.getElementById("offer-toggler");
const offerDisagreed = document.getElementById("offer-disagreed");
const offerAgreed = document.getElementById("offer-agreed");
let midTimer = null;

offerToggler.addEventListener("click", () => {
    if (offerToggler.checked) {
        clearTimeout(midTimer);
        midTimer = setTimeout(() => {
            offerDisagreed.classList.add("hidden");
            offerAgreed.classList.remove("hidden");
        }, 150);
    } else {
        clearTimeout(midTimer);
        midTimer = setTimeout(() => {
            offerAgreed.classList.add("hidden");
            offerDisagreed.classList.remove("hidden");
        }, 150);
    }
});
