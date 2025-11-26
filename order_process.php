<?php
include 'database.php';

// Recebe os dados do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$product = $_POST['product_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Validação simples
if (empty($name) || empty($email) || empty($product) || empty($quantity) || empty($price)) {
    die("Please fill in all fields.");
}

// Insere no banco
$sql = "INSERT INTO orders (customer_name, email, product_name, quantity, price)
        VALUES ('$name', '$email', '$product', '$quantity', '$price')";

if (mysqli_query($connection, $sql)) {
    echo "<h2>Order placed successfully!</h2>";
    echo "<p>Thank you, $name. Your order for $quantity unit(s) of <strong>$product</strong> has been received.</p>";
} else {
    echo "Error: " . mysqli_error($connection);
}
?>
