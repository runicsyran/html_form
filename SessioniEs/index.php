<!DOCTYPE html>
<?php
session_start();
var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $atleta = [
        'nome' => $_POST['nome'],
        'cognome' => $_POST['cognome'],
        'nascita' => $_POST['nascita'],
        'gender' => $_POST['gender'],
        'nazione' => $_POST['nazione'],
        'specialita' => $_POST['specialita']
    ];
    $_SESSION['atleti'][] = $atleta;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gara di Scii</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #01579b;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2, h3 {
            color: #0277bd;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #b0bec5;
            border-radius: 5px;
        }
        button {
            background-color: #0288d1;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0277bd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #b0bec5;
            text-align: left;
        }
        th {
            background-color: #0288d1;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #e1f5fe;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome"><br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" id="cognome"><br><br>
        <label for="nascita">Data di Nascita:</label>
        <input type="date" name="nascita" id="nascita"><br><br>
        <label for="gender">Seleziona il tuo sesso:</label>
        <select>
            <option>Maschio</option>
            <option>Femmina</option>
        </select><br><br>
        <label for="nazione">Nazionalità:</label>
        <input type="text" name="nazione" id="nazione"><br><br>
        <label for="specilità">Specialità:</label>
        <select name="specialita" id="specialita" required>
            <option value="discesa libera">Discesa Libera</option>
            <option value="super-G">Super-G</option>
            <option value="slalom gigante">Slalom Gigante</option>
            <option value="slalom speciale">Slalom Speciale</option>
            <option value="combinata">Combinata</option>
        </select><br><br>
        <input type="submit" value="Invia">
    </form>
    <?php if (!empty($_SESSION['atleti'])): ?>
        <h2>Atleti Iscritti:</h2>
        <?php
        $specialita = ['discesa libera', 'super-G', 'slalom gigante', 'slalom speciale', 'combinata'];
        foreach ($specialita as $spec) {
            echo "<h3>" . ucfirst($spec) . "</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Data di Nascita</th>
                        <th>Sesso</th>
                        <th>Nazionalità</th>
                    </tr>";
            foreach ($_SESSION['atleti'] as $atleta) {
                if ($atleta['specialita'] == $spec) {
                    echo "<tr>
                            <td>" . htmlspecialchars($atleta['nome']) . "</td>
                            <td>" . htmlspecialchars($atleta['cognome']) . "</td>
                            <td>" . htmlspecialchars($atleta['nascita']) . "</td>
                            <td>" . htmlspecialchars($atleta['gender']) . "</td>
                            <td>" . htmlspecialchars($atleta['nazione']) . "</td>
                          </tr>";
                }
            }
            echo "</table>";
        }
        ?>
    <?php endif; ?>   
</body>
</html>