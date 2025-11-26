<?php
// Inclui a conexão com o banco
include 'database.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validação simples
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all fields.");
    }

    // Insere os dados na tabela correta (enquiries)
    $sql = "INSERT INTO enquiries (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    if (mysqli_query($connection, $sql)) {
        echo "<h2>Message submitted successfully!</h2>";
        echo "<p>Thank you, $name. We have received your message.</p>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Fecha a conexão
    mysqli_close($connection);
}
?>
