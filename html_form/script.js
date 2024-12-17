/** Funzione per validare i campi
*/
function validateField(fieldId) {
    let field = document.getElementById(fieldId);
    let errorDiv = document.getElementById(fieldId + '-error');
    if (field.value.trim() === "") {
        errorDiv.textContent = "Questo campo non può essere vuoto";
    } else {
        errorDiv.textContent = "";
    }
}

/** Funzione per rimuovere l'errore quando il campo ottiene il focus
*/
function clearError(fieldId) {
    let errorDiv = document.getElementById(fieldId + '-error');
    errorDiv.textContent = "";
}

/** Funzione per validare l'intero modulo prima dell'invio
*/
function validateForm(event) {
    let isValid = true;
    let emptyFields = []; // Array per raccogliere i campi vuoti

    // Lista di ID dei campi da validare
    let fields = ['name', 'surn', 'gender', 'dataPicker', 'city', 'res'];
    
    // Verifica se ogni campo è vuoto
    fields.forEach(function(fieldId) {
        console.log(fieldId);
        let field = document.getElementById(fieldId);
        let errorDiv = document.getElementById(fieldId + '-error');
        if (field.value.trim() === "") {
            errorDiv.textContent = "Questo campo non può essere vuoto";
            emptyFields.push(fieldId); // Aggiungi il campo vuoto all'array
            isValid = false;
        }
    });

    // Se qualche campo è vuoto, annulla l'invio del modulo e mostra il warning
    if (!isValid) {
        event.preventDefault(); // Annulla l'invio del modulo
        
        // Mostra un avviso con i campi vuoti
        let warningMessage = "I seguenti campi sono stati lasciati vuoti:\n";
        emptyFields.forEach(function(fieldId) {
            let fieldLabel = document.querySelector('label[for="' + fieldId + '"]').textContent;
            warningMessage += "- " + fieldLabel + "\n";
        });
        /*alert(warningMessage);*/
        const myPopup = new Popup({
            id: "popup1",
            title: "I seguenti campi sono stati lasciati vuoti",
            content: warningMessage,
            backgroundColor: "purple"
        });
        myPopup.show();
    }
    return isValid; // Restituisce true per inviare il modulo, false per fermarlo
}