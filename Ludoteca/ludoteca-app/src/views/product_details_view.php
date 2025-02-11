<html>
<head>
    <title>Dettagli Prodotto</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Dettagli Prodotto</h1>
        <?php
        // Include the database connection
        require_once '../src/config/database.php';
        require_once '../src/models/Product.php';

        // Get the product ID from the URL
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Create a new Product object
            $product = new Product($db);

            // Fetch the product details
            $productDetails = $product->getProductById($productId);

            if ($productDetails) {
                echo "<h2>" . htmlspecialchars($productDetails['name']) . "</h2>";
                echo "<p>Prezzo: " . htmlspecialchars($productDetails['price']) . " €</p>";
                echo "<p>Dettagli: " . htmlspecialchars($productDetails['description']) . "</p>";
            } else {
                echo "<p>Prodotto non trovato.</p>";
            }
        } else {
            echo "<p>ID prodotto non specificato.</p>";
        }
        ?>
        <a href="products.php">Torna all'elenco prodotti</a>
    </div>
</body>
</html>