<!-- #region PHP -->
<?php
session_start();
$con = new mysqli("localhost", "root", "", "negozio_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}

// richiesta AJAX
if (isset($_GET['ajax']) && isset($_GET['q'])) {

    $q = trim($_GET['q']);
    $q = $con->real_escape_string($q);

    if ($q == "") exit;

    $sql = "SELECT id, nome, prezzo, descrizione
            FROM prodotti
            WHERE nome LIKE '%$q%'
               OR descrizione LIKE '%$q%'
            ORDER BY nome
            LIMIT 5";

    $ris = $con->query($sql);

    if ($ris->num_rows == 0) {
        exit;
    }

    while ($p = $ris->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>{$p['nome']}</h2>";
        echo "<p>{$p['descrizione']}</p>";
        echo "<p class='prezzo'>€ " . number_format($p['prezzo'], 2, ',', '.') . "</p>";
        echo "</div>";
    }
    exit;
}
?>
<!-- #endregion -->
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/index.css">
    <link rel="stylesheet" href="File CSS/about.css">

</head>
<body>

<header>
        <button class="hamburger-btn" id="hamburgerBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <a href="index.php" class="logo">
            <img src="Immagini/logo.png" alt="Logo">
        </a>
        

        <div class="icons-group">
            <a href="carrello.php">
                <img class="icons" src="Immagini/icons/cart.png" alt="Carrello">
            </a>
            <a href="login.php">
                <img class="icons" src="Immagini/icons/user.png" alt="Utente">
            </a>
        </div>

        <div class="menu-nav search-container">
            <div class="box">
                <input type="text" id="search" placeholder="Cerca prodotti...">
            </div>
            <div id="risultati"></div>
        </div>

        <script src="File JS/ricerca.js"></script>
        <script src="File JS/menu.js"></script>

</header><hr>

<aside class="sidebar" id="sidebar">
    <a href="index.php">Home</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="chi_siamo.php">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>


<main>

    <div class="pres">
        <h2>Chi Siamo</h2>
        <p> Crediamo in un modo nuovo di vivere la tecnologia: più naturale, più umano, più vicino alle persone.<br>
            Spectra nasce con l’obiettivo di superare i limiti tra mondo reale e digitale, trasformando un oggetto<br>
            quotidiano in uno strumento capace di ampliare ciò che puoi vedere e fare.<br>
            Non creiamo solo prodotti.<br>
            Creiamo esperienze pensate per accompagnarti ogni giorno.
        </p>

        <img src="Immagini/chi_siamo.png">
    </div>

    <div class="pres">
        <h2>Tecnologia per tutti</h2>
        <p> I nostri occhiali intelligenti integrano funzionalità avanzate in modo semplice e immediato.<br>
            Traduzione in tempo reale, navigazione aumentata e assistenza vocale lavorano insieme per offrirti supporto<br>
            continuo, senza distrazioni.<br>
            La tecnologia non deve complicare le cose.<br>
            Deve funzionare, adattarsi e migliorare davvero la tua esperienza.
        </p>

    
        <img src="Immagini/chi_siamo2.png">
    </div>

    <div class="pres">
        <h2>Più sicurezza</h2>
        <p>
            Controllare continuamente lo smartphone è diventato un rischio quotidiano.<br>
            Spectra nasce per cambiare questo.<br> 
            Con informazioni sempre visibili e accessibili in modo immediato, puoi muoverti,<br>
            orientarti e comunicare senza distogliere lo sguardo da ciò che conta davvero.<br>
            La tecnologia deve aiutarti, non distrarti.<br>
            E soprattutto, deve proteggerti.
        </p>

        <img src="Immagini/chi_siamo3.png">
    </div>
    

    <div class="pres">
        <h2>INFORMAZIONI LEGALI</h2>
        <p>
           Ragione sociale: Spectra Vision S.r.l.<br>
           Sede legale: Via dell’Innovazione 1, Milano, Italia<br>
           Email: spectraocchiali@tiscali.it<br>
           Registro imprese: Camera di Commercio di Milano<br>
           Numero di registrazione: : MI-0000000<br>
           Partita IVA: IT00000000000
        </p>
    </div>
</main> 

<footer>
    <p>&copy; 2026 Occhiali spectra srl. Tutti i diritti riservati.</p>
</footer>
</body>
</html>