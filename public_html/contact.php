<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact - Ruppin Gym</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/contact.js" defer></script>
</head>
<body class="backPic">

<header>
    <h1>Contact Our Team</h1>
</header>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>


<main class="contact-section">
    <form class="contact-form" 
          action="mailto:yuval1452@gmail.com" 
          method="post" 
          enctype="text/plain">
        <h2>Get in Touch</h2>

        <input type="text" name="Name" placeholder="Your Name" required>
        <input type="email" name="Email" placeholder="Your Email" required>
        <input type="tel" name="Phone" placeholder="Your Phone Number" required>
        
        <label>Preferred Date:</label>
        <input type="date" name="Preferred Date" required>

        <label>Preferred Time:</label>
        <input type="time" name="Preferred Time" required>

        <label>Pick Your Favorite Color:</label>
        <input type="color" name="Favorite Color">

        <label>Training Intensity (1–10):</label>
        <input type="range" name="Intensity" min="1" max="10">

        <label>Your Age:</label>
        <input type="number" name="Age" min="10" max="99">

        <label>Your Website (optional):</label>
        <input type="url" name="Website">

        <label>Choose Class:</label>
        <select name="Class">
            <option value="Yoga">Yoga</option>
            <option value="HIIT">HIIT</option>
            <option value="Strength">Strength Training</option>
            <option value="Pilates">Pilates</option>
        </select>

        <label>Preferred Contact Method:</label>
        <datalist id="methods">
            <option value="Email">
            <option value="Phone">
            <option value="WhatsApp">
            <option value="SMS">
        </datalist>
        <input type="text" name="Contact Method" list="methods">

        <label>Additional Comments:</label>
        <textarea name="Comments" rows="4"></textarea>

        <label>
            <input type="checkbox" name="Subscribe" value="Yes">
            Subscribe to our newsletter
        </label>

        <button type="submit">Send</button>
    </form>
</main>

</body>
</html>
