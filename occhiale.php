<?php
session_start();

$products = [
    'vision' => [
        'nome' => 'Spectra Vision',
        'prezzo' => 450.00,
        'descrizione' => "Occhiali dallo stile elegante con montatura leggera e lenti anti-riflesso.",
        'immagine' => 'vision.png',
    ],
    'athletic' => [
        'nome' => 'Spectra Athletic',
        'prezzo' => 450.00,
        'descrizione' => "Design sportivo, perfetto per l'attività all'aperto e per chi cerca comfort tutto il giorno.",
        'immagine' => 'athletic.png',
    ],
    'nexus' => [
        'nome' => 'Spectra Nexus',
        'prezzo' => 450.00,
        'descrizione' => "Look moderno con dettagli di qualità, ideale per chi vuole un tocco di carattere.",
        'immagine' => 'nexus.png',
    ],
    'mirage' => [
        'nome' => 'Spectra Mirage',
        'prezzo' => 450.00,
        'descrizione' => "Montatura sofisticata e finiture lucide per un effetto di grande impatto.",
        'immagine' => 'mirage.png',
    ],
    'eclipse' => [
        'nome' => 'Spectra Eclipse',
        'prezzo' => 450.00,
        'descrizione' => "Stile contemporaneo e linee pulite, perfetto per un look urbano raffinato.",
        'immagine' => 'eclipse.png',
    ],
    'horizon' => [
        'nome' => 'Spectra Horizon',
        'prezzo' => 450.00,
        'descrizione' => "Eleganza essenziale con un taglio minimal, adatto a ogni occasione.",
        'immagine' => 'horizon.png',
    ],
    'axis' => [
        'nome' => 'Spectra Axis',
        'prezzo' => 450.00,
        'descrizione' => "Un modello deciso con carattere forte e un comfort studiato per l'uso quotidiano.",
        'immagine' => 'axis.png',
    ],
];

$id = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';
$id = preg_replace('/[^a-z0-9_-]/', '', $id);
$product = $products[$id] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product ? htmlspecialchars($product['nome']) : 'Occhiale'; ?> - Spectra</title>
    <link rel="stylesheet" href="File CSS/stile.css">
    <link rel="stylesheet" href="File CSS/occhiale.css">
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
</header>
<hr>
<aside class="sidebar" id="sidebar">
    <a href="index.php">Home</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="chi_siamo.html">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
</aside>
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<main>
    <section class="hero">
        <?php if ($product): ?>
            <div class="dettaglio-prodotto">
                <div class="immagine-prodotto">
                    <img src="Immagini/<?php echo htmlspecialchars($product['immagine']); ?>" alt="<?php echo htmlspecialchars($product['nome']); ?>">
                </div>
                <div class="info-prodotto">
                    <h1><?php echo htmlspecialchars($product['nome']); ?></h1>
                    <p class="prezzo">€ <?php echo number_format($product['prezzo'], 2, ',', '.'); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($product['descrizione'])); ?></p>
                    <a class="btn-acquista" href="prodotti.php">Torna ai prodotti</a>
                </div>
            </div>
        <?php else: ?>
            <div class="prodotto-non-trovato">
                <h1>Prodotto non trovato</h1>
                <p>Seleziona un modello dalla pagina <a href="prodotti.php">Prodotti</a>.</p>
            </div>
        <?php endif; ?>
    </section>
</main>
<footer>
  <div class="footer-container">
    <div class="footer-section">
      <h2>Spectra</h2>
      <p>Vedi il mondo con stile</p>
    </div>
    <div class="footer-section">
      <h3>Link utili</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="prodotti.php">Shop</a></li>
        <li><a href="chi_siamo.php">Chi Siamo</a></li>
        <li><a href="#">Contatti</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Contatti</h3>
      <p>Email: spectraocchiali@tiscali.it</p>
      <p>Tel: +39 02 0000 0000</p>
      <p>Tel: +39 320 0000 0000</p>
      <p>Facebook</p>
      <p>Instagram</p>
      <p>Twitter</p>
      <p>Tik Tok</p>
    </div>
  </div>
  <hr>
  <div class="footer-bottom">
    <p>© 2026 Spectra - Tutti i diritti riservati</p>
  </div>
</footer>
</body>
</html>
