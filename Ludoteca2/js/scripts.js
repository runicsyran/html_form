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
// funzione per l'inserimento di un gioco nel carrello
function addToCart(title, price) {
    var xhr = new XMLHttpRequest(); // oggetto che permette di fare richieste HTTP
    xhr.open("POST", "add_to_cart.php", true); // imposto il metodo di richiesta e il file a cui fare la richiesta
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // imposto l'header della richiesta
    xhr.onreadystatechange = function () { // funzione che viene eseguita quando cambia lo stato della richiesta
        if (xhr.readyState == 4 && xhr.status == 200) { // se la richiesta è completata e ha successo
            //alert("Gioco aggiunto al carrello!"); // mostro un alert
            const myPopup = new Popup({
                id: "popup2",
                title: "Gioco aggiunto al carrello",
                content: "Hai inserito un gioco nel carrello!!",  
                backgroundColor: "skyblue",
            });
            myPopup.show();
        } 
    };
    xhr.send("title=" + title + "&price=" + price); // invio la richiesta
}