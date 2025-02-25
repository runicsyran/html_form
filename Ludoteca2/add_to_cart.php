<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];

    $sql = "INSERT INTO Cart (title, price) VALUES ('$title', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Gioco aggiunto al carrello con successo";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>