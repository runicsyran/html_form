<?php
//Sessioni in php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessioni test</title>
</head>
<body>

<?php
//Settare una variabile di sessione
$_SESSION['nome'] = 'Michelangelo';
$_SESSION['cognome'] = 'Cuccui';
echo 'Variabili di sessione settate.<br>';
?>

</body>
</html>