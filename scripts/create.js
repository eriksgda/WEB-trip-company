const validateDates = (startsAt, endsAt, errorMessage) => {
    const start = new Date(startsAt.value);
    const end = new Date(endsAt.value);

    if (end <= start) {
        errorMessage.style.display = "block"; 
        return false; 
    }

    errorMessage.style.display = "none"; 
    return true; 
};

const verifyDates = () => {
    const startsAt = document.getElementById("starts_at");
    const endsAt = document.getElementById("ends_at");
    const errorMessage = document.getElementById("error-message");
    const form = document.getElementById("create-trip-form");

    endsAt.addEventListener("change", () => {
        validateDates(startsAt, endsAt, errorMessage);
    });

    form.addEventListener("submit", (event) => {
        if (!validateDates(startsAt, endsAt, errorMessage)) {
            event.preventDefault(); 
        }
    });
};

const createResponse = () => {
    const modal = document.getElementById("trip-response-modal");
    const closeButton = document.getElementById("close-trip-response-modal");


    if (modal && closeButton) {
    
        closeButton.addEventListener("click", () => {
            modal.style.display = "none";
        })
    }
}


document.addEventListener("DOMContentLoaded", () => {
    verifyDates();
    createResponse();
});