document.addEventListener("DOMContentLoaded", () => {
    console.log("Gym website loaded successfully!");

    // Show current date in footer if exists
    const footer = document.getElementById("footer-date");
    if (footer) {
        footer.textContent = new Date().toDateString();
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const rows = document.querySelectorAll('table tr');
    rows.forEach((row, i) => {
        if (i === 0) return;
        row.addEventListener('click', () => row.classList.toggle('highlight'));
    });
});



    function showSignup() {
        document.getElementById('weekly-section').style.display = 'none';
    document.getElementById('signup-section').style.display = 'block';
        }

    function showWeekly() {
        document.getElementById('signup-section').style.display = 'none';
    document.getElementById('weekly-section').style.display = 'block';
        }

    function toggleRegistrations() {
            const tableDiv = document.getElementById('registrations-table');
    tableDiv.style.display = (tableDiv.style.display === 'none') ? 'block' : 'none';
        }


