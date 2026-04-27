<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Carrello</title>
    <link rel="stylesheet" href="File CSS/carrstyle.css">
</head>
<body>
<header>
    <img id="logo" src="Immagini/logo.png" alt="Logo">
    <div class="icons-group">
        <a href="index.php"><img class="icons" src="Immagini/cart.png" alt="Carrello"></a>
        <a href="login.php"><img class="icons" src="Immagini/user.png" alt="Utente"></a>
    </div>
</header>
<main class="carrello-container">
    <section class="carrello-box">
        <div class="page-heading">
            <h1>Carrello</h1>
            <p>Controlla i prodotti aggiunti e gestisci il tuo ordine.</p>
        </div>

        <?php if (isset($_SESSION['nome'])): ?>
            <div class="welcome-card">
                <strong>Benvenuto</strong> <?php echo htmlspecialchars($_SESSION['nome'] . (isset($_SESSION['cognome']) ? ' ' . $_SESSION['cognome'] : '')); ?>
            </div>
        <?php else: ?>
            <div class="welcome-card empty">
                Non sei loggato. <a href="login.php">Accedi</a> per salvare il carrello.
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['carrello'])): ?>
            <div class="carrello-table-wrapper">
                <table class="carrello-table">
                    <thead>
                        <tr>
                            <th>Prodotto ID</th>
                            <th>Quantità</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrello'] as $id => $qty): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($id); ?></td>
                                <td><?php echo htmlspecialchars($qty); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="carrello-empty">
                <p>Il tuo carrello è vuoto.</p>
            </div>
        <?php endif; ?>

        <div class="carrello-actions">
            <a class="linkdiv" href="index.php">Torna alla home</a>
            <?php if (isset($_SESSION['nome'])): ?>
                <a class="linkdiv" href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
    </section>
</main>
</body>
</html>
