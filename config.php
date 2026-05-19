<?php
$con = new mysqli("localhost", "root", "", "my_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}

$con->set_charset("utf8mb4");
?>
