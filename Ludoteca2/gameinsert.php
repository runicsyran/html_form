<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Gioco</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .logout-button {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
<a href="endSession.php" class="logout-button">Logout</a>
<body>
    <h1>Inserisci Nuovo Gioco</h1>  
    <form action="gameinsert.php" method="post" enctype="multipart/form-data">
        <label for="cover">Cover:</label>
        <input type="file" name="immagini" id="immagini" required><br><br>

        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="publisher">Casa di Produzione:</label>
        <input type="text" id="publisher" name="publisher" required><br><br>

        <label for="release_date">Data di Rilascio:</label>
        <input type="date" id="release_date" name="release_date" required><br><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required><br><br>

        <label for="platform">Piattaforma:</label>
        <input type="text" id="platform" name="platform" required><br><br>

        <label for="price">Prezzo:</label>
        <input type="number" id="price" name="price" required><br><br>

        <input type="submit" value="Inserisci">
        <p><a href="dashboard.php">Ritorna alla dashboard</a></p>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my_michelangelocuccui";

        // Crea la connessione al database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Controlla connessione al database
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Prendi i dati dal form
        $title = $_POST['title'];
        $pubb = ($_POST['publisher']);
        $reld = $_POST['release_date'];
        $genre = $_POST['genre'];
        $plat = $_POST['platform'];
        $price = $_POST['price'];

       /*// inserimento immagine tra le informazioni del gioco
        if(isset($_POST['title'])){
            if($conn->query("select * from Games where title = '".$_POST["title"]."'")->fetch_assoc()){
                echo "non puoi inserire un'altro gioco con questo nome";
                ?><meta http-equiv="refresh" content="5; url=gameinsert"><?php
                exit;
            }
            $dir = "img/".str_replace(" ", "-", $_POST["title"]);
            mkdir($dir, 0755);
            foreach($_FILES["immagini"]["tmp_name"] as $index => $tmp_name) {
                $file_name = str_replace(" ", "-", $_FILES["immagini"]["name"][$index]);
                $destination = $dir . "/" . $file_name;
                move_uploaded_file($tmp_name, $destination);
            }
        }*/

        // Inserisci i dati nel database
        $sql = "INSERT INTO Games (title, publisher, release_date, genre, platform, price, image) 
        VALUES ('$title', '$pubb', '$reld', '$genre', '$plat', '$price', '$destination')";


        if ($conn->query($sql) === TRUE) {
            echo "Gioco inserito con successo";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>