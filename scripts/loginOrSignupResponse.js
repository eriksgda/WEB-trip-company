const loginAndResponse = () => {
    const modal = document.getElementById("login-or-signup-response-modal");
    const closeButton = document.getElementById("close-login-or-signup-response-modal");

    closeButton.addEventListener("click", () => {
        modal.style.display = "none";
    })
}

document.addEventListener("DOMContentLoaded", () => {
    loginAndResponse();
});