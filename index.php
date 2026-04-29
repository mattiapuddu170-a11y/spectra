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

    <div class="carosello">
   
        <div class="mySlides fade">
            <img src="Immagini/foto1 Carosello.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/foto2.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/foto3.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/foto4.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/foto5.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/foto6.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/foto7.png" style="width:100%">
        </div>
        <script src="File JS/carosello.js"></script>
    </div>
    <br>
    <br>
    <h1 class="titolo" style="text-align: center;">BESTSELLER</h1>

    <section class="prodotti">
        
        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto3.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Eclipse</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Eclipse</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Eclipse">
                <input type="hidden" name="prodotto_image" value="Immagini/foto3.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto4.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Vision</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Vision</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Vision">
                <input type="hidden" name="prodotto_image" value="Immagini/foto4.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto5.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Mirage</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Mirage</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Mirage">
                <input type="hidden" name="prodotto_image" value="Immagini/foto5.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

    </section>

</main>

<footer>
    <p>&copy; 2026 Occhiali spectra srl. Tutti i diritti riservati.</p>
</footer>

</body>
</html>