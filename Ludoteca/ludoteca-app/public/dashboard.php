<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
require_once '../src/config/database.php';

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Benvenuto <?php echo htmlspecialchars($user['username']); ?></h1>
        <nav>
            <ul>
                <li><a href="products.php">Elenco Prodotti</a></li>
                <li><a href="invoices.php">Elenco Fatture</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>