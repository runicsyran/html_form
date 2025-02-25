function validatePassword() {
    event.preventDefault();
    var password = document.getElementById("password").value;
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if (!regex.test(password)) {
        // alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, una lettera minuscola e un numero.");
        const myPopup = new Popup({
            id: "popup1",
            title: "Password non valida",
            content: "inserisci una password valida, che contenga almeno una lettera maiuscola, una lettera minucola e un numero",  
            backgroundColor: "skyblue",
        });
        myPopup.show();
        return false;
    }
    return true;
}
function addToCart(title, price) { // Funzione per aggiungere un gioco al carrello
    var xhr = new XMLHttpRequest(); // Creo un oggetto XMLHttpRequest
    xhr.open("POST", "add_to_cart.php", true); // Apro una connessione POST con add_to_cart.php
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Imposto l'header della richiesta
    xhr.onreadystatechange = function () { // Quando lo stato della richiesta cambia
        if (xhr.readyState == 4 && xhr.status == 200) { // Se la richiesta è completata e lo stato è OK
            //alert("Gioco aggiunto al carrello!");
            const myPopup2 = new Popup({ // Creo un popup
                id: "popup2",
                title: "Informazione",
                content: "Gioco inserito nel carrello con successo",  
                backgroundColor: "skyblue",
            });
            myPopup2.show();
        }
    };
    xhr.send("title=" + title + "&price=" + price);
}