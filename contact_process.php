<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all fields.");
    }

    $sql = "INSERT INTO enquiries (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($connection, $sql)) {
        echo "<h2>Message submitted successfully!</h2>";
        echo "<p>Thank you, $name. We have received your message.</p>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
