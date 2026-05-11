<!-- #region PHP -->
<?php
session_start();
include "config.php";

// AJAX (INVARIATO)
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

    while ($p = $ris->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>{$p['nome']}</h2>";
        echo "<p>{$p['descrizione']}</p>";
        echo "<p class='prezzo'>€ " . number_format($p['prezzo'], 2, ',', '.') . "</p>";
        echo "</div>";
    }

    exit;
}

// ID PRODOTTO
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// PRODOTTO DAL DB
$sql = "SELECT * FROM prodotti WHERE id = $id LIMIT 1";
$res = $con->query($sql);
$product = $res->fetch_assoc();

// ARRAY IMMAGINI CAROSELLO
$images = [];

// IMMAGINE GRANDE
$heroImage = null;

if ($product) {

    // PRENDO LO SLUG (vision, athletic, nexus...)
    $slug = $product['slug'];

    // CAROSELLO:
    // prende vision.png vision2.png vision3.png ecc
    $sqlCarousel = "
        SELECT percorso
        FROM immagini
        WHERE prodotto_id = $id
        AND percorso NOT LIKE '!%'
        ORDER BY id ASC
    ";

    $resCarousel = $con->query($sqlCarousel);

    while ($row = $resCarousel->fetch_assoc()) {
        $images[] = $row['percorso'];
    }

    // IMMAGINE GRANDE:
    // prende !vision oppure !athletic ecc
    $sqlHero = "
        SELECT percorso
        FROM immagini
        WHERE prodotto_id = $id
        AND percorso LIKE '!%'
        LIMIT 1
    ";

    $resHero = $con->query($sqlHero);

    if ($heroRow = $resHero->fetch_assoc()) {
        $heroImage = $heroRow['percorso'];
    }
}
?>
<!-- #endregion -->

<!DOCTYPE html>
<html>

<head>
    <title>Prodotto</title>

    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/occhiale.css">
</head>

<body>

<?php include "header.php"; ?>

<main>

<section class="hero">

    <div class="sinistra">

        <?php if ($product): ?>

        <div class="carosello">

            <?php foreach ($images as $img) { ?>

                <div class="mySlides fade">

                    <img src="Immagini/<?php echo htmlspecialchars($img); ?>"
                         alt="<?php echo htmlspecialchars($product['nome']); ?>">

                </div>

            <?php } ?>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>

        <?php else: ?>

        <div class="prodotto-non-trovato">
            <h1>Prodotto non trovato</h1>
            <p>Seleziona un modello dalla pagina prodotti</p>
        </div>

        <?php endif; ?>

    </div>

    <div class="destra">

        <div class="info-prodotto">

            <h1>
                <?php echo htmlspecialchars($product['nome']); ?>
            </h1>

            <p class="prezzo">
                € <?php echo number_format($product['prezzo'], 2, ',', '.'); ?>
            </p>

            <p>
                <?php echo nl2br(htmlspecialchars($product['descrizione'])); ?>
            </p>

            <button>Acquista ora</button>

        </div>

    </div>

</section>

<!-- IMMAGINE GRANDE -->
<?php if ($heroImage): ?>

<div style="width:100%; height:800px; overflow:hidden; margin-bottom: 60px;">

    <img src="Immagini/<?php echo htmlspecialchars($heroImage); ?>"
         alt="<?php echo htmlspecialchars($product['nome']); ?>"
         style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;">

</div>

<?php endif; ?>

</main>

<?php include "footer.php"; ?>

<script>

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {

    let slides = document.getElementsByClassName("mySlides");

    if (slides.length === 0) return;

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}

</script>

</body>
</html>