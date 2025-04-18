<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/admin_edit_product_detail.css">
    <link rel="stylesheet" href="css/size-selector.css">
    <title>Adko Petko Market</title>
</head>
<body>

<!--**************** START OF TOP ADMIN NAVBAR ********************-->
<!-- Horny cierny pruh -->
<div class="top-bar">
    Až 50% zľava na vybrané produkty do konca augusta
</div>

<!-- Horny navbar -->
<nav class="navbar bg-light navbar-light d-flex justify-content-center">
    <div class="container-fluid justify-content-start">
        <a href="#" class="nav-link gender-item strong-active">Muži</a>
        <a href="#" class="nav-link gender-item">Ženy</a>
        <a href="#" class="nav-link gender-item">Deti</a>
    </div>

    <!-- Logo -->
    <div id="name-of-shop">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="images/logo.png" alt="Superobchod" style="height: 40px; margin-right: 5px;">
            <span style="font-size: 24px; font-weight: bold;">Superobchod</span>
        </a>
    </div>
</nav>

<!-- Hlavna navigacia -->
<nav class="navbar navbar-expand-xl bg-light navbar-light">
    <div class="container-fluid justify-content-start">
        <a href="#" class="nav-link category-item active"  onclick="window.location.href='admin_index.html'">Novinky</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='admin_products_view.html'">Oblečenie</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='admin_products_view.html'">Topánky</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='admin_products_view.html'">Šport</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='admin_products_view.html'">Streetwear</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='admin_products_view.html'">Doplnky</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='admin_products_view.html'">Výpredaj</a>

        <!-- tlacidlo na rozbalenie menu -->
        <button class="navbar-toggler ms-auto bg-light" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvas-right-navbar"
                aria-controls="offcanvas-right-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navigacne menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navmenu">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="menu-item d-flex align-items-center">
                    <img src="images/lupa.png" alt="lupa" class="navbar-icon">
                    <input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
                </li>
                <li class="menu-item d-flex align-items-center ms-3">
                    <span style="font-weight: bold;">STE PRIHLÁSENÝ AKO ADMIN</span>
                </li>
                <li class="menu-item d-flex align-items-center ms-3">
                    <button class="btn btn-dark btn-sm" onclick="window.location.href='index.html'">Odhlásiť sa</button>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- Offcanvas Menu (slides in from right) Duplikat toho hore-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right-navbar" aria-labelledby="offcanvas-right-navbar-label">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvas-right-navbar-label">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto d-flex flex-column align-items-start">
            <li class="menu-item d-flex align-items-center mb-3">
                <img src="images/lupa.png" alt="lupa" class="navbar-icon">
                <input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
            </li>
            <li class="menu-item mb-2">
                <span style="font-weight: bold;">STE PRIHLÁSENÝ AKO ADMIN</span>
            </li>
            <li class="menu-item">
                <button class="btn btn-dark btn-sm" onclick="window.location.href='index.html'">Odhlásiť sa</button>
            </li>
        </ul>
    </div>

</div>

<!-- ********************************************* END OF NAVBAR  **************************************************-->

<h1 class="section-title">Upraviť produkt</h1>




<main class="container">
    <section class="product-images-grid" >
        <div class="product-image-div">
            <img src="images/nohavice_1.webp" data-src="images/tricko.jpg" alt="tricko" class="product-image">
        </div>
        <div class="product-image-div">
            <img src="images/nohavice_1_2.webp" data-src="images/nohavice_1_2.webp" alt="tricko" class="product-image">
        </div>
        <div class="product-image-div">
            <img src="images/nohavice_1_3.webp" data-src="images/nohavice_1_3.webp" alt="tricko" class="product-image">
        </div>
        <div class="product-image-div">
            <img src="images/nohavice_1_4.webp" data-src="images/nohavice_1_4.webp" alt="tricko" class="product-image">
        </div>
    </section>

    <!--  Just thumbnail-->
    <div id="lightbox" class="lightbox">
        <img class="lightbox-img" src="" alt="">
    </div>



    <section class="product-description">


        <h2 for="nazov" class="desc-labels" >Názov</h2>
        <input id="nazov" class="form-control mb-3" type="text" placeholder="Tričko_1">

        <section class="mb-3">
            <h2 class="desc-labels">Pohlavie</h2><br>
            <label><input type="checkbox"> Ženy</label>
            <label><input type="checkbox" checked> Muži</label>
            <label><input type="checkbox"> Deti</label>
        </section>

        <div class="d-flex justify-content-between mb-3">
            <div class="type-column">
                <h2 class="desc-labels">Typ</h2>
                <ul class="type-list">
                    <li data-value="obleczenie" class="selected">Oblečenie</li>
                    <li data-value="topanky">Topánky</li>
                    <li data-value="sport">Šport</li>
                    <li data-value="streetwear">Streetwear</li>
                    <li data-value="doplnky">Doplnky</li>
                    <li data-value="designer">Designer</li>
                </ul>
                <input type="hidden" id="typ-produktu" name="typ" value="obleczenie">
            </div>

            <div style="width: 50%;">
                <h2 class="desc-labels" for="farba">Farba</h2>
                <select id="farba" class="form-control mb-1">
                    <option value="cierna">Čierna</option>
                    <option value="cervena">Červená</option>
                    <option value="modra">Modrá</option>
                    <option value="zelena">Zelená</option>
                    <option value="biela">Biela</option>
                </select>

            </div>
        </div>


        <h2 class="desc-labels">Veľkosti</h2>
        <fieldset class="size-selector">
            <label><input type="checkbox" name="size" value="S"><span>S</span></label>
            <label><input type="checkbox" name="size" value="M" checked><span>M</span></label>
            <label><input type="checkbox" name="size" value="L" checked><span>L</span></label>
            <label><input type="checkbox" name="size" value="XL" checked><span>XL</span></label>
        </fieldset>


        <h2 for="popis" class="desc-labels">Popis</h2>
        <textarea id="popis" class="form-control mb-3" rows="4" placeholder="Toto tričko je vyrobené z kávových zŕn a stojí 200 milionov eur."></textarea>

        <button class="add-to-store" onclick="window.location.href='admin_index.html'">Pridať</button>
    </section>

</main>



<!-- FOOTER -->
<footer>
    &copy; 2025 Made with love from xStefanec & xKazimir
</footer>

<script src="javascript-files/filters.js"></script>
<script src="javascript-files/quantities.js"></script>
<script src="javascript-files/image-zoom.js"></script>
<script src="javascript-files/type-selector.js"></script>
<script src="javascript-files/navbar.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>