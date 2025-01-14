<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Analisi Stringa</title>
</head>
<body>
    <form method="post" action="">
        <label for="inputString">Inserisci una stringa:</label>
        <input type="text" id="inputString" name="inputString" required>
        <br>
        <label for="charToCount">Inserisci un carattere da contare:</label>
        <input type="text" id="charToCount" name="charToCount" maxlength="1" required>
        <br>
        <input type="submit" value="Analizza">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $charToCount = $_POST['charToCount'];

        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $consonants = 0;
        $vowelCount = 0;
        $charCount = 0;
        $numericCount = 0;
        $charFrequency = [];

        for ($i = 0; $i < strlen($inputString); $i++) {
            $char = $inputString[$i];
            if (ctype_alpha($char)) {
                if (in_array($char, $vowels)) {
                    $vowelCount++;
                } else {
                    $consonants++;
                }
            } elseif (ctype_digit($char)) {
                $numericCount++;
            }

            if ($char == $charToCount) {
                $charCount++;
            }

            if (isset($charFrequency[$char])) {
                $charFrequency[$char]++;
            } else {
                $charFrequency[$char] = 1;
            }
        }

        $words = preg_split('/[\s,.!?]+/', $inputString, -1, PREG_SPLIT_NO_EMPTY);
        $wordCount = count($words);

        echo "<p>Numero di vocali: $vowelCount</p>";
        echo "<p>Numero di consonanti: $consonants</p>";
        echo "<p>Numero di caratteri '$charToCount': $charCount</p>";
        echo "<p>Numero di caratteri numerici: $numericCount</p>";
        echo "<p>Numero di parole: $wordCount</p>";
        echo "<p>Frequenza dei caratteri:</p>";
        echo "<ul>";
        foreach ($charFrequency as $char => $freq) {
            echo "<li>'$char': $freq</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>