<!-- #region PHP -->
<?php
session_start();
$con = new mysqli("localhost", "root", "", "negozio_spectra");

if ($con->connect_error) {
    die("Connessione fallita");
}

// richiesta AJAX
if (isset($_GET['ajax']) && isset($_GET['q'])) {

    $q = trim($_GET['q']);
    $q = $con->real_escape_string($q);

    if ($q == "") exit;

    $sql = "SELECT id, nome, prezzo, descrizione
            FROM prodotti
            WHERE nome LIKE '%$q%'
               OR descrizione LIKE '%$q%'
            ORDER BY nome
            LIMIT 5";

    $ris = $con->query($sql);

    if ($ris->num_rows == 0) {
        exit;
    }

    while ($p = $ris->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h2>{$p['nome']}</h2>";
        echo "<p>{$p['descrizione']}</p>";
        echo "<p class='prezzo'>€ " . number_format($p['prezzo'], 2, ',', '.') . "</p>";
        echo "</div>";
    }
    exit;
}
?>
<!-- #endregion -->
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
                <img class="icons" src="Immagini/icons/cart.png" alt="Carrello">
            </a>
            <a href="login.php">
                <img class="icons" src="Immagini/icons/user.png" alt="Utente">
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

</header><hr>

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
                Non hai effettuato l'accesso. <a href="login.php">Accedi</a> per salvare il carrello.
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
