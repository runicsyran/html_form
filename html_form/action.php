<style>
    /* Stile globale per il body */
    body {
        font-family: Arial, sans-serif;
        background-image: url(./asset/img/universe.jpg);
        background-size: cover;
        color: #fff;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
        text-align: center;
    }

    /* Stile per la tabella */
    .styled-table {
        width: 70%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #2c2f3e;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    /* Stile per le celle della tabella (header e dati) */
    .styled-table th, .styled-table td {
        padding: 12px 20px;
        text-align: left;
        color: #fff;
    }

    /* Stile per l'intestazione della tabella */
    .styled-table th {
        background-color: #2c2f3e;
        color: #2c2f3e;
        font-size: 18px;
    }

    /* Stile per le righe della tabella */
    .styled-table tr:nth-child(even) {
        background-color: #3b3f51;
    }

    .styled-table tr:nth-child(odd) {
        background-color: #323647;
    }

    /* Effetto hover per le righe della tabella */
    .styled-table tr:hover {
        background-color: #ad45ec;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Stile per i bordi della tabella */
    .styled-table td {
        border-bottom: 1px solid #555;
    }

    /* Stile per l'intestazione */
    h1 {
        color: #00ffff;
        font-size: 2rem;
        margin-bottom: 20px;
    }
</style>

<?php
// Verifica se i dati sono stati inviati tramite POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati dal form
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $surname = isset($_POST['surn']) ? htmlspecialchars($_POST['surn']) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $residence = isset($_POST['res']) ? htmlspecialchars($_POST['res']) : '';

    // Mostra i dati in una tabella
    echo "<h1>Form inviato con successo</h1>";
    echo "<table border='1' cellpadding='10' cellspacing='0' style='width: 50%; margin: 20px auto; text-align: left; border-collapse: collapse;'>";
    echo "<tr><th>Campo</th><th>Valore</th></tr>";
    echo "<tr><td><strong>Name</strong></td><td>" . $name . "</td></tr>";
    echo "<tr><td><strong>Surname</strong></td><td>" . $surname . "</td></tr>";
    echo "<tr><td><strong>Gender</strong></td><td>" . $gender . "</td></tr>";
    echo "<tr><td><strong>City</strong></td><td>" . $city . "</td></tr>";
    echo "<tr><td><strong>Residence Address</strong></td><td>" . $residence . "</td></tr>";
    echo "</table>";
} else {
    echo "<p>Form non inviato correttamente</p>";
}