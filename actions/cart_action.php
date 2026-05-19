<?php

require_once __DIR__ . '/../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to('carrello.php');
}

if (!isset($_SESSION['carrello'])) {
    $_SESSION['carrello'] = [];
}

if (isset($_POST['remove_id'])) {
    $removeId = (int)$_POST['remove_id'];

    if (isset($_SESSION['carrello'][$removeId])) {
        unset($_SESSION['carrello'][$removeId]);
    }
}

if (isset($_POST['prodotto_id'])) {
    $id = (int)$_POST['prodotto_id'];
    $nome = trim(strip_tags($_POST['prodotto_name'] ?? ''));
    $immagine = trim(strip_tags($_POST['prodotto_image'] ?? ''));

    if ($id > 0) {
        if (isset($_SESSION['carrello'][$id])) {
            $_SESSION['carrello'][$id]['qty']++;
        } else {
            $_SESSION['carrello'][$id] = [
                'id' => $id,
                'name' => $nome,
                'image' => $immagine,
                'qty' => 1,
            ];
        }
    }
}

redirect_to('carrello.php');
