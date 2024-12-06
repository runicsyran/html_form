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
    let fields = ['name', 'surn', 'gender', 'city', 'res'];
    
    // Verifica se ogni campo è vuoto
    fields.forEach(function(fieldId) {
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
        const popup = new Popup({
            id: "demo-popup",
            title: "Demo Popup",
            content: `
                This is a demo of the popup library.
                big-margin§This line has a larger top margin.
                This is an example of {a-https://example.com}[a link].
                This is an example of {btn-red-button}[a red button].
                This text is {red}[red] {bold green}[bold green] {blue}[blue]].
                This text has a                lot of spaces.
                big-margin space-out§This line and the next {btn-b1}[Button 1]
                space-out§are left aligned. {btn-b2}[Button 2]
                big-margin§This text {shadow}[has {white}[some] shadow].`,
            titleColor: "#4842f5",
            backgroundColor: "#bff7ff",
            showImmediately: true,
            sideMargin: "15%",
        });
        popup.show();
    }
    return isValid; // Restituisce true per inviare il modulo, false per fermarlo
}