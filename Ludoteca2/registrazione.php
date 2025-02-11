<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>
<body>
    <h2>Registrazione</h2>
    <form action="registrazione.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Registrati">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "users";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $user = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $sql = "INSERT INTO utenti (username, password, email) VALUES ('$user', '$pass', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Registrazione avvenuta con successo";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>