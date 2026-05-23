<?php
require_once __DIR__ . '/../includes/product_queries.php';

$featuredIds = [
    'vision' => get_product_id_by_name($con, 'Spectra Vision') ?? 1,
    'athletic' => get_product_id_by_name($con, 'Spectra Athletic') ?? 2,
    'nexus' => get_product_id_by_name($con, 'Spectra Nexus') ?? 3,
];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Spectra</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css?v=17')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/index.css?v=9')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>
    <section class="hero">
        <div class="hero-copy">
            <img src="<?php echo e(app_url('Immagini/logo.png')); ?>" alt="Spectra">
            <h1>Occhiali smart per restare nel mondo.</h1>
            <h2>Design essenziale, audio integrato, notifiche rapide e funzioni intelligenti pensate per muoverti senza distrazioni.</h2>
            <div class="hero-actions">
                <a href="<?php echo e(app_url('prodotti.php')); ?>" class="button">Scopri i modelli</a>
                <a href="<?php echo e(app_url('chi_siamo.php')); ?>" class="button button-secondary">Chi siamo</a>
            </div>
        </div>

        <div class="hero-visual">
            <img src="<?php echo e(app_url('Immagini/!nexus2.png')); ?>" alt="Spectra Nexus">
            <div class="hero-stat">
                <strong>24h</strong>
                <span>di autonomia con custodia e ricarica rapida.</span>
            </div>
        </div>
    </section>

    <section class="vetrina">
        <div class="vetrina-div">
            <div class="immagine">
                <img src="<?php echo e(app_url('Immagini/!eclipse.png')); ?>" alt="Spectra Eclipse">
            </div>

            <div class="info">
                <h1>Spectra Vision</h1>
                <h2>&euro; 250,00</h2>
                <p>Gli Spectra Vision sono occhiali smart dal design moderno e raffinato, pensati per chi vive la citt&agrave; in movimento, offrendoti un'esperienza connessa e intuitiva mentre hai sempre lo sguardo sul mondo che ti circonda.</p>
                <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['vision'])); ?>" class="button">Acquista ora</a>
            </div>
        </div>
    </section>

    <section class="vetrina reverse">
        <div class="vetrina-div">
            <div class="immagine">
                <img src="<?php echo e(app_url('Immagini/!athletic.png')); ?>" alt="Spectra Athletic">
            </div>

            <div class="info">
                <h1>Spectra Athletic</h1>
                <h2>&euro; 350,00</h2>
                <p>La corsa, evoluta: informazioni essenziali davanti ai tuoi occhi, musica sempre con te e un'esperienza senza distrazioni che migliora ogni allenamento.</p>
                <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['athletic'])); ?>" class="button">Acquista ora</a>
            </div>
        </div>
    </section>

    <section class="vetrina">
        <div class="vetrina-div">
            <div class="immagine">
                <img src="<?php echo e(app_url('Immagini/!nexus.png')); ?>" alt="Spectra Nexus">
            </div>

            <div class="info">
                <h1>Spectra Nexus</h1>
                <h2>&euro; 300,00</h2>
                <p>Spectra Nexus sono occhiali smart dal design elegante e minimalista, con telecamera integrata, microfono, casse a conduzione ossea e lenti che mostrano informazioni direttamente nel campo visivo.</p>
                <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['nexus'])); ?>" class="button">Acquista ora</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="features-row">
            <article class="features-box">
                <h1>Audio integrato a conduzione ossea</h1>
                <p>Ascolti chiamate e contenuti senza isolarti dall'ambiente.</p>
            </article>

            <article class="features-box">
                <h1>Notifiche nel campo visivo</h1>
                <p>Le informazioni essenziali arrivano al momento giusto.</p>
            </article>

            <article class="features-box">
                <h1>Controlli rapidi e naturali</h1>
                <p>Touch laterale e voce per gestire tutto con meno passaggi.</p>
            </article>
        </div>

        <div class="features-row">
            <article class="features-box">
                <h1>Fino a 24 ore con la custodia di ricarica</h1>
                <p>Risparmio energetico intelligente per una durata superiore della batteria.</p>
            </article>

            <article class="features-box">
                <h1>Montature leggere, pronte ogni giorno</h1>
                <p>Materiali resistenti e linee pulite per lavoro, viaggio e sport.</p>
            </article>
        </div>
    </section>

    <section class="prodotti">
        <article class="prod">
            <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['vision'])); ?>" class="prod-link">
                <img src="<?php echo e(app_url('Immagini/vision.png')); ?>" alt="Spectra Vision">
                <div class="descdiv">
                    <h2>Spectra Vision</h2>
                    <h3>&euro; 450,00</h3>
                    <p>Acquista subito Spectra Vision</p>
                </div>
            </a>

            <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>" class="product-form">
                <input type="hidden" name="prodotto_id" value="<?php echo e($featuredIds['vision']); ?>">
                <input type="hidden" name="prodotto_name" value="Spectra Vision">
                <input type="hidden" name="prodotto_image" value="Immagini/vision.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['athletic'])); ?>" class="prod-link">
                <img src="<?php echo e(app_url('Immagini/athletic.png')); ?>" alt="Spectra Athletic">
                <div class="descdiv">
                    <h2>Spectra Athletic</h2>
                    <h3>&euro; 450,00</h3>
                    <p>Acquista subito Spectra Athletic</p>
                </div>
            </a>

            <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>" class="product-form">
                <input type="hidden" name="prodotto_id" value="<?php echo e($featuredIds['athletic']); ?>">
                <input type="hidden" name="prodotto_name" value="Spectra Athletic">
                <input type="hidden" name="prodotto_image" value="Immagini/athletic.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['nexus'])); ?>" class="prod-link">
                <img src="<?php echo e(app_url('Immagini/nexus.png')); ?>" alt="Spectra Nexus">
                <div class="descdiv">
                    <h2>Spectra Nexus</h2>
                    <h3>&euro; 450,00</h3>
                    <p>Acquista subito Spectra Nexus</p>
                </div>
            </a>

            <form method="post" action="<?php echo e(app_url('actions/cart_action.php')); ?>" class="product-form">
                <input type="hidden" name="prodotto_id" value="<?php echo e($featuredIds['nexus']); ?>">
                <input type="hidden" name="prodotto_name" value="Spectra Nexus">
                <input type="hidden" name="prodotto_image" value="Immagini/nexus.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
