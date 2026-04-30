<!DOCTYPE html>
<html>
<head>
    <title>Prodotti</title>
    <link rel="stylesheet" href="File CSS/stile.css">
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
                <img class="icons" src="Immagini/cart.png" alt="Carrello">
            </a>
            <a href="login.php">
                <img class="icons" src="Immagini/user.png" alt="Utente">
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
    <a href="index.php" class="menu-link">Home</a>
    <a href="prodotti.php" class="menu-link">Prodotti</a>
    <a href="#categorie" class="menu-link">Categorie</a>
    <a href="#about" class="menu-link">Chi Siamo</a>
    <a href="#contatti" class="menu-link">Contatti</a>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main>

    <section class="prodotti">
        
        <article class="prod">
            <a href="occhiale.php" class="prod-link">
                <img src="Immagini/foto1.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Athletic</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Athletic</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Athletic">
                <input type="hidden" name="prodotto_image" value="Immagini/foto1.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto2.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Nexus</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Nexus</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Nexus">
                <input type="hidden" name="prodotto_image" value="Immagini/foto2.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto3.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Eclipse</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Eclipse</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Eclipse">
                <input type="hidden" name="prodotto_image" value="Immagini/foto3.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

    </section>


    <section class="prodotti">
        
        <article class="prod">
            <a href="occhiale.php" class="prod-link">
                <img src="Immagini/foto4.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Vision</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Vision</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Vision">
                <input type="hidden" name="prodotto_image" value="Immagini/foto4.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto5.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Mirage</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Mirage</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Mirage">
                <input type="hidden" name="prodotto_image" value="Immagini/foto5.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto6.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Horizon</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Horizon</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Horizon">
                <input type="hidden" name="prodotto_image" value="Immagini/foto6.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>
        
    </section>

    <section class="prodotti">

        <article class="prod">
            <a href="#prodotto" class="prod-link">
                <img src="Immagini/foto7.png" alt="">
                <div class="descdiv">
                    <h2>Spectra Axis</h2>
                    <h3>€ 450,00</h3>
                    <p>Acquista subito spectra Axis</p>
                </div>
            </a>

            <form method="post" action="carrello_sessione.php" class="product-form">
                <input type="hidden" name="prodotto_id" value="1">
                <input type="hidden" name="prodotto_name" value="Spectra Axis">
                <input type="hidden" name="prodotto_image" value="Immagini/foto7.png">
                <button class="linkdiv" type="submit">Acquista ora</button>
            </form>
        </article>

    </section>
</main>

<footer>
    <p>&copy; 2026 Occhiali spectra srl. Tutti i diritti riservati.</p>
</footer>

</body>
</html>