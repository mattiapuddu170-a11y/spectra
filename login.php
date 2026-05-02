<!-- #region PHP -->
<?php
session_start();

$con = new mysqli("localhost", "root", "", "negozio_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
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
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/login.css">
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
                <p>Hai effettuato l'accesso come <b><?php echo htmlspecialchars($_SESSION['nome'] . (isset($_SESSION['cognome']) ? ' ' . $_SESSION['cognome'] : '')); ?></b>.</p>
                <div class="action-buttons">
                    <a class="linkdiv" href="index.php">Torna alla home</a>
                    <a class="linkdiv" href="logout.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
        <form method="post" action="">
            <h3>LOGIN</h3>

            <input type="email" name="email" placeholder="Email" required><br>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>
            <button type="submit" name="login">Accedi</button>
            <p>Non hai un account? Registrati <a href="registrazione.php" class="qui">qui</a></p>
        </form>

        <?php endif; ?>
        </main>
    
</body>
</html>

<script>
function togglePassword() {
    const pwd = document.getElementById('password');
    pwd.type = pwd.type === 'password' ? 'text' : 'password';
}
</script>