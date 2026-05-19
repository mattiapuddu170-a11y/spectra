<?php
$registerError = get_flash('register_error');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrati</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css?v=7')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/login.css?v=7')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <main class="login">
        <form method="post" action="<?php echo e(app_url('actions/register_action.php')); ?>">
            <h3>REGISTRAZIONE</h3>

            <?php if ($registerError): ?>
                <p class="form-message error"><?php echo e($registerError); ?></p>
            <?php endif; ?>

            <input type="text" name="nome_new" placeholder="Nome" required><br>
            <input type="text" name="cognome_new" placeholder="Cognome" required><br>
            <input type="email" name="email_new" placeholder="Email" required><br>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button class="toggle-password" type="button" onclick="togglePassword()" aria-label="Mostra password">👁️</button>
            </div>
            <button type="submit" name="invia2">Registrati</button>
            <p class="login-note">Hai già un account? Accedi <a href="<?php echo e(app_url('login.php')); ?>" class="qui">qui</a></p>
            <a href="<?php echo e(app_url('index.php')); ?>">Indietro</a>
        </form>

    </main>

<script src="<?php echo e(app_url('js/password.js')); ?>"></script>
</body>
</html>
