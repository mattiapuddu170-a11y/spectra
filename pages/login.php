<?php
$loginError = get_flash('login_error');
$loginSuccess = get_flash('login_success');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Accedi</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/login.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <main class="login">
        <?php if (isset($_SESSION['nome'])): ?>
            <div class="login-success">
                <h3>Utente riconosciuto</h3>
                <p>Hai effettuato l'accesso come <b><?php echo e($_SESSION['nome'] . (isset($_SESSION['cognome']) ? ' ' . $_SESSION['cognome'] : '')); ?></b>.</p>
                <div class="action-buttons">
                    <a class="linkdiv" href="<?php echo e(app_url('index.php')); ?>">Torna alla home</a>
                    <a class="linkdiv" href="<?php echo e(app_url('logout.php')); ?>">Logout</a>
                </div>
            </div>
        <?php else: ?>
        <form method="post" action="<?php echo e(app_url('actions/login_action.php')); ?>">
            <h3>LOGIN</h3>

            <?php if ($loginSuccess): ?>
                <p class="form-message success"><?php echo e($loginSuccess); ?></p>
            <?php endif; ?>

            <?php if ($loginError): ?>
                <p class="form-message error"><?php echo e($loginError); ?></p>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" required><br>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button class="toggle-password" type="button" onclick="togglePassword()" aria-label="Mostra password">👁️</button>
            </div>
            <button type="submit" name="login">Accedi</button>
            <p>Non hai un account? Registrati <a href="<?php echo e(app_url('registrazione.php')); ?>" class="qui">qui</a></p>
            <a href="<?php echo e(app_url('index.php')); ?>">Indietro</a>
        </form>

        <?php endif; ?>
        </main>

<script src="<?php echo e(app_url('js/password.js')); ?>"></script>
</body>
</html>
