<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Benvenuto, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Questa è la tua dashboard personale.</p>
        
        <h2>Link Utili:</h2>
        <ul>
            <li><a href="products.php">Elenchi Prodotti</a></li>
            <li><a href="invoices.php">Elenchi Fatture</a></li>
        </ul>

        <h2>Riepilogo Utente:</h2>
        <p>Nome: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
    </div>
</body>
</html>