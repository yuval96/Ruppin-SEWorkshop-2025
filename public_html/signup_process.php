<?php
$servername = "sql210.byethost22.com";
$username   = "b22_39630884";
$password   = "156245";
$dbname     = "b22_39630884_gymDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name   = $conn->real_escape_string($_POST['full_name']);
    $phone  = $conn->real_escape_string($_POST['phone']);
    $class  = intval($_POST['class_id']);

    // Duplicate check
    $dup_check = $conn->query("SELECT 1 FROM class_registrations 
                               WHERE phone='$phone' AND class_id=$class");
    if ($dup_check && $dup_check->num_rows > 0) {
        header("Location: index.php?signup=duplicate");
        exit;
    }

    // Capacity check
    $count_check = $conn->query("SELECT COUNT(cr.reg_id) as total, ac.max_students 
                                 FROM available_classes ac
                                 LEFT JOIN class_registrations cr ON ac.class_id = cr.class_id
                                 WHERE ac.class_id=$class
                                 GROUP BY ac.max_students");
    $data = $count_check->fetch_assoc();
    $current = $data ? $data['total'] : 0;
    $max = $data ? $data['max_students'] : 0;

    if ($current < $max) {
        $insert = "INSERT INTO class_registrations (full_name, phone, class_id) 
                   VALUES ('$name','$phone',$class)";
        if ($conn->query($insert) === TRUE) {
            header("Location: index.php?signup=success");
        } else {
            header("Location: index.php?signup=error");
        }
    } else {
        header("Location: index.php?signup=full&max={$max}");
    }
    exit;
}
$conn->close();
?>
