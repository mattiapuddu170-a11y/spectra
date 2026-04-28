<?php
session_start();

if (isset($_POST['remove_id'])) {
    $removeId = (int)$_POST['remove_id'];

    if (isset($_SESSION['carrello'][$removeId])) {
        unset($_SESSION['carrello'][$removeId]);
    }
}

if (isset($_POST['prodotto_id'])) {
    $id = (int)$_POST['prodotto_id'];
    $nome = trim($_POST['prodotto_name'] ?? '');
    $immagine = trim($_POST['prodotto_image'] ?? '');

    if (!isset($_SESSION['carrello'])) {
        $_SESSION['carrello'] = [];
    }

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

header("Location: carrello.php");
exit();
?>