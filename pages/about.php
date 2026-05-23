<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Chi siamo</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css?v=17')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/about.css?v=9')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="about-page">

    <section class="about-section">
        <div class="about-copy">
            <h2>Chi siamo</h2>
            <p>
                Crediamo in un modo nuovo di vivere la tecnologia: pi&ugrave; naturale, pi&ugrave; umano, pi&ugrave; vicino alle persone.
                Spectra nasce con l'obiettivo di superare i limiti tra mondo reale e digitale, trasformando un oggetto quotidiano
                in uno strumento capace di ampliare ci&ograve; che puoi vedere e fare. Non creiamo solo prodotti: creiamo esperienze
                pensate per accompagnarti ogni giorno.
            </p>
        </div>

        <img src="<?php echo e(app_url('Immagini/chi_siamo.png')); ?>" alt="Chi siamo">
    </section>

    <section class="about-section">
        <div class="about-copy">
            <h2>Tecnologia per tutti</h2>
            <p>
                I nostri occhiali intelligenti integrano funzionalit&agrave; avanzate in modo semplice e immediato. Traduzione in tempo
                reale, navigazione aumentata e assistenza vocale lavorano insieme per offrirti supporto continuo, senza distrazioni.
                La tecnologia non deve complicare le cose: deve funzionare, adattarsi e migliorare davvero la tua esperienza.
            </p>
        </div>

        <img src="<?php echo e(app_url('Immagini/chi_siamo2.png')); ?>" alt="Tecnologia per tutti">
    </section>

    <section class="about-section">
        <div class="about-copy">
            <h2>Pi&ugrave; sicurezza</h2>
            <p>
                Controllare continuamente lo smartphone &egrave; diventato un rischio quotidiano. Spectra nasce per cambiare questo.
                Con informazioni sempre visibili e accessibili in modo immediato, puoi muoverti, orientarti e comunicare senza
                distogliere lo sguardo da ci&ograve; che conta davvero. La tecnologia deve aiutarti, non distrarti. E soprattutto,
                deve proteggerti.
            </p>
        </div>

        <img src="<?php echo e(app_url('Immagini/chi_siamo3.png')); ?>" alt="Sicurezza">
    </section>

    <section class="about-legal">
        <h2>Informazioni legali</h2>
        <dl>
            <div>
                <dt>Ragione sociale</dt>
                <dd>Spectra Vision S.r.l.</dd>
            </div>
            <div>
                <dt>Sede legale</dt>
                <dd>Via dell'Innovazione 1, Milano, Italia</dd>
            </div>
            <div>
                <dt>Email</dt>
                <dd>spectraocchiali@tiscali.it</dd>
            </div>
            <div>
                <dt>Registro imprese</dt>
                <dd>Camera di Commercio di Milano</dd>
            </div>
            <div>
                <dt>Numero di registrazione</dt>
                <dd>MI-0000000</dd>
            </div>
            <div>
                <dt>Partita IVA</dt>
                <dd>IT00000000000</dd>
            </div>
        </dl>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
