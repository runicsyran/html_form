<?php
session_start();


$invoiceController = new InvoiceController();
$userId = $_SESSION['user_id'] ?? null;

if (!$userId) {
    header('Location: login.php');
    exit();
}

$invoices = $invoiceController->getInvoicesByUserId($userId);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Elenco Fatture</title>
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
                <?php if (empty($invoices)): ?>
                    <tr>
                        <td colspan="4">Nessuna fattura trovata.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($invoice['id']); ?></td>
                            <td><?php echo htmlspecialchars($invoice['date']); ?></td>
                            <td><?php echo htmlspecialchars($invoice['amount']); ?> €</td>
                            <td><a href="invoice_details.php?id=<?php echo htmlspecialchars($invoice['id']); ?>">Dettagli</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="dashboard.php">Torna al Cruscotto</a>
    </div>
</body>
</html>