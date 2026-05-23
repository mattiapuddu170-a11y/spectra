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
                <svg class="icons" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6.2 8.8h11.6l-.8 8.7a2 2 0 0 1-2 1.8H9a2 2 0 0 1-2-1.8L6.2 8.8Z"></path>
                    <path d="M9 8.8V7a3 3 0 0 1 6 0v1.8"></path>
                    <path d="M9.5 12.4h5"></path>
                </svg>
            </a>
            <a href="<?php echo e(app_url('login.php')); ?>" aria-label="Account">
                <svg class="icons" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="8.2" r="3.2"></circle>
                    <path d="M5.6 19.2a6.6 6.6 0 0 1 12.8 0"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                </svg>
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
    <label for="searchSidebar">Cerca prodotto</label>
    <div class="search-input-wrap">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="10.8" cy="10.8" r="5.8"></circle>
            <path d="M15.1 15.1 20 20"></path>
        </svg>
        <input type="search" id="searchSidebar" placeholder="Modello, funzione, prezzo..." autocomplete="off" aria-controls="risultatiSidebar" aria-expanded="false" data-search-url="<?php echo e(app_url('ajax/search.php')); ?>">
    </div>
    <p class="search-hint">Seleziona un risultato o premi Invio.</p>
    <div id="risultatiSidebar" role="listbox" aria-label="Risultati ricerca"></div>
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
