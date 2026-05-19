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
    <title>Homepage</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/index.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>
    <section class="hero">
        <img src="<?php echo e(app_url('Immagini/logo.png')); ?>" alt="Spectra">
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus impedit explicabo magnam eaque rem nam nostrum perspiciatis nulla consequuntur debitis.</h2>
    </section>

    <section class="vetrina">

        <div class="vetrina-div">
            <div class="immagine">
                <img src="<?php echo e(app_url('Immagini/!vision.png')); ?>" alt="Spectra Vision">
            </div>

            <div class="info">
                <h1>Spectra Vision</h1>
                <h2>€ 250,00</h2>
                <p>Gli Spectra Vision sono occhiali smart dal design moderno e raffinato, pensati per chi vive la città in movimento, offrendoti un'esperienza connessa e intuitiva mentre hai sempre lo sguardo sul mondo che ti circonda.</p>
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
                <h2>€ 350,00</h2>
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
                <h2>€ 300,00</h2>
                <p>Spectra Nexus sono occhiali smart dal design elegante e minimalista, con telecamera integrata, microfono, casse a conduzione ossea e lenti che mostrano informazioni direttamente nel campo visivo.</p>
                <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['nexus'])); ?>" class="button">Acquista ora</a>
            </div>
        </div>

    </section>

    <section class="features">

        <div class="features-row">
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>

            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>

            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
        </div>

        <div class="features-row">
            <article class="features-box">
                <h1>Fino a 24 ore di riproduzione continua con la ricarica rapida</h1>
                <p>Risparmio energetico intelligente per una durata superiore della batteria</p>
            </article>

            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
        </div>

    </section>

    <section class="prodotti">

        <article class="prod">
            <a href="<?php echo e(app_url('occhiale.php?id=' . $featuredIds['vision'])); ?>" class="prod-link">
                <img src="<?php echo e(app_url('Immagini/vision.png')); ?>" alt="Spectra Vision">
                <div class="descdiv">
                    <h2>Spectra Vision</h2>
                    <h3>€ 450,00</h3>
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
                    <h3>€ 450,00</h3>
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
                    <h3>€ 450,00</h3>
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
