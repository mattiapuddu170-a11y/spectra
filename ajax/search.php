<?php

require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/product_queries.php';

header('Content-Type: text/html; charset=UTF-8');

$query = trim($_GET['q'] ?? '');

if ($query === '') {
    exit();
}

$products = search_products($con, $query, 6);

if (empty($products)) {
    ?>
    <p class="search-state">Nessun prodotto trovato.</p>
    <?php
    exit();
}

foreach ($products as $product) {
    $image = get_product_main_image($product['nome']);
    $productUrl = app_url('occhiale.php?id=' . (int)$product['id']);
    ?>
    <a class="search-result" href="<?php echo e($productUrl); ?>" role="option">
        <?php if ($image): ?>
            <span class="search-thumb">
                <img src="<?php echo e(app_url('Immagini/' . $image)); ?>" alt="">
            </span>
        <?php endif; ?>
        <span class="search-copy">
            <strong><?php echo e($product['nome']); ?></strong>
            <span><?php echo e($product['descrizione']); ?></span>
            <em>&euro; <?php echo format_price($product['prezzo']); ?></em>
        </span>
        <span class="search-arrow" aria-hidden="true">&rsaquo;</span>
    </a>
    <?php
}
