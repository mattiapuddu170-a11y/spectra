<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Carrello</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/carrstyle.css">
</head>
<body>

<header>
        <button class="hamburger-btn" id="hamburgerBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <a href="index.php" class="logo">
            <img src="Immagini/logo.png" alt="Logo">
        </a>
        

        <div class="icons-group">
            <a href="carrello.php">
                <img class="icons" src="Immagini/cart.png" alt="Carrello">
            </a>
            <a href="login.php">
                <img class="icons" src="Immagini/user.png" alt="Utente">
            </a>
        </div>

        <div class="menu-nav search-container">
            <div class="box">
                <input type="text" id="search" placeholder="Cerca prodotti...">
            </div>
            <div id="risultati"></div>
        </div>

        <script src="File JS/ricerca.js"></script>
        <script src="File JS/menu.js"></script>

</header>

<aside class="sidebar" id="sidebar">
    <a href="index.php">Home</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="chi_siamo.html">Chi Siamo</a>
    <a href="#contatti">Contatti</a>

</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main class="carrello-container">
    <section class="carrello-box">
        <div class="page-heading">
            <h1>Carrello</h1>
            <p>Controlla i prodotti aggiunti e gestisci il tuo ordine.</p>
        </div>

        <?php if (isset($_SESSION['nome'])): ?>
            <div class="welcome-card">
                Benvenuto <b><?php echo htmlspecialchars($_SESSION['nome'] . (isset($_SESSION['cognome']) ? ' ' . $_SESSION['cognome'] : '')); ?></b>
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
                            <th>Prodotto</th>
                            <th>Quantità</th>
                            <th>Azione</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrello'] as $item): ?>
                            <tr>
                                <td>
                                    <span><?php echo htmlspecialchars($item['name'] ?: 'Prodotto'); ?></span>
                                </td>
                                <td><?php echo htmlspecialchars($item['qty']); ?></td>
                                <td>
                                    <form method="post" action="carrello_sessione.php">
                                        <input type="hidden" name="remove_id" value="<?php echo htmlspecialchars($item['id']); ?>">
                                        <button class="linkdiv remove-button" type="submit">Rimuovi</button>
                                    </form>
                                </td>
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
            <?php if (!empty($_SESSION['carrello'])): ?>
                <a class="linkdiv" style="background: #c41e3a; color: white; padding: 10px 20px; border-radius: 4px; display: inline-block;" href="pagamento.php">💳 Vai al Pagamento</a>
            <?php endif; ?>
            <a class="linkdiv" href="index.php">Torna alla home</a>
        </div>
    </section>
</main>
</body>
</html>
