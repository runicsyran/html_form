<?php
require('fpdf\fpdf.php'); // Includi la libreria FPDF

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_michelangelocuccui";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottieni l'ID del gioco dalla query string
$game_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Recupera le informazioni del gioco dal database
$sql = "SELECT * FROM Games WHERE id = $game_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $game = $result->fetch_assoc();
} else {
    die("Gioco non trovato.");
}

$conn->close();

// Funzione per generare il PDF
if (isset($_POST['generate_pdf'])) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Titolo
    $pdf->Cell(0, 10, 'Informazioni sul Gioco', 0, 1, 'C');
    $pdf->Ln(10);

    // Informazioni del gioco
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, 'Titolo:', 0, 0);
    $pdf->Cell(0, 10, $game['title'], 0, 1);

    $pdf->Cell(50, 10, 'Casa di Produzione:', 0, 0);
    $pdf->Cell(0, 10, $game['publisher'], 0, 1);

    $pdf->Cell(50, 10, 'Data di Rilascio:', 0, 0);
    $pdf->Cell(0, 10, $game['release_date'], 0, 1);

    $pdf->Cell(50, 10, 'Genere:', 0, 0);
    $pdf->Cell(0, 10, $game['genre'], 0, 1);

    $pdf->Cell(50, 10, 'Piattaforma:', 0, 0);
    $pdf->Cell(0, 10, $game['platform'], 0, 1);

    $pdf->Cell(50, 10, 'Prezzo:', 0, 0);
    $pdf->Cell(0, 10, '€' . $game['price'], 0, 1);

    // Output del PDF
    $pdf->Output('I', 'Informazioni_Gioco.pdf');
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informazioni Gioco</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Informazioni sul Gioco</h1>
    <form method="post">
        <label><strong>Titolo:</strong></label>
        <input type="text" name="title" value="<?php echo $game['title']; ?>" readonly><br>

        <label><strong>Casa di Produzione:</strong></label>
        <input type="text" name="publisher" value="<?php echo $game['publisher']; ?>" readonly><br>

        <label><strong>Data di Rilascio:</strong></label>
        <input type="text" name="release_date" value="<?php echo $game['release_date']; ?>" readonly><br>

        <label><strong>Genere:</strong></label>
        <input type="text" name="genre" value="<?php echo $game['genre']; ?>" readonly><br>

        <label><strong>Piattaforma:</strong></label>
        <input type="text" name="platform" value="<?php echo $game['platform']; ?>" readonly><br>

        <label><strong>Prezzo:</strong></label>
        <input type="text" name="price" value="€<?php echo $game['price']; ?>" readonly><br>

        <!-- Tasto per la generazione del PDF -->
        <button type="submit" name="generate_pdf">Scarica in PDF</button>
    </form>

    <p><a href="listagiochi.php">Torna alla lista dei giochi</a></p>
</body>
</html>