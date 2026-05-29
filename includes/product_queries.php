<?php

function search_products(mysqli $con, $term, $limit = 5)
{
    $term = trim((string)$term);
    $limit = max(1, min((int)$limit, 20));

    if ($term === '') {
        return [];
    }

    $like = '%' . $term . '%';
    $sql = "SELECT id, nome, prezzo, descrizione
            FROM prodotti
            WHERE nome LIKE ? OR descrizione LIKE ?
            ORDER BY nome
            LIMIT ?";

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        return [];
    }

    $stmt->bind_param('ssi', $like, $like, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

    return array_map('normalize_product_row', $products);
}

function get_all_products_with_main_image(mysqli $con)
{
    $nameExpr = "TRIM(REPLACE(REPLACE(p.nome, CHAR(13), ''), CHAR(10), ''))";
    $orderExpr = "FIELD(
                $nameExpr,
                'Spectra Vision',
                'Spectra Athletic',
                'Spectra Nexus',
                'Spectra Horizon',
                'Spectra Axis',
                'Spectra Eclipse',
                'Spectra Mirage'
            )";

    $sql = "SELECT p.id, p.nome, p.prezzo, p.descrizione
            FROM prodotti p
            ORDER BY CASE WHEN $orderExpr = 0 THEN 999 ELSE $orderExpr END, $nameExpr";

    $result = $con->query($sql);
    $products = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

    foreach ($products as &$product) {
        $product = normalize_product_row($product);
        $product['percorso'] = get_product_main_image($product['nome']);
    }
    unset($product);

    return $products;
}

function get_product_by_id(mysqli $con, $id)
{
    $sql = "SELECT id, nome, prezzo, descrizione
            FROM prodotti
            WHERE id = ?
            LIMIT 1";

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        return null;
    }

    $id = (int)$id;
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $product = $result ? $result->fetch_assoc() : null;

    return $product ? normalize_product_row($product) : null;
}

function get_product_images(mysqli $con, $productId)
{
    $productName = get_product_name_by_id($con, $productId);
    $files = $productName ? get_product_image_files($productName) : [];
    $files = array_values(array_filter($files, 'is_carousel_image_file'));

    if (!empty($files)) {
        return array_map(function ($file) {
            return ['percorso' => $file];
        }, $files);
    }

    if (images_table_has_hero_column($con)) {
        $sql = "SELECT percorso, is_hero
                FROM immagini
                WHERE prodotto_id = ?
                ORDER BY is_hero ASC";
    } else {
        $sql = "SELECT percorso
                FROM immagini
                WHERE prodotto_id = ?";
    }

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        return [];
    }

    $productId = (int)$productId;
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

    return array_values(array_filter($rows, function ($row) {
        $file = $row['percorso'] ?? '';

        return image_file_exists($file) && is_carousel_image_file($file);
    }));
}

function get_product_hero_image(mysqli $con, $productId)
{
    $productName = get_product_name_by_id($con, $productId);
    $heroImage = $productName ? get_product_hero_file($productName) : null;

    if ($heroImage) {
        return $heroImage;
    }

    if (!images_table_has_hero_column($con)) {
        return $productName ? get_product_main_image($productName) : null;
    }

    $sql = "SELECT percorso
            FROM immagini
            WHERE prodotto_id = ? AND is_hero = 1
            LIMIT 1";

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        return null;
    }

    $productId = (int)$productId;
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result ? $result->fetch_assoc() : null;

    if (!empty($row['percorso']) && image_file_exists($row['percorso'])) {
        return $row['percorso'];
    }

    return $productName ? get_product_main_image($productName) : null;
}

function get_product_id_by_name(mysqli $con, $name)
{
    $sql = "SELECT id
            FROM prodotti
            WHERE TRIM(REPLACE(REPLACE(nome, CHAR(13), ''), CHAR(10), '')) = ?
            LIMIT 1";

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        return null;
    }

    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result ? $result->fetch_assoc() : null;

    return isset($row['id']) ? (int)$row['id'] : null;
}

function get_product_name_by_id(mysqli $con, $id)
{
    $sql = "SELECT nome
            FROM prodotti
            WHERE id = ?
            LIMIT 1";

    $stmt = $con->prepare($sql);
    if (!$stmt) {
        return null;
    }

    $id = (int)$id;
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result ? $result->fetch_assoc() : null;

    return isset($row['nome']) ? normalize_product_name($row['nome']) : null;
}

