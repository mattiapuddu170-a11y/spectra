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

$products = [
    'vision' => [
        'nome' => 'Spectra Vision',
        'prezzo' => 450.00,
        'descrizione' => "Occhiali dallo stile elegante con montatura leggera e lenti anti-riflesso.",
        'immagine'  => 'vision.png',
        '!immagine' => '!vision.png',
        'immagine2' => 'vision2.png',
        'immagine3' => 'vision3.png',
        'immagine4' => 'vision4.png',
        'immagine5' => 'vision5.png',
    ],
    'athletic' => [
        'nome' => 'Spectra Athletic',
        'prezzo' => 450.00,
        'descrizione' => "Design sportivo, perfetto per l'attività all'aperto e per chi cerca comfort tutto il giorno.",
        'immagine'  => 'athletic.png',
        '!immagine' => '!athletic.png',
        'immagine2' => 'athletic2.png',
        'immagine3' => 'athletic3.png',
        'immagine4' => 'athletic4.png',
        'immagine5' => 'athletic5.png',
    ],
    'nexus' => [
        'nome' => 'Spectra Nexus',
        'prezzo' => 450.00,
        'descrizione' => "Look moderno con dettagli di qualità, ideale per chi vuole un tocco di carattere.",
        'immagine'  => 'nexus.png',
        '!immagine' => '!nexus.png',
        'immagine2' => 'nexus2.png',
        'immagine3' => 'nexus3.png',
        'immagine4' => 'nexus4.png',
        'immagine5' => 'nexus5.png',
    ],
    'mirage' => [
        'nome' => 'Spectra Mirage',
        'prezzo' => 450.00,
        'descrizione' => "Montatura sofisticata e finiture lucide per un effetto di grande impatto.",
        'immagine'  => 'mirage.png',
        '!immagine' => '!mirage.png',
        'immagine2' => 'mirage2.png',
        'immagine3' => 'mirage3.png',
        'immagine4' => 'mirage4.png',
        'immagine5' => 'mirage5.png',
    ],
    'eclipse' => [
        'nome' => 'Spectra Eclipse',
        'prezzo' => 450.00,
        'descrizione' => "Stile contemporaneo e linee pulite, perfetto per un look urbano raffinato.",
        'immagine'  => 'eclipse.png',
        '!immagine' => '!eclipse.png',
        'immagine2' => 'eclipse2.png',
        'immagine3' => 'eclipse3.png',
        'immagine4' => 'eclipse4.png',
        'immagine5' => 'eclipse5.png',
    ],
    'horizon' => [
        'nome' => 'Spectra Horizon',
        'prezzo' => 450.00,
        'descrizione' => "Eleganza essenziale con un taglio minimal, adatto a ogni occasione.",
        'immagine'  => 'horizon.png',
        '!immagine' => '!horizon.png',
        'immagine2' => 'horizon2.png',
        'immagine3' => 'horizon3.png',
        'immagine4' => 'horizon4.png',
        'immagine5' => 'horizon5.png',
    ],
    'axis' => [
        'nome' => 'Spectra Axis',
        'prezzo' => 450.00,
        'descrizione' => "Un modello deciso con carattere forte e un comfort studiato per l'uso quotidiano.",
        'immagine'  => 'axis.png',
        '!immagine' => '!axis.png',
        'immagine2' => 'axis2.png',
        'immagine3' => 'axis3.png',
        'immagine4' => 'axis4.png',
        'immagine5' => 'axis5.png',
    ],
];

$id = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';
$id = preg_replace('/[^a-z0-9_-]/', '', $id);
$product = $products[$id] ?? null;
?>
<!-- #endregion -->
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/occhiale.css">
</head>
<body>

<?php include "header.php"; ?>

<main>
    <section class="hero">

        <div class="sinistra">

            <?php if ($product): ?>
           <div class="carosello">
                <div class="mySlides fade">
                    <img src="Immagini/<?php echo htmlspecialchars($product['immagine']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>">
                </div>
                <div class="mySlides fade">
                    <img src="Immagini/<?php echo htmlspecialchars($product['immagine2']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>">
                </div>
                <div class="mySlides fade">
                    <img src="Immagini/<?php echo htmlspecialchars($product['immagine3']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>">
                </div>
                <div class="mySlides fade">
                    <img src="Immagini/<?php echo htmlspecialchars($product['immagine4']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>">
                </div>
                <div class="mySlides fade">
                    <img src="Immagini/<?php echo htmlspecialchars($product['immagine5']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            
            <?php else: ?>

            <div class="prodotto-non-trovato">
                <h1>Prodotto non trovato</h1>
                <p>Seleziona un modello dalla pagina <a href="prodotti.php">Prodotti</a>.</p>
            </div>
            
            <?php endif; ?>
            
        </div>
     

        <div class="destra">

            <div class="info-prodotto">
                <h1><?php echo htmlspecialchars($product['nome']); ?></h1>
                <p class="prezzo">€ <?php echo number_format($product['prezzo'], 2, ',', '.'); ?></p>
                <p><?php echo nl2br(htmlspecialchars($product['descrizione'])); ?></p>
            </div>

        </div>

    </section>

    <div style="width:100%; height:800px; overflow:hidden; margin-bottom: 60px;">
        <img src="Immagini/<?php echo htmlspecialchars($product['!immagine']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>" style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;">
    </div>

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
                <h1>Tecnologia ..</h1>
            </article>
            
            <article class="features-box">
                <h1>Tecnologia ..</h1>
            </article>
        </div>

    </section>
    
</main>

<?php include "footer.php"; ?>

</body>
</html>