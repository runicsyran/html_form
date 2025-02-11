<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Prodotti</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Elenco Prodotti</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="invoices.php">Elenco Fatture</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome Prodotto</th>
                    <th>Prezzo</th>
                    <th>Dettaglio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the ProductController to fetch products
                require_once '../src/controllers/ProductController.php';
                $productController = new ProductController();
                $products = $productController->getAllProducts();

                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($product['price']) . " €</td>";
                    echo "<td><a href='product_details.php?id=" . htmlspecialchars($product['id']) . "'>Dettagli</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2023 Ludoteca. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>