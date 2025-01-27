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


<?php
//Visualizzare le variabili di sessione
echo 'Variabili di sessione:<br>';
echo $_SESSION['nome'].'<br>';
echo $_SESSION['cognome'].'<br>';
?>

<?php
//Eliminare una variabile di sessione
unset($_SESSION['nome']);
echo 'Variabile di sessione eliminata.<br>';
?>


<?php
//Eliminare tutte le variabili di sessione
session_unset();
echo 'Variabili di sessione eliminate.<br>';
?>

<?php
//Distruggere la sessione
session_destroy();
echo 'Sessione distrutta.<br>';
?>
</body>
</html>