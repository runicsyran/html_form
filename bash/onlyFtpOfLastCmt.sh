# Funzione per caricare i file su FTP a partire dal commit
function uploadFilesFromCommit() {
    # Ottieni l'elenco dei file modificati nell'ultimo commit
    changedFiles=$(git diff-tree --no-commit-id --name-only -r HEAD)

    # Itera sui file modificati e carica ciascuno di essi
    for file in $changedFiles; do
        # Costruisci il percorso FTP per il file
        local relativePath=$(dirname "$file")
        local fileName=$(basename "$file")
        local ftpRequest="ftp://michelangelocuccui:DioBrando21@ftp.michelangelocuccui.altervista.org:21/$relativePath/$fileName"

        # Esegui il comando curl per caricare il file
        local curlCommand="curl -T \"$file\" \"$ftpRequest\" --ftp-pasv --ftp-create-dirs"
        echo -e "$curlCommand"
        
        # Esegui curl e cattura l'output e il codice di uscita
        local curlOutput
        curlOutput=$(eval "$curlCommand" 2>&1)
        local curlExitCode=$?

        # Controlla se curl ha restituito un errore
        if [ $curlExitCode -ne 0 ]; then
            # Se l'errore è "Failed to open/read local data", rimuovi il file dal server
            if [[ "$curlOutput" == *"Failed to open/read local data"* ]]; then
                echo "Errore durante il caricamento di $file. Rimozione dal server in corso..."
                
                # Comando per eliminare il file dal server FTP
                local deleteCommand="curl -Q \"DELE $relativePath/$fileName\" \"ftp://michelangelocuccui:DioBrando21@ftp.michelangelocuccui.altervista.org:21/\" --ftp-pasv"
                echo -e "$deleteCommand"
                eval "$deleteCommand"
                
                echo "File $relativePath/$fileName rimosso dal server."
            else
                # Per altri tipi di errori, mostra l'output di curl
                echo "Errore durante il caricamento di $file:"
                echo "$curlOutput"
            fi
        else
            echo "$relativePath/$fileName caricato con successo."
        fi
    done
}

# Carica i file presenti nell'ultimo commit
uploadFilesFromCommit

sleep 5
clear