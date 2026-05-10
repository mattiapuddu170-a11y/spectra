<!-- #region PHP -->
<?php
session_start();

include "config.php";

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include "header.php"; ?>

<main>
    <section class="hero">
        <img src="Immagini/logo.png">
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus impedit explicabo magnam eaque rem nam nostrum perspiciatis nulla consequuntur debitis.</h2>
    </section>

    <section class="vetrina">

        <div class="vetrina-div">
            <div class="immagine">
                <img src="Immagini/!vision.png">
            </div>

            <div class="info">
                <h1>Spectra Vision</h1>
                <h2>€ 250,00</h2>
                <p>Gli Spectra Vision sono occhiali smart dal design moderno e raffinato, pensati per chi vive la città in movimento, offrendoti un’esperienza connessa e intuitiva mentre hai sempre lo sguardo sul mondo che ti circonda.</p>
                <a href="occhiale.php" class="button">Acquista ora</a>
            </div>
        </div>

    </section>

    <section class="vetrina reverse">
        
        <div class="vetrina-div">
            <div class="immagine">
                <img src="Immagini/!athletic.png">
            </div>

            <div class="info">
                <h1>Spectra Athletic</h1>
                <h2>€ 350,00</h2>
                <p>La corsa, evoluta: informazioni essenziali davanti ai tuoi occhi, musica sempre con te e un’esperienza senza distrazioni che migliora ogni allenamento.</p>
                <a href="occhiale.php" class="button">Acquista ora</a>
            </div>
        </div>

    </section>

    <section class="vetrina">

        <div class="vetrina-div">
            <div class="immagine">
                <img src="Immagini/!nexus.png">
            </div>

            <div class="info">
                <h1>Spectra Nexus</h1>
                <h2>€ 300,00</h2>
                <p>Spectra nexus sono occhiali smart dal design elegante e minimalista, con telecamera integrata, microfono, casse a conduzione ossea e lenti che mostrano informazioni direttamente nel campo visivo.</p>
                <a href="occhiale.php" class="button">Acquista ora</a>
            </div>
        </div>

    </section>

    
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
                <h1>Fino a 24 ore di riproduzione continua con la ricarica rapida</h1>
                <p>Risparmio energetico intelligente per una durata superiore della batteria</p>
            </article>
            
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
        </div>

    </section>

    <section class="prodotti">

        <article class="prod">
            <a href="occhiale.php?id=vision" class="prod-link">
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
            <a href="occhiale.php?id=athletic" class="prod-link">
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
            <a href="occhiale.php?id=nexus" class="prod-link">
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

</main>

<?php include "footer.php"; ?>

</body>
</html>