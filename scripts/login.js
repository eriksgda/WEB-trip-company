const login = () => {
    const loginButton = document.getElementById("login");
    const loginModal = document.getElementById("login-modal");
    const closeModal = document.getElementById("close-login-modal");
    const loginForm = document.getElementById("loginForm");

    loginButton.addEventListener("click", () => {
        loginModal.style.display = "block";
    });

    closeModal.addEventListener("click", () => {
        loginModal.style.display = "none";
        loginForm.reset();
    });
} 

const showPassword = () => {
    const passwordCheckbox = document.getElementById("showPassword");
    const password = document.getElementById("loginPassword");

    passwordCheckbox.addEventListener("change", () => {
        const type = passwordCheckbox.checked ? "text" : "password";
        password.type = type;
    });
} 

document.addEventListener("DOMContentLoaded", () => {
    login();
    showPassword();
})