function normalize_product_row(array $product)
{
    if (isset($product['nome'])) {
        $product['nome'] = normalize_product_name($product['nome']);
    }

    return $product;
}

function normalize_product_name($name)
{
    return trim(preg_replace('/\s+/', ' ', (string)$name));
}

function get_product_slug($name)
{
    $slug = strtolower(normalize_product_name($name));
    $slug = preg_replace('/^spectra\s+/', '', $slug);
    $slug = preg_replace('/[^a-z0-9]+/', '', $slug);

    return $slug ?: null;
}

function get_product_image_files($productName)
{
    $slug = get_product_slug($productName);
    if (!$slug) {
        return [];
    }

    static $cache = [];
    if (isset($cache[$slug])) {
        return $cache[$slug];
    }

    $dir = __DIR__ . '/../Immagini';
    $extensions = ['png', 'jpg', 'jpeg', 'webp'];
    $files = [];

    foreach ($extensions as $extension) {
        foreach ([$slug . '*.' . $extension, '!' . $slug . '*.' . $extension] as $pattern) {
            foreach (glob($dir . DIRECTORY_SEPARATOR . $pattern) ?: [] as $path) {
                if (is_file($path)) {
                    $files[] = basename($path);
                }
            }
        }
    }

    $files = array_values(array_unique($files));

    usort($files, function ($left, $right) use ($slug) {
        $leftScore = get_product_image_sort_score($left, $slug);
        $rightScore = get_product_image_sort_score($right, $slug);

        return $leftScore <=> $rightScore ?: strnatcasecmp($left, $right);
    });

    $cache[$slug] = $files;

    return $files;
}

function get_product_image_sort_score($file, $slug)
{
    $name = strtolower(pathinfo($file, PATHINFO_FILENAME));
    $isHero = strpos($name, '!') === 0 ? 1 : 0;
    $name = ltrim($name, '!');
    $number = 999;

    if ($name === $slug) {
        $number = 0;
    } elseif (preg_match('/^' . preg_quote($slug, '/') . '(\d+)$/', $name, $matches)) {
        $number = (int)$matches[1];
    }

    return [$isHero, $number, $name];
}

function get_product_main_image($productName)
{
    $slug = get_product_slug($productName);
    if (!$slug) {
        return '';
    }

    foreach (['png', 'jpg', 'jpeg', 'webp'] as $extension) {
        $candidate = $slug . '.' . $extension;
        if (image_file_exists($candidate)) {
            return $candidate;
        }
    }

    foreach (get_product_image_files($productName) as $file) {
        if (strpos($file, '!') !== 0) {
            return $file;
        }
    }

    return get_product_image_files($productName)[0] ?? '';
}

function get_product_hero_file($productName)
{
    $slug = get_product_slug($productName);
    if (!$slug) {
        return null;
    }

    if ($slug === 'vision' && image_file_exists('!eclipse.png')) {
        return '!eclipse.png';
    }

    foreach (['png', 'jpg', 'jpeg', 'webp'] as $extension) {
        $candidate = '!' . $slug . '2.' . $extension;
        if (image_file_exists($candidate)) {
            return $candidate;
        }
    }

    foreach (['png', 'jpg', 'jpeg', 'webp'] as $extension) {
        $candidate = '!' . $slug . '.' . $extension;
        if (image_file_exists($candidate)) {
            return $candidate;
        }
    }

    foreach (get_product_image_files($productName) as $file) {
        if (strpos($file, '!') === 0) {
            return $file;
        }
    }

    return get_product_main_image($productName) ?: null;
}

function image_file_exists($file)
{
    $file = basename((string)$file);

    return $file !== '' && is_file(__DIR__ . '/../Immagini/' . $file);
}

function is_carousel_image_file($file)
{
    return strpos(basename((string)$file), '!') !== 0;
}

function images_table_has_hero_column(mysqli $con)
{
    static $hasColumn = null;

    if ($hasColumn !== null) {
        return $hasColumn;
    }

    $result = $con->query("SHOW COLUMNS FROM immagini LIKE 'is_hero'");
    $hasColumn = $result && $result->num_rows > 0;

    return $hasColumn;
}
