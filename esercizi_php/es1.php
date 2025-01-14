<?php
$clienti = [
    ["nome" => "Mario", "cognome" => "Rossi", "eta" => 30, "citta" => "Roma", "indirizzo" => "Via Roma 1", "cap" => 12345],
    ["nome" => "Luigi", "cognome" => "Verdi", "eta" => 25, "citta" => "Milano", "indirizzo" => "Via Milano 2", "cap" => 54321],
    ["nome" => "Giovanni", "cognome" => "Bianchi", "eta" => 40, "citta" => "Napoli", "indirizzo" => "Via Napoli 3", "cap" => 67890],
    ["nome" => "Paolo", "cognome" => "Neri", "eta" => 35, "citta" => "Torino", "indirizzo" => "Via Torino 4", "cap" => 98765],
    ["nome" => "Francesco", "cognome" => "Gialli", "eta" => 28, "citta" => "Firenze", "indirizzo" => "Via Firenze 5", "cap" => 11223]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <?php foreach($clienti[0] as $key => $value): ?>
                <th><?php echo $key ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($clienti as $cliente): ?>
            <tr>
                <?php foreach($cliente as $value): ?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>