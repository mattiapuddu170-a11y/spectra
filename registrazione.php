<!-- #region PHP-->
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
$email = strtolower(trim($_POST['email_new'] ?? ''));    $password = trim($_POST['password'] ?? '');

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
?>
<!-- #endregion -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrati</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/login.css">
    <link rel="stylesheet" href="File CSS/footer.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="Immagini/logo.png" alt="Logo">
        </a>
    </header>

    <main class="login">
        <form method="post" action="">
            <h3>REGISTRAZIONE</h3>

            <input type="text" name="nome_new" placeholder="Nome" required><br>
            <input type="text" name="cognome_new" placeholder="Cognome" required><br>
            <input type="email" name="email_new" placeholder="Email" required><br>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>
            <button type="submit" name="invia2">Registrati</button>
            <p style="white-space: nowrap;">Hai gia un account? Accedi <a href="login.php" class="qui">qui</a></p>
        </form>

    
</main>

<footer class="footer">
  <div class="footer-container">

    <div class="footer-section">
      <h2>Spectra</h2>
      <p>Vedi il mondo con stile</p>
    </div>

    <div class="footer-section">
      <h3>Link utili</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="prodotti.php">Shop</a></li>
        <li><a href="chi_siamo.php">Chi Siamo</a></li>
        <li><a href="#">Contatti</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Contatti</h3>
      <p>Email: spectraocchiali@tiscali.it</p>
      <p>Tel: +39 02 0000 0000</p>
      <p>Tel: +39 320 000 0000</p>
      <p>Facebook</p>
      <p>Instagram</p>
      <p>Twitter</p>
      <p>Tik Tok</p>
    </div>

  </div>

  <div class="footer-bottom">
    <p>© 2026 Spectra - Tutti i diritti riservati</p>
  </div>
</footer>

</body>
</html>

<script>
function togglePassword() {
    const pwd = document.getElementById('password');
    pwd.type = pwd.type === 'password' ? 'text' : 'password';
}
</script>