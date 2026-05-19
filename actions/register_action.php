<?php

require_once __DIR__ . '/../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to('registrazione.php');
}

$nome = trim($_POST['nome_new'] ?? '');
$cognome = trim($_POST['cognome_new'] ?? '');
$email = strtolower(trim($_POST['email_new'] ?? ''));
$password = trim($_POST['password'] ?? '');

if ($nome === '' || $cognome === '' || $email === '' || $password === '') {
    set_flash('register_error', 'Completa tutti i campi per la registrazione.');
    redirect_to('registrazione.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_flash('register_error', 'Inserisci un indirizzo email valido.');
    redirect_to('registrazione.php');
}

$checkSql = "SELECT id FROM utenti WHERE email = ? LIMIT 1";
$checkStmt = $con->prepare($checkSql);

if (!$checkStmt) {
    set_flash('register_error', 'Errore durante la registrazione. Riprova.');
    redirect_to('registrazione.php');
}

$checkStmt->bind_param('s', $email);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult && $checkResult->num_rows > 0) {
    set_flash('register_error', 'Questa email è già registrata.');
    redirect_to('registrazione.php');
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$insertSql = "INSERT INTO utenti (nome, cognome, email, password)
              VALUES (?, ?, ?, ?)";
$insertStmt = $con->prepare($insertSql);

if (!$insertStmt) {
    set_flash('register_error', 'Errore durante la registrazione. Riprova.');
    redirect_to('registrazione.php');
}

$insertStmt->bind_param('ssss', $nome, $cognome, $email, $passwordHash);

if (!$insertStmt->execute()) {
    set_flash('register_error', 'Errore registrazione: ' . $con->error);
    redirect_to('registrazione.php');
}

set_flash('login_success', 'Registrazione completata. Ora puoi accedere.');
redirect_to('login.php');
