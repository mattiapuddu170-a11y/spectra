<?php
require_once __DIR__ . '/../includes/product_queries.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 0;
$product = $id > 0 ? get_product_by_id($con, $id) : null;
$imageRows = $product ? get_product_images($con, $id) : [];
$images = array_column($imageRows, 'percorso');
$heroImage = $product ? get_product_hero_image($con, $id) : null;
$cartImage = $images[0] ?? $heroImage ?? '';

$quickFeatures = [
    'Audio integrato',
    'Controlli touch',
    'Assistente AI',
    'Design leggero',
];

$specs = [
    'Autonomia' => 'Fino a 24 ore con custodia',
    'Connessione' => 'Bluetooth e app Spectra',
    'Comandi' => 'Touch laterale e voce',
    'Materiale' => 'Montatura leggera rinforzata',
    'Compatibilita' => 'iOS e Android',
    'Garanzia' => '24 mesi',
];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product ? e($product['nome']) : 'Prodotto'; ?></title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css?v=17')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/occhiale.css?v=7')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>

<section class="hero">

    <div class="sinistra">

        <?php if ($product && !empty($images)): ?>

        <div class="carosello">

            <?php foreach ($images as $img): ?>
                <div class="mySlides fade">
                    <img src="<?php echo e(app_url('Immagini/' . $img)); ?>"
                         alt="<?php echo e($product['nome']); ?>">
                </div>
            <?php endforeach; ?>

            <?php if (count($images) > 1): ?>
                <button class="prev" type="button" onclick="plusSlides(-1)">&#10094;</button>
                <button class="next" type="button" onclick="plusSlides(1)">&#10095;</button>
            <?php endif; ?>

        </div>

        <?php else: ?>

        <div class="prodotto-non-trovato">
            <h1>Prodotto non trovato</h1>
            <p><a href="<?php echo e(app_url('prodotti.php')); ?>">Torna alla pagina prodotti</a></p>
        </div>

        <?php endif; ?>

    </div>

    <div class="destra">

        <div class="info-prodotto">
            <?php if ($product): ?>
                <span class="product-label">Disponibile ora</span>

                <h1><?php echo e($product['nome']); ?></h1>

                <p class="prezzo">
                    &euro; <?php echo format_price($product['prezzo']); ?>
                </p>

                <p>
                    <?php echo nl2br(e($product['descrizione'])); ?>
                </p>

                <div class="quick-features">
                    <?php foreach ($quickFeatures as $feature): ?>
                        <span><?php echo e($feature); ?></span>
                    <?php endforeach; ?>
                </div>

                <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>">
                    <input type="hidden" name="prodotto_id" value="<?php echo e($product['id']); ?>">
                    <input type="hidden" name="prodotto_name" value="<?php echo e($product['nome']); ?>">
                    <input type="hidden" name="prodotto_image" value="<?php echo e('Immagini/' . $cartImage); ?>">
                    <button type="submit">Acquista ora</button>
                </form>

                <div class="buy-notes">
                    <div>
                        <strong>Spedizione gratuita</strong>
                        <span>Consegna stimata in 2-4 giorni lavorativi.</span>
                    </div>
                    <div>
                        <strong>Reso semplice</strong>
                        <span>Puoi ripensarci entro 14 giorni.</span>
                    </div>
                    <div>
                        <strong>Pagamento sicuro</strong>
                        <span>Il carrello usa la tua sessione in modo protetto.</span>
                    </div>
                </div>
            <?php else: ?>
                <h1>Prodotto non trovato</h1>
                <p>Il prodotto richiesto non &egrave; disponibile.</p>
            <?php endif; ?>
        </div>

    </div>

</section>

<?php if ($product): ?>
<section class="product-story">
    <div class="story-text">
        <span class="section-label">Esperienza Spectra</span>
        <h2>Pensati per muoverti senza perdere il contatto con il mondo.</h2>
        <p>
            <?php echo e($product['nome']); ?> unisce stile quotidiano e funzioni smart essenziali:
            audio, notifiche, assistenza vocale e comandi immediati, senza dover tirare fuori lo smartphone ogni volta.
        </p>
    </div>

    <div class="story-grid">
        <article>
            <h3>Pi&ugrave; libert&agrave;</h3>
            <p>Ricevi informazioni utili mentre cammini, lavori o ti alleni.</p>
        </article>
        <article>
            <h3>Meno distrazioni</h3>
            <p>Controlli rapidi e discreti, pensati per non interrompere quello che stai facendo.</p>
        </article>
        <article>
            <h3>Stile pulito</h3>
            <p>Una montatura essenziale che resta facile da indossare ogni giorno.</p>
        </article>
    </div>
</section>

<section class="details-section">
    <div class="details-block">
        <h2>Specifiche</h2>
        <dl class="spec-list">
            <?php foreach ($specs as $label => $value): ?>
                <div>
                    <dt><?php echo e($label); ?></dt>
                    <dd><?php echo e($value); ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </div>

    <div class="details-block">
        <h2>Nella confezione</h2>
        <ul class="package-list">
            <li><?php echo e($product['nome']); ?></li>
            <li>Custodia protettiva</li>
            <li>Cavo di ricarica</li>
            <li>Panno per la pulizia</li>
            <li>Guida rapida</li>
        </ul>
    </div>
</section>
<?php endif; ?>

<?php if ($heroImage): ?>
<div class="hero-image-large">

    <img src="<?php echo e(app_url('Immagini/' . $heroImage)); ?>"
         alt="<?php echo e($product['nome']); ?>">

</div>
<?php endif; ?>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
