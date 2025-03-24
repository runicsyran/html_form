<?php
session_start();
?>
<?php
$total = 0;
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il Mio Carrello</title>
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
    <h1>Il Mio Carrello</h1>
    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $item) {
                    echo "<tr>
                            <td>" . $item['title'] . "</td>
                            <td>" . $item['price'] . "</td>
                          </tr>";
                }
                echo "<tr>
                        <td><strong>Costo Totale:</strong></td>
                        <td><strong>" . $total . "</strong></td>
                      </tr>";
            } else {
                echo "<tr><td colspan='2'>Il carrello è vuoto</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <p><a href="dashboard.php">Torna alla dashboard</a></p>
    <p><a href="listagiochi.php">Vai alla lista dei giochi</a></p>
</body>
</html>