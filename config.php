<?php
$con = new mysqli("localhost", "root", "", "negozio_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}
?>