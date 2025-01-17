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
        <input type="submit" value="Analizza">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];

        $vowels = 'aeiouAEIOU';
        $vowelCount = $consonants = $charCount = $numericCount = 0;
        $charFrequency = [];

        foreach (str_split($inputString) as $char) {
            if (ctype_alpha($char)) {
                if (strpos($vowels, $char) !== false) {
                    $vowelCount++;
                } else {
                    $consonants++;
                }
            } elseif (ctype_digit($char)) {
                $numericCount++;
            }

            $charFrequency[$char] = ($charFrequency[$char] ?? 0) + 1;
        }
        $charCount = 0;
        foreach($charFrequency as $char){
            if($char>1){
                $charCount++;
            }
        }

        $wordCount = str_word_count($inputString);

        echo "<p>Numero di vocali: $vowelCount</p>";
        echo "<p>Numero di consonanti: $consonants</p>";
        echo "<p>Numero di caratteri ripetuti: $charCount</p>";
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