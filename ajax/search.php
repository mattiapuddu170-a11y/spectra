<?php

require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/product_queries.php';

header('Content-Type: text/html; charset=UTF-8');

$query = trim($_GET['q'] ?? '');

if ($query === '') {
    exit();
}

$products = search_products($con, $query);

foreach ($products as $product) {
    ?>
    <div class="card">
        <h2><?php echo e($product['nome']); ?></h2>
        <p><?php echo e($product['descrizione']); ?></p>
        <p class="prezzo">€ <?php echo format_price($product['prezzo']); ?></p>
    </div>
    <?php
}
