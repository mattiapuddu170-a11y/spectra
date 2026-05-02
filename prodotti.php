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
    <title>Prodotti</title>
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

    <section class="prodotti">

        <article class="prod">
            <a href="occhiale.php" class="prod-link">
                <img src="Immagini/vision.png" alt="">
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
            <a href="occhiale.php" class="prod-link">
                <img src="Immagini/athletic.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Athletic</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Athletic</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Athletic">
                <input type="hidden" name="prodotto_image" value="Immagini/foto1.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/nexus.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Nexus</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Nexus</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Nexus">
                <input type="hidden" name="prodotto_image" value="Immagini/foto2.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

    </section>

    <section class="prodotti">

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/mirage.png" alt="">
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

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/eclipse.png" alt="">
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
                <img src="Immagini/horizon.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Horizon</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Horizon</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Horizon">
                <input type="hidden" name="prodotto_image" value="Immagini/foto6.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>
        
    </section>

    <section class="prodotti">

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/axis.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Axis</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Axis</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Axis">
                <input type="hidden" name="prodotto_image" value="Immagini/foto7.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

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