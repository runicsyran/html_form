<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_michelangelocuccui";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT id, title, genre, release_date, price FROM Games";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giochi Disponibili in Ludoteca</title>
    <script src="js/scripts.js"></script>
    <script src="js/Popup.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .logout-button {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
<a href="endSession.php" class="logout-button">Logout</a>
<body>
    <h1>Elenco Giochi:</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Genere</th>
                <th>Data di Rilascio</th>
                <th>Prezzo</th>
                <th>Aggiungi al Carrello</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td><a href='infogiochi.php?id=" . $row["id"] . "'>" . $row["title"] . "</a></td>
                            <td>" . $row["genre"] . "</td>
                            <td>" . $row["release_date"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td><img src='img/cart.png' class='cart-icon' onclick=\"addToCart('" . $row["title"] . "', '" . $row["price"] . "')\"></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nessun gioco trovato</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <p><a href="dashboard.php">Ritorna alla dashboard</a></p>
    <p><a href="mycart.php">Vai al carrello</a></p>
</body>
</html>