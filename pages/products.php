<?php
require_once __DIR__ . '/../includes/product_queries.php';

$products = get_all_products_with_main_image($con);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prodotti</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>

<?php foreach ($products as $index => $product): ?>
    <?php if ($index % 3 === 0): ?>
        <section class="prodotti">
    <?php endif; ?>

    <article class="prod">

        <a href="<?php echo e(app_url('occhiale.php?id=' . (int)$product['id'])); ?>" class="prod-link">

            <img src="<?php echo e(app_url('Immagini/' . ($product['percorso'] ?? ''))); ?>" alt="<?php echo e($product['nome']); ?>">

            <div class="descdiv">
                <h2><?php echo e($product['nome']); ?></h2>
                <h3>€ <?php echo format_price($product['prezzo']); ?></h3>
                <p><?php echo e($product['descrizione']); ?></p>
            </div>

        </a>

        <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>" class="product-form">

            <input type="hidden" name="prodotto_id" value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="prodotto_name" value="<?php echo e($product['nome']); ?>">
            <input type="hidden" name="prodotto_image" value="<?php echo e('Immagini/' . ($product['percorso'] ?? '')); ?>">

            <button class="linkdiv" type="submit">Acquista ora</button>

        </form>

    </article>

    <?php if ($index % 3 === 2 || $index === count($products) - 1): ?>
        </section>
    <?php endif; ?>
<?php endforeach; ?>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
