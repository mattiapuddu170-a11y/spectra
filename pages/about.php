<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="<?php echo e(app_url('css/stile.css?v=7')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_url('css/about.css?v=7')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>

    <div class="pres">
        <h2>Chi Siamo</h2>
        <p>
            Crediamo in un modo nuovo di vivere la tecnologia: più naturale, più umano, più vicino alle persone.<br>
            Spectra nasce con l'obiettivo di superare i limiti tra mondo reale e digitale, trasformando un oggetto<br>
            quotidiano in uno strumento capace di ampliare ciò che puoi vedere e fare.<br>
            Non creiamo solo prodotti.<br>
            Creiamo esperienze pensate per accompagnarti ogni giorno.
        </p>

        <img src="<?php echo e(app_url('Immagini/chi_siamo.png')); ?>" alt="Chi siamo">
    </div>

    <div class="pres">
        <h2>Tecnologia per tutti</h2>
        <p>
            I nostri occhiali intelligenti integrano funzionalità avanzate in modo semplice e immediato.<br>
            Traduzione in tempo reale, navigazione aumentata e assistenza vocale lavorano insieme per offrirti
            supporto continuo, senza distrazioni.<br>
            La tecnologia non deve complicare le cose.<br>
            Deve funzionare, adattarsi e migliorare davvero la tua esperienza.
        </p>
        <img src="<?php echo e(app_url('Immagini/chi_siamo2.png')); ?>" alt="Tecnologia per tutti">
    </div>

    <div class="pres">
        <h2>Più sicurezza</h2>
        <p>
            Controllare continuamente lo smartphone è diventato un rischio quotidiano.<br>
            Spectra nasce per cambiare questo.<br>
            Con informazioni sempre visibili e accessibili in modo immediato, puoi muoverti,<br>
            orientarti e comunicare senza distogliere lo sguardo da ciò che conta davvero.<br>
            La tecnologia deve aiutarti, non distrarti.<br>
            E soprattutto, deve proteggerti.
        </p>

        <img src="<?php echo e(app_url('Immagini/chi_siamo3.png')); ?>" alt="Sicurezza">
    </div>

    <div class="pres">
        <h2>INFORMAZIONI LEGALI</h2>
        <p>
           Ragione sociale: Spectra Vision S.r.l.<br>
           Sede legale: Via dell'Innovazione 1, Milano, Italia<br>
           Email: spectraocchiali@tiscali.it<br>
           Registro imprese: Camera di Commercio di Milano<br>
           Numero di registrazione: MI-0000000<br>
           Partita IVA: IT00000000000
        </p>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
