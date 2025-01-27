<!DOCTYPE html>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['cognome'] = $_POST['cognome'];
    $_SESSION['nascita'] = $_POST['nascita'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['nazione'] = $_POST['nazione'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gara di Scii</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" id="cognome">
        <label for="nascita">Data di Nascita:</label>
        <input type="date" name="nascita" id="nascita">
        <label for="gender">Seleziona il tuo sesso:</label>
        <select>
            <option value="m">Maschio</option>
            <option value="f">Femmina</option>
        </select>
        <label for="nazione">Nazionalità:</label>
        <input type="text" name="nazione" id="nazione">
        <input type="submit" value="Invia">
    </form>
    <?php if (!empty($_SESSION)): ?>
        <h2>Dati inviati:</h2>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data di Nascita</th>
                <th>Sesso</th>
                <th>Nazionalità</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($_SESSION['nome']); ?></td>
                <td><?php echo htmlspecialchars($_SESSION['cognome']); ?></td>
                <td><?php echo htmlspecialchars($_SESSION['nascita']); ?></td>
                <td><?php echo htmlspecialchars($_SESSION['gender']); ?></td>
                <td><?php echo htmlspecialchars($_SESSION['nazione']); ?></td>
            </tr>
        </table>
    <?php endif; ?>    
</body>
</html>