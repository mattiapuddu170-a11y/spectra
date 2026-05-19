<?php require_once __DIR__ . '/helpers.php'; ?>

<footer>
  <div class="footer-container">

    <div class="footer-section">
      <h2>Spectra</h2>
      <p>Vedi il mondo con stile</p>
    </div>

    <div class="footer-section">
      <h3>Link utili</h3>
      <ul>
        <li><a href="<?php echo e(app_url('index.php')); ?>">Home</a></li>
        <li><a href="<?php echo e(app_url('prodotti.php')); ?>">Shop</a></li>
        <li><a href="<?php echo e(app_url('chi_siamo.php')); ?>">Chi Siamo</a></li>
        <li><a href="#">Contatti</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Contatti</h3>
      <p>Email: spectraocchiali@tiscali.it</p>
      <p>Tel: +39 02 0000 0000</p>
      <p>Tel: +39 320 000 0000</p>
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

<script src="<?php echo e(app_url('js/menu.js')); ?>" defer></script>
<script src="<?php echo e(app_url('js/ricerca.js')); ?>" defer></script>
<script src="<?php echo e(app_url('js/carosello.js')); ?>" defer></script>
