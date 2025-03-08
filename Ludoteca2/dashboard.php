<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_michelangelocuccui";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, genre, release_date FROM Games";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ludoteca</title>
</head>
<style>
    .logout-button {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
<a href="logout.php" class="logout-button">Logout</a>
<body>
    <h1>Dashboard Ludoteca</h1>
    <p>Benvenuto nella Dashboard della Ludoteca. Qui puoi gestire i tuoi giochi e visualizzare il tuo carrello.</p>
    <p><a href="listagiochi.php">Lista Giochi</a> | <a href="mycart.php">Il Mio Carrello</a></p>
    <p><a href="gameinsert.php">.</a></p>
</body>
</html>