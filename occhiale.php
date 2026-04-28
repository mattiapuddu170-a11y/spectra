<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="File CSS/index.css">
    <link rel="stylesheet" href="File CSS/stile.css">

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

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main>

</main>

<footer>
    <p>&copy; 2026 Occhiali spectra srl. Tutti i diritti riservati.</p>
</footer>



</body>
</html>