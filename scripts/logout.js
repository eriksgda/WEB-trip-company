const logout = () => {
    const profile = document.getElementById("profile");
    const logoutModal = document.getElementById("logout-modal");
    const closeModal = document.getElementById("close-logout-modal");
    const cancel = logoutModal.querySelector(".cancel");

    profile.addEventListener("click", () => {
        logoutModal.style.display = "block";
    });

    closeModal.addEventListener("click", () => {
        logoutModal.style.display = "none";
    });
    
    cancel.addEventListener("click", (e) => {
        e.preventDefault();
        logoutModal.style.display = "none";
    });
} 

document.addEventListener("DOMContentLoaded", () => {
    logout();
})