<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/home_body.css">
    <link rel="stylesheet" href="css/admin-index.css"></link>
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
        <a href="#" class="nav-link category-item active"  >Novinky</a>
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

<!-- BIG PICTURE MARKET-->
<section class="hero-banner">
    <img src="images/main_photo_1.jpg" alt="Hero Banner" />
    <img src="images/main_photo_2.jpg" alt="Hero Banner" />
</section>



<!-- MAIN CONTENT -->
<main>
    <!-- Section 1: Najnovsie produkty -->
    <section>
        <div class="section-header">
            <div class="section-title">Najnovšie produkty</div>
            <button class="shop-all-btn" onclick="window.location.href='admin_products_view.html'" >Shop All</button>
        </div>
        <div class="product-grid">
            <!-- Product items here -->
        </div>

        <section class="product-grid">
            <article class="product-item">
                <a  class="product-link">
                    <img src="images/budna_1.jpg.webp" alt="tricko">
                    <div class="product-name">Bunda_1</div>
                    <div class="price">100$</div>
                </a>
                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>

            <article class="product-item">
                <a  class="product-link">
                    <img src="images/nohavice_1.webp" alt="tricko">
                    <div class="product-name">Nohavice_1</div>
                    <div class="price">100$</div>
                </a>
                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>

            <article class="product-item">
                <a  class="product-link">
                    <img src="images/tricko.jpg" alt="tricko">
                    <div class="product-name">Tricko_1</div>
                    <div class="price">100$</div>
                </a>
                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>

            <article class="product-item">
                <a  class="product-link">
                    <img src="images/bunda_2.webp" alt="tricko">
                    <div class="product-name">Bunda_2</div>
                    <div class="price">100$</div>
                </a>
                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>
        </section>
    </section>

    <section class="product-grid">
        <article class="product-item">
            <a class="product-link">
                <img src="images/tricko_2.webp" alt="tricko">
                <div class="product-name">Tricko_2</div>
                <div class="price">100$</div>
            </a>
            <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                <img src="images/edit.png" alt="edit">
            </button>
            <button class="admin-product-delete" aria-label="Delete product">
                <img src="images/delete.png" alt="delete">
            </button>
        </article>

        <article class="product-item">
            <a class="product-link">
                <img src="images/kosela_1.webp" alt="tricko">
                <div class="product-name">Kosela_1</div>
                <div class="price">100$</div>
            </a>
            <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                <img src="images/edit.png" alt="edit">
            </button>
            <button class="admin-product-delete" aria-label="Delete product">
                <img src="images/delete.png" alt="delete">
            </button>
        </article>

        <article class="product-item">
            <a class="product-link">
                <img src="images/mikina_1.webp" alt="tricko">
                <div class="product-name">Mikina_1</div>
                <div class="price">100$</div>
            </a>
            <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                <img src="images/edit.png" alt="edit">
            </button>
            <button class="admin-product-delete" aria-label="Delete product">
                <img src="images/delete.png" alt="delete">
            </button>
        </article>

        <article class="product-item">
            <a class="product-link">
                <img src="images/nohavice_2.webp" alt="tricko">
                <div class="product-name">Nohavice_2</div>
                <div class="price">100$</div>
            </a>
            <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                <img src="images/edit.png" alt="edit">
            </button>
            <button class="admin-product-delete" aria-label="Delete product">
                <img src="images/delete.png" alt="delete">
            </button>
        </article>

    </section>
</main>


<section class="adding-item-div">
    <h2>Pridať nový produkt</h2>
    <div id="add_product">
        <a href="#" class="product-item" onclick="window.location.href='admin_add_product_detail.html'">
            <img src="images/add_new.svg" alt="tricko">
        </a>
    </div>
</section>

<!-- FOOTER -->
<footer>
    &copy; 2025 Made with love from xStefanec & xKazimir
</footer>

<script src="javascript-files/navbar.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>