<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Fatture</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Elenco Fatture</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Fattura</th>
                    <th>Data</th>
                    <th>Importo</th>
                    <th>Dettagli</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include_once '../config/database.php';
                $db = new Database();
                $conn = $db->getConnection();

                // Fetch invoices for the logged-in user
                session_start();
                $userId = $_SESSION['user_id']; // Assuming user ID is stored in session
                $query = "SELECT * FROM invoices WHERE user_id = :user_id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':user_id', $userId);
                $stmt->execute();

                // Display invoices
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['amount']) . " €</td>";
                    echo "<td><a href='invoice_details.php?id=" . htmlspecialchars($row['id']) . "'>Dettagli</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="dashboard.php">Torna al Cruscotto</a>
    </div>
</body>
</html>