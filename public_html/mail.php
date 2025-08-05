<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "yuval1452@gmail.com";
    $subject = "New Gym Booking Request";

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $training = htmlspecialchars($_POST['training']);
    $day = htmlspecialchars($_POST['day']);
    $time = htmlspecialchars($_POST['time']);

    $message = "
    New booking received:
    
    Name: $name
    Email: $email
    Training: $training
    Day: $day
    Time: $time
    ";

    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Thank you, $name! Your booking request was sent successfully.</h2>";
    } else {
        echo "<h2>Sorry, something went wrong. Please try again later.</h2>";
    }
}
?>
