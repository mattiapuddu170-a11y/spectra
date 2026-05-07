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
    <link rel="stylesheet" href="File CSS/occhiale.css">
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
    <a href="chi_siamo.html">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main>
    <section class="hero">
        <div class="sinistra">

           <div class="carosello">
                <div class="mySlides fade">
                    <img src="Immagini/vision.png">
                </div>
                <div class="mySlides fade">
                    <img src="Immagini/nexus.png">
                </div>
                <div class="mySlides fade">
                    <img src="Immagini/athletic.png">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                <script src="File JS/carosello.js"></script>

            </div>
            
        </div>
     

        <div class="destra">
            ciao
        </div>

    </section>

    <div style="width:100%; height:800px; overflow:hidden; margin-bottom: 60px;">
        <img src="Immagini/!athletic.png" style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
    </div>

    <section class="features">

        <div class="features-row">
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
            
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>

            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article> 
        </div>

        <div class="features-row">
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
            
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
        </div>

    </section>
    
</main>

<footer>
  <div class="footer-container">

    <div class="footer-section">
      <h2>Spectra</h2>
      <p>Vedi il mondo con stile</p>
    </div>

    <div class="footer-section">
      <h3>Link utili</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="prodotti.php">Shop</a></li>
        <li><a href="chi_siamo.php">Chi Siamo</a></li>
        <li><a href="#">Contatti</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Contatti</h3>
      <p>Email: spectraocchiali@tiscali.it</p>
      <p>Tel: +39 02 0000 0000</p>
      <p>Tel: +39 320 000 0000</p>
      <p>Facebook</p>
      <p>Instagram</p>
      <p>Twitter</p>
      <p>Tik Tok</p>
    </div>

  </div>
  <hr>
  <div class="footer-bottom">
    <p>© 2026 Spectra - Tutti i diritti riservati</p>
  </div>
</footer>


</body>
</html>