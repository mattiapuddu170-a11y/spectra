<!-- #region PHP -->
<?php
session_start();
include "config.php";

// AJAX (invariato)
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

// ID prodotto
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// PRODOTTO
$sql = "SELECT * FROM prodotti WHERE id = $id LIMIT 1";
$res = $con->query($sql);
$product = $res->fetch_assoc();

// IMMAGINI CAROSELLO
$sqlImg = "SELECT percorso, is_hero FROM immagini WHERE prodotto_id = $id";
$resImg = $con->query($sqlImg);

$images = [];
while ($row = $resImg->fetch_assoc()) {
    $images[] = $row['percorso'];
}

// IMMAGINE HERO (NUOVO SISTEMA)
$sqlHero = "SELECT percorso FROM immagini WHERE prodotto_id = $id AND is_hero = 1 LIMIT 1";
$resHero = $con->query($sqlHero);
$heroRow = $resHero->fetch_assoc();
$heroImage = $heroRow['percorso'] ?? null;

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

        <!-- CAROSELLO IDENTICO -->
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
            <p>Torna alla pagina prodotti</p>
        </div>

        <?php endif; ?>

    </div>

    <div class="destra">

        <div class="info-prodotto">
            <h1><?php echo htmlspecialchars($product['nome']); ?></h1>

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

<!-- IMMAGINE GRANDE (HERO DAL DB) -->
<?php if ($heroImage): ?>
<div style="width:100%; height:800px; overflow:hidden; margin-bottom: 60px;">

    <img src="Immagini/<?php echo htmlspecialchars($heroImage); ?>"
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

    if (n > slides.length) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}
</script>

</body>
</html>