# Project Title: Web Application with User Authentication
## Panoramica
Questa applicazione web è progettata per fornire funzionalità di autenticazione degli utenti, consentendo agli utenti di accedere, registrarsi e accedere a un dashboard personalizzato. L'applicazione è costruita utilizzando JavaScript, PHP, HTML e SQL.

## Caratteristiche
- Funzionalità di registrazione e accesso degli utenti
- Dashboard che visualizza un messaggio di benvenuto e informazioni specifiche per l'utente
- Design responsivo con stile CSS
- Validazione lato client utilizzando JavaScript

## Struttura del Progetto
```
web-app
├── public
│   ├── index.php          # Punto di ingresso principale dell'applicazione
│   ├── login.php          # Gestisce l'accesso degli utenti
│   ├── register.php       # Gestisce la registrazione degli utenti
│   ├── dashboard.php      # Visualizza il dashboard dell'utente
│   ├── css
│   │   └── styles.css     # Stili CSS per l'applicazione
│   ├── js
│   │   └── scripts.js     # JavaScript per la funzionalità lato client
├── src
│   ├── config
│   │   └── database.php   # Impostazioni di connessione al database
│   ├── controllers
│   │   ├── AuthController.php  # Gestisce la logica di autenticazione
│   │   └── UserController.php  # Gestisce i dati degli utenti
│   ├── models
│   │   └── User.php       # Struttura dei dati dell'utente e operazioni sul database
│   ├── views
│       ├── login_view.php  # Struttura HTML per la pagina di accesso
│       ├── register_view.php # Struttura HTML per la pagina di registrazione
│       └── dashboard_view.php # Struttura HTML per il dashboard dell'utente
├── sql
│   └── schema.sql         # Schema SQL per il database
└── README.md              # Documentazione del progetto
```

## Istruzioni per l'Installazione
1. Clona il repository sulla tua macchina locale.
2. Configura un ambiente server locale (es. XAMPP, WAMP).
3. Importa il file `sql/schema.sql` nel tuo database per creare le tabelle necessarie.
4. Aggiorna le impostazioni di connessione al database in `src/config/database.php`.
5. Accedi all'applicazione tramite il tuo browser web all'indirizzo `http://localhost/web-app/public/index.php`.

## Utilizzo
- Naviga alla pagina di registrazione per creare un nuovo account.
- Dopo la registrazione, accedi utilizzando le tue credenziali.
- Dopo un accesso riuscito, verrai reindirizzato al tuo dashboard.

## Tecnologie Utilizzate
- PHP per lo scripting lato server
- MySQL per la gestione del database
- HTML/CSS per lo sviluppo front-end
- JavaScript per l'interattività lato client
