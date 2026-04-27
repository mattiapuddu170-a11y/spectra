<?php
session_start();

if (isset($_POST['prodotto_id'])) {
    $id = (int)$_POST['prodotto_id'];

    if (!isset($_SESSION['carrello'])) {
        $_SESSION['carrello'] = [];
    }

    if (isset($_SESSION['carrello'][$id])) {
        $_SESSION['carrello'][$id]++;
    } else {
        $_SESSION['carrello'][$id] = 1;
    }
}

header("Location: carrello_view.php");
exit();
?>