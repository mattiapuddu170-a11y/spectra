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

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

/* prodotto dal DB */
$sql = "SELECT * FROM prodotti WHERE id = $id LIMIT 1";
$res = $con->query($sql);
$product = $res->fetch_assoc();

/* immagini carosello dal DB */
$sqlImg = "SELECT percorso FROM immagini WHERE prodotto_id = $id";
$resImg = $con->query($sqlImg);

$images = [];
while ($row = $resImg->fetch_assoc()) {
    if (!empty($row['percorso'])) {
        $images[] = $row['percorso'];
    }
}
?>

<main>

<section class="hero">

    <div class="sinistra">

        <?php if ($product): ?>

        <!-- CAROSELLO (STRUTTURA IDENTICA) -->
        <?php
$sqlImg = "SELECT percorso FROM immagini WHERE prodotto_id = $id";
$resImg = $con->query($sqlImg);

$images = [];
while ($row = $resImg->fetch_assoc()) {
    $images[] = $row['percorso'];
}
?>

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
<?php endif; ?>

        <?php endif; ?>

    </div>

    <div class="destra">

        <div class="info-prodotto">
            <h1><?php echo $product['nome']; ?></h1>
            <p class="prezzo">€ <?php echo number_format($product['prezzo'], 2, ',', '.'); ?></p>
            <p><?php echo $product['descrizione']; ?></p>
            <button>Acquista ora</button>
        </div>

    </div>

</section>

<!-- IMMAGINE GRANDE (UGUALE, MA DINAMICA DAL DB) -->
<div style="width:100%; height:800px; overflow:hidden; margin-bottom: 60px;">

    <?php if (!empty($images[0])) { ?>
        <img src="Immagini/<?php echo $images[0]; ?>"
             style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
    <?php } ?>

</div>

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