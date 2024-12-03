const signup = () => {
    const signupButton = document.getElementById("signup");
    const signupModal = document.getElementById("signup-modal");
    const closeModal = document.getElementById("close-signup-modal");
    const errorMessage = document.getElementById("error-message");
    const signupForm = document.getElementById("signupForm");

    signupButton.addEventListener("click", () => {
        signupModal.style.display = "block";
    });

    closeModal.addEventListener("click", () => {
        signupModal.style.display = "none";
        errorMessage.style.display = "none";
        signupForm.reset();
    });

}

const showPasswords = () => {
    const passwordCheckbox = document.getElementById("showPasswords");
    const password = document.getElementById("signupPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    passwordCheckbox.addEventListener("change", () => {
        const type = passwordCheckbox.checked ? "text" : "password";
        password.type = type;
        confirmPassword.type = type;
    });
} 

const verifyPasswords = () => {
    const signupForm = document.getElementById("signupForm");
    const errorMessage = document.getElementById("error-message");
    const password = document.getElementById("signupPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    signupForm.addEventListener("submit", (e) => {
        if (password.value !== confirmPassword.value) {
            e.preventDefault(); 
            errorMessage.style.display = "block";
        } else {
            errorMessage.style.display = "none";
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    signup();
    showPasswords();
    verifyPasswords();
});