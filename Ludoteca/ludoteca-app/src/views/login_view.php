<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ludoteca</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../public/login.php" method="POST">
            <div class="form-group">
                <label for="username">Nome Utente:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Accedi</button>
        </form>
        <p>Non hai un account? <a href="../public/register.php">Registrati qui</a></p>
    </div>
</body>
</html>