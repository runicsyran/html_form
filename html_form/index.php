<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FormHTML</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url("./asset/img/blackhole-wallpaper.webp"); /* Colore di sfondo della pagina */
                background-size: cover;
                margin: 0;
                padding: 20px;
            }
            h1 {
                color: #00ffff; /* Colore del titolo */
                text-align: center;
            }
            form {
                background: #9008e2; /* Sfondo del form */
                padding: 20px; /* Spaziatura interna */
                border-radius: 8px; /* Angoli arrotondati */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombra del form */
                max-width: 400px; /* Larghezza massima del form */
                margin: 0 auto; /* Centrato orizzontalmente */
            }
            label {
                display: block; /* Ogni etichetta su una nuova riga */
                margin-bottom: 8px; /* Spaziatura sotto le etichette */
                font-weight: bold; /* Grassetto per le etichette */
            }
            input[type="text"],
            input[type="number"] {
                width: 90%; /* Larghezza al 100% */
                padding: 10px; /* Spaziatura interna */
                margin-bottom: 15px; /* Spaziatura sotto i campi */
                border: 1px solid #ccc; /* Bordo grigio chiaro */
                border-radius: 4px; /* Angoli arrotondati */
            }
            input[type="submit"] {
                background-color: #600499; /* Colore di sfondo del pulsante */
                color: white; /* Colore del testo */
                border: none; /* Nessun bordo */
                padding: 10px 15px; /* Spaziatura interna */
                border-radius: 4px; /* Angoli arrotondati */
                cursor: pointer; /* Cambia il cursore su hover */
                font-size: 16px; /* Dimensione del testo */
            }
            input[type="submit"]:hover {
                background-color: #ad45ec; /* Colore al passaggio del mouse */
            }
            select {
                margin-bottom: 10px;
                margin-top: 10px;
                font-family: cursive, sans-serif;
                outline: 0;
                background: #ad45ec;
                color: #fff;
                border: 1px solid crimson;
                padding: 4px;
                border-radius: 9px;
            }
            .error {
                color: red;
                font-size: 12px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <form action=".\action.php" method="post" onsubmit="return validateForm(event)">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" onfocus="clearError('name')" onblur="validateField('name')"><br>
            <div id="name-error" class="error"></div>

            <label for="surn">Surname:</label><br>
            <input type="text" id="surn" name="surn" onfocus="clearError('surn')" onblur="validateField('surn')"><br>
            <div id="surn-error" class="error"></div>

            <label for="gender">Gender:</label>
            <select name="gender" id="gender" onfocus="clearError('gender')" onblur="validateField('gender')">
                <option value="select">Select a gender</option>
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>
                <option value="UNDEFINED">UNDEFINED</option>
                <option value="ATTACK HELICOPTER">ATTACK HELICOPTER</option>
            </select>
            <br>
            <div id="gender-error" class="error"></div>

            <label for="dataPicker">dataPicker:</label><br>
            <input type="text" name="data" id="dataPicker"  onblur="validateField('dataPicker')"><br>
            <div id="dataPicker-error" class="error"></div>

            <label for="city">Città:</label><br>
            <input type="text" id="city" name="city" onfocus="clearError('city')" onblur="validateField('city')"><br>
            <div id="city-error" class="error"></div>

            <label for="res">Indirizzo di Residenza:</label><br>
            <input type="text" id="res" name="res" onfocus="clearError('res')" onblur="validateField('res')"><br>
            <div id="res-error" class="error"></div>

            <input type="submit" value="Submit" onclick=""><br>
        </form>

        <div id="warning-message" class="warning"></div>
            
        <script src="./script.js"></script>
        <script src="./popup.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <script /*src="./dataPicker.js"*/>
        $(function() {
            $("#dataPicker").datepicker()
        });
        </script>

    </body>
</html>