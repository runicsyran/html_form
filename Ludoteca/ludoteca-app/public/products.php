<?php
require_once '../src/config/database.php';
require_once '../src/controllers/ProductController.php';

$productController = new ProductController();
$products = $productController->getAllProducts();

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Elenco Prodotti</title>
</head>
<body>
    <div class="container">
        <h1>Elenco Prodotti</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome Prodotto</th>
                    <th>Prezzo</th>
                    <th>Dettaglio Prodotto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?> €</td>
                        <td><a href="product_details.php?id=<?php echo $product['id']; ?>">Dettagli</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="dashboard.php">Torna al Cruscotto</a>
    </div>
</body>
</html>