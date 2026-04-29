<!-- #region PHP -->
<?php
session_start();

$con = new mysqli("localhost", "root", "", "negozio_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}

// -------------------- REGISTRAZIONE --------------------
if (isset($_POST['invia2'])) {
    $nome = trim($con->real_escape_string($_POST['nome_new'] ?? ''));
    $cognome = trim($con->real_escape_string($_POST['cognome_new'] ?? ''));
    $email = trim($con->real_escape_string($_POST['email_new'] ?? ''));
    $password = trim($_POST['password_new'] ?? '');

    if ($nome === '' || $cognome === '' || $email === '' || $password === '') {
        echo "Completa tutti i campi per la registrazione.";
    } else {
        $check = $con->query("SELECT id FROM utenti WHERE email='$email' LIMIT 1");

        if ($check && $check->num_rows > 0) {
            echo "Questa email è già registrata.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO utenti (nome, cognome, email, password)
                    VALUES ('$nome', '$cognome', '$email', '$passwordHash')";

            if ($con->query($sql)) {
                header("Location: login.php");
                exit();
            } else {
                echo "Errore registrazione: " . $con->error;
            }
        }
    }
}

// -------------------- LOGIN --------------------
if (isset($_POST['login'])) {
    $email = trim($con->real_escape_string($_POST['email'] ?? ''));
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        echo "Inserisci email e password.";
    } else {
        $sql = "SELECT * FROM utenti WHERE email='$email' LIMIT 1";
        $ris = $con->query($sql);

        if ($ris && $ris->num_rows > 0) {
            $row = $ris->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                $_SESSION['email'] = $row['email'];

                if ($row['email'] === 'admin') {
                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: login.php");
                    exit();
                }
            } else {
                echo "Email o password errati.";
            }
        } else {
            echo "Utente non trovato.";
        }
    }
}
?>
<!-- #endregion -->

<!DOCTYPE html>
<html>
<head>
    <title>Accedi</title>
    <link rel="stylesheet" href="File CSS/login.css">
    <link rel="stylesheet" href="File CSS/stile.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="Immagini/logo.png" alt="Logo">
        </a>
    </header>

    <main class="login">
        <?php if (isset($_SESSION['nome'])): ?>
            <div class="login-success">
                <h3>Utente riconosciuto</h3>
                <p>Sei loggato con successo come <b><?php echo htmlspecialchars($_SESSION['nome'] . (isset($_SESSION['cognome']) ? ' ' . $_SESSION['cognome'] : '')); ?></b>.</p>
                <div class="action-buttons">
                    <a class="linkdiv" href="index.php">Torna alla home</a>
                    <a class="linkdiv" href="logout.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
        <form method="post" action="">
            <h3>LOGIN</h3>

            <input type="email" name="email" placeholder="email" required><br>
            <input type="password" name="password" placeholder="password" required><br>

            <button type="submit" name="login">Accedi</button>
        </form>

        <br><hr>

        <form method="post" action="">
            <h3>REGISTRAZIONE</h3>

            <input type="text" name="nome_new" placeholder="nome" required><br>
            <input type="text" name="cognome_new" placeholder="cognome" required><br>
            <input type="email" name="email_new" placeholder="email" required><br>
            <input type="password" name="password_new" placeholder="password" required><br>

            <button type="submit" name="invia2">Crea utente</button>
        </form>

        <?php endif; ?>
    </div>
    
</body>
</html>