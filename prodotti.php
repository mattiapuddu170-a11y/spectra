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
    <title>Prodotti</title>
    <link rel="stylesheet" href="File CSS/stile.css">
</head>

<body>

<?php include "header.php"; ?>

<main>

<section class="prodotti">

<?php
$sql = "SELECT p.id, p.nome, p.prezzo, p.descrizione, i.percorso
        FROM prodotti p
        LEFT JOIN immagini i ON p.id = i.prodotto_id
        GROUP BY p.id";

$ris = $con->query($sql);

while ($p = $ris->fetch_assoc()) {
?>

<article class="prod">

    <a href="occhiale.php?id=<?php echo $p['id']; ?>" class="prod-link">

        <img src="Immagini/<?php echo $p['percorso']; ?>" alt="">

        <div class="descdiv">
            <h2><?php echo $p['nome']; ?></h2>
            <h3>€ <?php echo number_format($p['prezzo'], 2, ',', '.'); ?></h3>
            <p><?php echo $p['descrizione']; ?></p>
        </div>

    </a>

    <form method="post" action="carrello_sessione.php" class="product-form">

        <input type="hidden" name="prodotto_id" value="<?php echo $p['id']; ?>">
        <input type="hidden" name="prodotto_name" value="<?php echo $p['nome']; ?>">
        <input type="hidden" name="prodotto_image" value="Immagini/<?php echo $p['percorso']; ?>">

        <button class="linkdiv" type="submit">Acquista ora</button>

    </form>

</article>

<?php } ?>

</section>

</main>

<?php include "footer.php"; ?>

</body>
</html>