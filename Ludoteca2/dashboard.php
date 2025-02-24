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
<body>
    <h1>Dashboard Ludoteca</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Genere</th>
                <th>Data di Rilascio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["title"] . "</td>
                            <td>" . $row["genre"] . "</td>
                            <td>" . $row["release_date"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nessun gioco trovato</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <p>.<a href="gameinsert.php"></a></p>
</body>
</html>