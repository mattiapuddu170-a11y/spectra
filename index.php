<?php
// connessione DB
$con = new mysqli("localhost", "root", "", "negozio_occhiali");

if ($con->connect_error) {
    die("Connessione fallita: " . $con->connect_error);
}

// variabile ricerca
$ricerca = "";
$ris = null;

// se l'utente ha cercato qualcosa
if (isset($_GET['q'])) {
    $ricerca = $con->real_escape_string($_GET['q']);

    $sql = "SELECT * FROM prodotti
            WHERE nome LIKE '%$ricerca%'
               OR descrizione LIKE '%$ricerca%'
               OR marca LIKE '%$ricerca%'
               OR categoria LIKE '%$ricerca%'";

    $ris = $con->query($sql);
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
                    <img class="icons" src="Immagini/phone.png"><a href="tel: 373 171 4471">373 171 4471</a> 
                </div>
                <div class="menu-nav">
                    <img class="icons" src="Immagini/mail.png"><a href="mailto:info@pudduviaggi.com">info@pudduviaggi.com</a>
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
                  <img src="Immagini/foto.jpeg" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="Immagini/foto" style="width:100%">
                </div>
                <div class="mySlides fade">
                  <img src="Immagini/foto" style="width:100%">
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