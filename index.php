<?php
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
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="File CSS/index.css">
    <link rel="stylesheet" href="File CSS/stile.css">
</head>
<body>

<header>
    <div class="header-left">
        <button class="hamburger-btn" id="hamburgerBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <img id="logo" src="Immagini/logo.png" alt="Logo">

    <nav class="header-right">

        <div class="menu-nav">
            <a href="login.php">
                <img class="icons" src="Immagini/user.png">
            </a>
        </div>

        <div class="menu-nav search-container">
            <div class="box">
                <input type="text" id="search" placeholder="Cerca prodotti...">
            </div>
            <div id="risultati"></div>
        </div>

        <script src="File JS/ricerca.js"></script>

    </nav>
</header>

<aside class="sidebar" id="sidebar">
    <a href="#home">Home</a>
    <a href="#prodotti">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="#about">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main class="mainindex">

    <div class="carosello">
   
        <div class="mySlides fade">
            <img src="Immagini/logo.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/logo.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="Immagini/logo.png" style="width:100%">
        </div>
    </div>

    <section class="destinazioni">
        <article class="dest">
            <img src="Immagini/foto" alt="">
            <div class="descdiv">
                <h2>Barcellona</h2>
                <h3>€ 1250,95</h3>
                <p>Prenota subito un viaggio per Barcellona!</p>
            </div>
            <div class="linkdiv" onclick="window.location.href='conferma.html'">Prenota ora</div>
        </article>

        <article class="dest">
            <img src="Immagini/foto" alt="">
            <div class="descdiv">
                <h2>Parigi</h2>
                <h3>€ 1450,95</h3>
                <p>Prenota subito un viaggio per Parigi!</p>
            </div>
            <div class="linkdiv" onclick="window.location.href='conferma2.html'">Prenota ora</div>
        </article>

        <article class="dest">
            <img src="Immagini/foto" alt="">
            <div class="descdiv">
                <h2>Sofia</h2>
                <h3>€ 950,95</h3>
                <p>Prenota subito un viaggio per Sofia!</p>
            </div>
            <div class="linkdiv" onclick="window.location.href='conferma3.html'">Prenota ora</div>
        </article>
    </section>

</main>

<footer>
    <p>&copy; 2026 Occhiali spectra srl. Tutti i diritti riservati.</p>
</footer>

<script src="File JS/script.js"></script>

</body>
</html>