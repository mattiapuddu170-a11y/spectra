<?php
$con = new mysqli("localhost", "root", "", "my_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}
?>