<?php require_once __DIR__ . '/helpers.php'; ?>

<footer id="contatti">
  <div class="footer-container">

    <div class="footer-brand">
      <a href="<?php echo e(app_url('index.php')); ?>" class="footer-logo" aria-label="Spectra home">
        <img src="<?php echo e(app_url('Immagini/logo.png')); ?>" alt="Spectra">
      </a>
      <p>Occhiali smart pensati per restare connessi senza perdere il contatto con ci&ograve; che hai davanti.</p>
      <div class="footer-social" aria-label="Canali social">
        <a href="#" aria-label="Facebook">
          <img src="<?php echo e(app_url('Immagini/icons/facebook.png')); ?>" alt="">
        </a>
        <a href="#" aria-label="YouTube">
          <img src="<?php echo e(app_url('Immagini/icons/youtube.png')); ?>" alt="">
        </a>
      </div>
    </div>

    <div class="footer-section">
      <h3>Navigazione</h3>
      <ul>
        <li><a href="<?php echo e(app_url('index.php')); ?>">Home</a></li>
        <li><a href="<?php echo e(app_url('prodotti.php')); ?>">Prodotti</a></li>
        <li><a href="<?php echo e(app_url('chi_siamo.php')); ?>">Chi siamo</a></li>
        <li><a href="<?php echo e(app_url('carrello.php')); ?>">Carrello</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Contatti</h3>
      <ul class="footer-contact">
        <li>
          <img src="<?php echo e(app_url('Immagini/icons/mail.png')); ?>" alt="">
          <a href="mailto:spectraocchiali@tiscali.it">spectraocchiali@tiscali.it</a>
        </li>
        <li>
          <img src="<?php echo e(app_url('Immagini/icons/phone.png')); ?>" alt="">
          <a href="tel:+390200000000">+39 02 0000 0000</a>
        </li>
        <li>
          <img src="<?php echo e(app_url('Immagini/icons/phone.png')); ?>" alt="">
          <a href="tel:+393200000000">+39 320 000 0000</a>
        </li>
      </ul>
    </div>

  </div>

  <div class="footer-highlights">
    <div>
      <strong>Garanzia 2 anni</strong>
      <span>Copertura su difetti e assistenza post-vendita.</span>
    </div>
    <div>
      <strong>Reso entro 14 giorni</strong>
      <span>Puoi ripensarci con una procedura semplice.</span>
    </div>
    <div>
      <strong>Supporto dedicato</strong>
      <span>Risposte rapide per acquisto, uso e configurazione.</span>
    </div>
  </div>

  <hr>
  <div class="footer-bottom">
    <p>&copy; 2026 Spectra Vision S.r.l. - Tutti i diritti riservati</p>
  </div>
</footer>

<script src="<?php echo e(app_url('js/menu.js?v=2')); ?>" defer></script>
<script src="<?php echo e(app_url('js/ricerca.js?v=2')); ?>" defer></script>
<script src="<?php echo e(app_url('js/carosello.js?v=2')); ?>" defer></script>
