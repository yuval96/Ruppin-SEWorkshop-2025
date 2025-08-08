# 🏋️‍♂️ Ruppin Gym Website

A PHP + MySQL powered gym scheduling and registration system, created as part of a web development project.  
The site includes **class schedules**, **online registration**, **contact form**, **BMI calculator**, a **gallery**, and **CSS/JS interactivity** across all pages.

## 📌 Features

- **Home Page**  
  - Displays **weekly and monthly class schedules**.
  - Register for classes directly online.
  - View existing registrations (full name, trainer, class type, date, and time).
  - Database-driven with MySQL.
  
- **Contact Page**  
  - Sends messages to email via PHP.
  
- **Services Page**  
  - Displays an embedded video with preload optimization.
  
- **Gallery Page**  
  - Image gallery with interactive JavaScript features.
  
- **About Page**  
  - Info about the gym and trainers with hover effects.

- **BMI Calculator Page**  
  - PHP form without database interaction.
  - Uses **arrays**, **loops**, **string functions**, and **calculations**.

## 🛠️ Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla JS)
- **Backend**: PHP 8+
- **Database**: MySQL (via ByetHost)
- **Hosting**: ByetHost free hosting
- **Responsive Design**: CSS Media Queries for mobile compatibility

## 📂 Project Structure

├── index.php # Home page (schedule + signup + registrations)
├── about.php # About the gym & trainers
├── contact.php # Contact form page
├── gallery.php # Gallery page
├── services.php # Services & video
├── logic.php # BMI calculator form
├── logic_result.php # BMI calculator result page
├── signup_process.php # Handles class registration
├── nav.php # Navigation menu
├── header.php # Site header
├── db.php # MySQL connection file
│
├── assets/
│ ├── css/style.css # Global styling
│ ├── js/home.js # Home page JS
│ ├── js/about.js # About page effects
│ ├── js/gallery.js # Gallery page JS
│ ├── js/services.js # Services page JS
│ ├── js/contact.js # Contact form JS
│ └── videos/ # Video files
