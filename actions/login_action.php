<?php

require_once __DIR__ . '/../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to('login.php');
}

$email = strtolower(trim($_POST['email'] ?? ''));
$password = trim($_POST['password'] ?? '');

if ($email === '' || $password === '') {
    set_flash('login_error', 'Inserisci email e password.');
    redirect_to('login.php');
}

$sql = "SELECT id, nome, cognome, email, password
        FROM utenti
        WHERE email = ?
        LIMIT 1";

$stmt = $con->prepare($sql);

if (!$stmt) {
    set_flash('login_error', 'Errore durante il login. Riprova.');
    redirect_to('login.php');
}

$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result ? $result->fetch_assoc() : null;

if (!$user || !password_verify($password, $user['password'])) {
    set_flash('login_error', 'Email o password errati.');
    redirect_to('login.php');
}

$_SESSION['nome'] = $user['nome'];
$_SESSION['cognome'] = $user['cognome'];
$_SESSION['email'] = $user['email'];

if ($user['email'] === 'admin') {
    redirect_to('admin.php');
}

redirect_to('login.php');
