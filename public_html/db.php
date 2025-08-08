
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "sql210.byethost22.com"; 
$username   = "b22_39630884";
$password   = "156245";
$dbname     = "b22_39630884_gymDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<h2>Database Connection Failed:</h2> " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    if ($name && $email && $message) {
        $sql = "INSERT INTO contact_messages (name, email, message)
                VALUES ('$name', '$email', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo "<h2>✅ Message saved successfully!</h2>";
        } else {
            echo "<h2>❌ Error inserting message:</h2> " . $conn->error;
        }
    } else {
        echo "<h2>⚠️ All fields are required.</h2>";
    }
}

// Display messages
$result = $conn->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC");

if ($result && $result->num_rows > 0) {
    echo "<h2>Contact Messages</h2>";
    echo "<table border='1' cellpadding='8'>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Submitted At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>{$row['submitted_at']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No messages found.</p>";
}

$conn->close();
?>
