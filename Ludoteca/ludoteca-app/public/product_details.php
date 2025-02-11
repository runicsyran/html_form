<?php
session_start();
require_once '../src/config/database.php';
require_once '../src/controllers/ProductController.php';

$productController = new ProductController();
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = $productController->getProductById($productId);

if (!$product) {
    echo "Prodotto non trovato.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dettagli Prodotto</title>
</head>
<body>
    <div class="container">
        <h1>Dettagli Prodotto</h1>
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
        <p><strong>Prezzo:</strong> €<?php echo htmlspecialchars($product['price']); ?></p>
        <p><strong>Dettaglio:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
        <a href="products.php">Torna all'elenco prodotti</a>
    </div>
</body>
</html>