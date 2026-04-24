<?php
$con = new mysqli("localhost", "root", "", "negozio_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}

// se richiesta AJAX
if (isset($_GET['ajax']) && isset($_GET['q'])) {

    $q = trim($_GET['q']);
    $q = $con->real_escape_string($q);

    if ($q == "") exit;

    $sql = "SELECT id, nome, prezzo, stock, descrizione
            FROM prodotti
            WHERE nome LIKE '%$q%'
               OR descrizione LIKE '%$q%'
            ORDER BY nome";

    $ris = $con->query($sql);

    if ($ris->num_rows == 0) {
        echo "<div class='card'>Nessun prodotto trovato</div>";
        exit;
    }

    while ($p = $ris->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>{$p['nome']}</h2>";
        echo "<p>{$p['descrizione']}</p>";
        echo "<p class='prezzo'>€ " . number_format($p['prezzo'], 2, ',', '.') . "</p>";

        if ($p['stock'] > 0) {
            echo "<p class='disponibile'>Disponibile: {$p['stock']}</p>";
        } else {
            echo "<p class='esaurito'>Esaurito</p>";
        }

        echo "</div>";
    }
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="File CSS\index.css">
        <link rel="stylesheet" href="File CSS\stile.css">
    </head>
    <body>
        <header>
            <img id="logo" src="Immagini/logo.png" alt="Logo">
            <nav>
                <div class="menu-nav">
                        <div class="box">
                            <input type="text" id="search" placeholder="Cerca prodotti...">
                        </div>
                    <div id="risultati"></div>
                    <script src="File JS/ricerca.js"></script>
                </div>
                <div class="menu-nav">
                    <img class="icons" src="Immagini/mail.png"><a href="mailto:spectraocchiali@tiscali.it">spectraocchiali@tiscali.it</a>
                </div>
                <div class="menu-nav">
                    SEGUICI SU
                    <img class="icons" src="Immagini/instagram.png">
                    <img class="icons" src="Immagini/facebook.png">
                    <img class="icons" src="Immagini/youtube.png">
                </div>
            </nav>
        </header>
        <main class="mainindex">
            <div class="carosello">
                <div class="text">
                    <h1>Un mondo di emozioni<br>ti aspetta</h1>
                    <p>Offriamo esperienze indimenticabili in tutto il mondo.<br>Scegli il tuo prossimo viaggio con noi!</p>
                </div>
                <div class="mySlides fade">
                  <img src="Immagini/foto.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="Immagini/foto.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="Immagini/foto.png" style="width:100%">
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
            <p>&copy; 2024 Agenzia Viaggi Puddu. Tutti i diritti riservati.</p>
        </footer>
        <script src="File JS/script.js"></script>
    </body>
</html>