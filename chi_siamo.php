<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/index.css">
    

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
                <img class="icons" src="Immagini/cart.png" alt="Carrello">
            </a>
            <a href="login.php">
                <img class="icons" src="Immagini/user.png" alt="Utente">
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

</header>

<aside class="sidebar" id="sidebar">
    <a href="index.php">Home</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="#about">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
</aside>

<main>
    <div style="text-align: center;">
        <h2>Chi Siamo</h2>
        <p> Crediamo in un modo nuovo di vivere la tecnologia: più naturale, più umano, più vicino alle persone.<br>
            Spectra nasce con l’obiettivo di superare i limiti tra mondo reale e digitale, trasformando un oggetto<br>
            quotidiano in uno strumento capace di ampliare ciò che puoi vedere e fare.<br>
            Non creiamo solo prodotti.<br>
            Creiamo esperienze pensate per accompagnarti ogni giorno.</p>
            <br>
            <br>
            <img src="Immagini/chi_siamo.png" style="height: 700px;">
    </div>
    <div style="text-align: center;">
        <h2>Tecnologia per tutti</h2>
        <p> I nostri occhiali intelligenti integrano funzionalità avanzate in modo semplice e immediato.<br>
            Traduzione in tempo reale, navigazione aumentata e assistenza vocale lavorano insieme per offrirti supporto<br>
            continuo, senza distrazioni.<br>
            La tecnologia non deve complicare le cose.<br>
            Deve funzionare, adattarsi e migliorare davvero la tua esperienza.</p>
            <br>
            <br>
            <img src="Immagini/chi_siamo2.png" style="height: 700px;">
    </div>
</main>