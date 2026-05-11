<header>
  <nav class="nav">
    <button class="hamburger-btn" id="hamburgerBtn">
        <span></span><span></span><span></span>
    </button>

    <a href="index.php" class="logo">
        <img src="Immagini/logo.png" alt="Logo">
    </a>

    <div class="right-side">
            <a href="carrello.php">
                <img class="icons" src="Immagini/icons/cart.png">
            </a>
            <a href="login.php">
                <img class="icons" src="Immagini/icons/user.png">
            </a>
    </div>
  </nav>
</header>

<aside class="sidebar" id="sidebar">

  <div class="sidebar-header">
    <img src="Immagini/logo.png" alt="Logo">
    <button class="close-btn" id="closeSidebar">✕</button>
  </div>

  <div class="sidebar-search">
    <input type="text" id="searchSidebar" placeholder="Cerca prodotti...">
    <div id="risultatiSidebar"></div>
  </div>

  <nav class="sidebar-links">
    <a href="index.php">Home</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="#categorie">Categorie</a>
    <a href="chi_siamo.php">Chi Siamo</a>
    <a href="#contatti">Contatti</a>
  </nav>

</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>
