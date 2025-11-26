<?php
$connection = mysqli_connect(
    "db",         
    "progearhub", 
    "password",   
    "Progearhub"  
);

// Verifica conexão
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
$servername = "localhost";
$username = "root"; // usuário padrão XAMPP
$password = "";     // senha padrão XAMPP
$dbname = "ProGearHub";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checar conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
