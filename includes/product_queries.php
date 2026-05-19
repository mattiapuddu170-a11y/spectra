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

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function get_all_products_with_main_image(mysqli $con)
{
    $sql = "SELECT p.id, p.nome, p.prezzo, p.descrizione, MIN(i.percorso) AS percorso
            FROM prodotti p
            LEFT JOIN immagini i ON p.id = i.prodotto_id
            GROUP BY p.id, p.nome, p.prezzo, p.descrizione
            ORDER BY p.id";

    $result = $con->query($sql);

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
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

    return $result ? $result->fetch_assoc() : null;
}

function get_product_images(mysqli $con, $productId)
{
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

    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function get_product_hero_image(mysqli $con, $productId)
{
    if (!images_table_has_hero_column($con)) {
        return null;
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

    return $row['percorso'] ?? null;
}

function get_product_id_by_name(mysqli $con, $name)
{
    $sql = "SELECT id FROM prodotti WHERE nome = ? LIMIT 1";

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
