# Ludoteca App

## Descrizione
Ludoteca App è un'applicazione web progettata per gestire un sistema di ludoteca, consentendo agli utenti di registrarsi, effettuare il login e accedere a un cruscotto personale. Gli utenti possono visualizzare un elenco di prodotti, dettagli sui prodotti e le fatture associate al loro account.

## Struttura del Progetto
Il progetto è organizzato come segue:

```
ludoteca-app
├── public
│   ├── index.php                # Punto di ingresso principale dell'applicazione
│   ├── login.php                # Gestisce il processo di login
│   ├── register.php             # Gestisce la registrazione degli utenti
│   ├── dashboard.php            # Mostra il cruscotto dell'utente
│   ├── products.php             # Elenco dei prodotti
│   ├── product_details.php      # Dettagli di un prodotto specifico
│   ├── invoices.php             # Elenco delle fatture dell'utente
│   ├── css
│   │   └── styles.css           # Stili per l'applicazione
│   └── js
│       └── scripts.js           # Funzionalità JavaScript per l'applicazione
├── src
│   ├── config
│   │   └── database.php         # Configurazione della connessione al database
│   ├── controllers
│   │   ├── AuthController.php    # Gestisce l'autenticazione degli utenti
│   │   ├── ProductController.php  # Gestisce le operazioni sui prodotti
│   │   └── InvoiceController.php  # Gestisce le operazioni sulle fatture
│   ├── models
│   │   ├── User.php              # Modello per l'entità utente
│   │   ├── Product.php           # Modello per l'entità prodotto
│   │   └── Invoice.php           # Modello per l'entità fattura
│   └── views
│       ├── login_view.php        # Struttura HTML per la pagina di login
│       ├── register_view.php     # Struttura HTML per la pagina di registrazione
│       ├── dashboard_view.php     # Struttura HTML per il cruscotto dell'utente
│       ├── products_view.php      # Struttura HTML per l'elenco dei prodotti
│       ├── product_details_view.php # Struttura HTML per i dettagli del prodotto
│       └── invoices_view.php      # Struttura HTML per l'elenco delle fatture
├── sql
│   └── schema.sql                # SQL per la creazione delle tabelle nel database
└── README.md                     # Documentazione del progetto
```

## Istruzioni per l'Installazione
1. Clona il repository:
   ```
   git clone <repository-url>
   ```
2. Configura il database:
   - Importa il file `sql/schema.sql` nel tuo database MySQL.
   - Modifica il file `src/config/database.php` con le tue credenziali di accesso al database.
3. Avvia un server locale (ad esempio, XAMPP o MAMP) e posiziona la cartella `ludoteca-app` nella directory del server.
4. Accedi all'applicazione tramite il browser all'indirizzo `http://localhost/ludoteca-app/public/index.php`.

## Utilizzo
- Visita la pagina di login per accedere al tuo account.
- Se non sei registrato, puoi registrarti tramite la pagina di registrazione.
- Una volta effettuato il login, verrai reindirizzato al cruscotto, dove potrai visualizzare i tuoi dati e accedere ad altre funzionalità come l'elenco dei prodotti e le fatture.