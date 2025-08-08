<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery - Ruppin Gym</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/gallery.js" defer></script>
</head>

<style>
  #galleryTitle { color:#ff6f00; font-size:1.9rem; }
  .galleryNote { color:#444; }
</style>

<body>
    <header>
        <h1>Photo Gallery</h1>
    </header>
    
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

    <main>
        <h2 id="galleryTitle" >Our Gym in Action</h2>
        <p>Take a look at our training facilities and classes.</p>
        <p class="galleryNote">Tap an image to zoom.</p>
        <div class="gallery">
            <img src="assets/photos/pexels-anush-1229356.jpg" alt="Gym Photo 1" width="300">
            <img src="assets/photos/pexels-leonardho-1552249.jpg" alt="Gym Photo 2" width="300">
            <img src="assets/photos/pexels-leonardho-1552252.jpg" alt="Gym Photo 3" width="300">
            <img src="assets/photos/pexels-victorfreitas-841130.jpg" alt="Gym Photo 4" width="300">
            <img src="assets/photos/pexels-olly-903171.jpg" alt="Gym Photo 5" width="300">
            <img src="assets/photos/pexels-panther-1547248.jpg" alt="Gym Photo 6" width="300">
        </div>
    </main>


    <footer>
        <p>© 2025 Ruppin Gym</p>
    </footer>
</body>
</html>
