<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Utente</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Registrazione Utente</h2>
        <form action="../public/register.php" method="POST">
            <div class="form-group">
                <label for="username">Nome Utente:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Registrati</button>
            </div>
        </form>
        <p>Hai già un account? <a href="../public/login.php">Accedi qui</a></p>
    </div>
</body>
</html>