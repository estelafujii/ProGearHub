<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $product = mysqli_real_escape_string($connection, $_POST['product_name']);
    $name = mysqli_real_escape_string($connection, $_POST['Customer_name']);
    $email = mysqli_real_escape_string($connection, $_POST['Customer_email']);
    $address = mysqli_real_escape_string($connection, $_POST['Address']);
    $quantity = intval($_POST['Quantity']);

    if (empty($product) || empty($name) || empty($email) || empty($address) || $quantity < 1) {
        die("Please fill in all fields correctly.");
    }

    $sql = "INSERT INTO orders (Product_name, Quantity, Customer_name, Customer_email, Address) 
            VALUES ('$product', $quantity, '$name', '$email', '$address')";

    if (mysqli_query($connection, $sql)) {
        echo "<h2>Order placed successfully!</h2>";
        echo "<p>Thank you, $name. Your order for $quantity unit(s) of <strong>$product</strong> has been received.</p>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    die("Invalid request method.");
}
?>
