document.addEventListener("DOMContentLoaded", () => {
    console.log("Gym website loaded successfully!");

    // Show current date in footer if exists
    const footer = document.getElementById("footer-date");
    if (footer) {
        footer.textContent = new Date().toDateString();
    }
});
