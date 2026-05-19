<?php require_once __DIR__ . '/helpers.php'; ?>

<header>
  <nav class="nav">
    <button class="hamburger-btn" id="hamburgerBtn" type="button" aria-label="Apri menu">
        <span></span><span></span><span></span>
    </button>

    <a href="<?php echo e(app_url('index.php')); ?>" class="logo">
        <img src="<?php echo e(app_url('Immagini/logo.png')); ?>" alt="Logo">
    </a>

    <div class="right-side">
            <a href="<?php echo e(app_url('carrello.php')); ?>" aria-label="Carrello">
                <img class="icons" src="<?php echo e(app_url('Immagini/icons/cart.png')); ?>" alt="Carrello">
            </a>
            <a href="<?php echo e(app_url('login.php')); ?>" aria-label="Account">
                <img class="icons" src="<?php echo e(app_url('Immagini/icons/user.png')); ?>" alt="Account">
            </a>
    </div>
  </nav>
</header>

<aside class="sidebar" id="sidebar">

  <div class="sidebar-header">
    <img src="<?php echo e(app_url('Immagini/logo.png')); ?>" alt="Logo">
    <button class="close-btn" id="closeSidebar" type="button" aria-label="Chiudi menu">×</button>
  </div>

  <div class="sidebar-search">
    <input type="text" id="searchSidebar" placeholder="Cerca prodotti..." autocomplete="off" data-search-url="<?php echo e(app_url('ajax/search.php')); ?>">
    <div id="risultatiSidebar"></div>
  </div>

  <nav class="sidebar-links">
    <a href="<?php echo e(app_url('index.php')); ?>">Home</a>
    <a href="<?php echo e(app_url('prodotti.php')); ?>">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="<?php echo e(app_url('chi_siamo.php')); ?>">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
  </nav>

</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>
