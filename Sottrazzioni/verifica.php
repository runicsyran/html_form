<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errori = [];

    // Funzione per controllare se un campo è vuoto
    function campoVuoto($campo, $nomeCampo) {
        if (empty($campo)) {
            return "Il campo '$nomeCampo' è obbligatorio.";
        }
        return null;
    }

    // Funzione per controllare se un campo è numerico
    function campoNumerico($campo, $nomeCampo) {
        if (!empty($campo) && !is_numeric($campo)) {
            return "Il campo '$nomeCampo' deve essere un numero.";
        }
        return null;
    }

    // Funzione per controllare se il sottraendo è maggiore del minuendo
    function sottraendoMaggioreMinuendo($minuendo, $sottraendo) {
        if ($sottraendo > $minuendo) {
            return "Il campo 'sottraendo' non può essere maggiore del campo 'minuendo'.";
        }
        return null;
    }

    // Funzione per controllare se la differenza è corretta
    function differenzaCorretta($minuendo, $sottraendo, $differenza) {
        if (($minuendo - $sottraendo) != $differenza) {
            return "Il valore della 'differenza' non è corretto.";
        }
        return null;
    }

    // Esegui i controlli
    $errori[] = campoVuoto($_POST["minuendo"], "minuendo");
    $errori[] = campoVuoto($_POST["sottraendo"], "sottraendo");
    $errori[] = campoVuoto($_POST["differenza"], "differenza");

    $errori[] = campoNumerico($_POST["minuendo"], "minuendo");
    $errori[] = campoNumerico($_POST["sottraendo"], "sottraendo");
    $errori[] = campoNumerico($_POST["differenza"], "differenza");

    if (empty(array_filter($errori))) {
        $errori[] = sottraendoMaggioreMinuendo($_POST["minuendo"], $_POST["sottraendo"]);
        $errori[] = differenzaCorretta($_POST["minuendo"], $_POST["sottraendo"], $_POST["differenza"]);
    }

    // Filtra gli errori nulli
    $errori = array_filter($errori);

    // Mostra errori
    if (!empty($errori)) {
        foreach ($errori as $errore) {
            echo "<p style='color: red;'>$errore</p>";
        }
    } else {
        echo "<p style='color: green;'>Tutti i campi sono corretti.</p>";
    }
}
?>