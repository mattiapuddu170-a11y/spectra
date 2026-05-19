<?php
require_once __DIR__ . '/../includes/product_queries.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 0;
$product = $id > 0 ? get_product_by_id($con, $id) : null;
$imageRows = $product ? get_product_images($con, $id) : [];
$images = array_column($imageRows, 'percorso');
$heroImage = $product ? get_product_hero_image($con, $id) : null;
$cartImage = $images[0] ?? $heroImage ?? '';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product ? e($product['nome']) : 'Prodotto'; ?></title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/occhiale.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>

<section class="hero">

    <div class="sinistra">

        <?php if ($product && !empty($images)): ?>

        <div class="carosello">

            <?php foreach ($images as $img): ?>
                <div class="mySlides fade">
                    <img src="<?php echo e(app_url('Immagini/' . $img)); ?>"
                         alt="<?php echo e($product['nome']); ?>">
                </div>
            <?php endforeach; ?>

            <button class="prev" type="button" onclick="plusSlides(-1)">❮</button>
            <button class="next" type="button" onclick="plusSlides(1)">❯</button>

        </div>

        <?php else: ?>

        <div class="prodotto-non-trovato">
            <h1>Prodotto non trovato</h1>
            <p><a href="<?php echo e(app_url('prodotti.php')); ?>">Torna alla pagina prodotti</a></p>
        </div>

        <?php endif; ?>

    </div>

    <div class="destra">

        <div class="info-prodotto">
            <?php if ($product): ?>
                <h1><?php echo e($product['nome']); ?></h1>

                <p class="prezzo">
                    € <?php echo format_price($product['prezzo']); ?>
                </p>

                <p>
                    <?php echo nl2br(e($product['descrizione'])); ?>
                </p>

                <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>">
                    <input type="hidden" name="prodotto_id" value="<?php echo e($product['id']); ?>">
                    <input type="hidden" name="prodotto_name" value="<?php echo e($product['nome']); ?>">
                    <input type="hidden" name="prodotto_image" value="<?php echo e('Immagini/' . $cartImage); ?>">
                    <button type="submit">Acquista ora</button>
                </form>
            <?php else: ?>
                <h1>Prodotto non trovato</h1>
                <p>Il prodotto richiesto non è disponibile.</p>
            <?php endif; ?>
        </div>

    </div>

</section>

<?php if ($heroImage): ?>
<div class="hero-image-large">

    <img src="<?php echo e(app_url('Immagini/' . $heroImage)); ?>"
         alt="<?php echo e($product['nome']); ?>">

</div>
<?php endif; ?>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
