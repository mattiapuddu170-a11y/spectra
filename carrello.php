<!-- #region PHP -->
<?php
session_start();

include "config.php";

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
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrello</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/carrstyle.css">
</head>
<body>

<?php include "header.php"; ?>

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
                <a class="linkdiv" style="background: #c41e3a; color: white;" href="pagamento.php">💳 Vai al Pagamento</a>
            <?php endif; ?>
            <a class="linkdiv" href="index.php">Torna alla home</a>
        </div>
    </section>
</main>

<?php include "footer.php"; ?>


</body>
</html>
