<?php
$cartItems = $_SESSION['carrello'] ?? [];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Carrello</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/carrstyle.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="carrello-container">
    <section class="carrello-box">
        <div class="page-heading">
            <h1>Carrello</h1>
            <p>Controlla i prodotti aggiunti e gestisci il tuo ordine.</p>
        </div>

        <?php if (isset($_SESSION['nome'])): ?>
            <div class="welcome-card">
                Benvenuto <b><?php echo e($_SESSION['nome'] . (isset($_SESSION['cognome']) ? ' ' . $_SESSION['cognome'] : '')); ?></b>
            </div>
        <?php else: ?>
            <div class="welcome-card empty">
                Non hai effettuato l'accesso. <a href="<?php echo e(app_url('login.php')); ?>">Accedi</a> per salvare il carrello.
            </div>
        <?php endif; ?>

        <?php if (!empty($cartItems)): ?>
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
                        <?php foreach ($cartItems as $item): ?>
                            <tr>
                                <td>
                                    <span><?php echo e($item['name'] ?: 'Prodotto'); ?></span>
                                </td>
                                <td><?php echo e($item['qty']); ?></td>
                                <td>
                                    <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>">
                                        <input type="hidden" name="remove_id" value="<?php echo e($item['id']); ?>">
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
            <?php if (!empty($cartItems)): ?>
                <a class="linkdiv payment-link" href="<?php echo e(app_url('pagamento.php')); ?>">Vai al Pagamento</a>
            <?php endif; ?>
            <a class="linkdiv" href="<?php echo e(app_url('index.php')); ?>">Torna alla home</a>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
