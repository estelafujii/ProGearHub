<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escapa caracteres especiais
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $product = mysqli_real_escape_string($connection, $_POST['product_name']);
    $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);

    if (empty($name) || empty($email) || empty($product) || empty($quantity) || empty($price)) {
        die("Please fill in all fields.");
    }

    $sql = "INSERT INTO orders (customer_name, email, product_name, quantity, price)
            VALUES ('$name', '$email', '$product', '$quantity', '$price')";

    if (mysqli_query($connection, $sql)) {
        echo "<h2>Order placed successfully!</h2>";
        echo "<p>Thank you, $name. Your order for $quantity unit(s) of <strong>$product</strong> has been received.</p>";
        echo "<p><a href='kids.html'>Back to Kids Products</a></p>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
