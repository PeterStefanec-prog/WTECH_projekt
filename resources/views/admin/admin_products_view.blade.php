<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/products-view.css">
    <link rel="stylesheet" href="css/input-range.css">
    <link rel="stylesheet" href="css/admin-products-view.css">
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
        <a href="#" class="nav-link category-item" >Oblečenie</a>
        <a href="#" class="nav-link category-item" >Topánky</a>
        <a href="#" class="nav-link category-item" >Šport</a>
        <a href="#" class="nav-link category-item" >Streetwear</a>
        <a href="#" class="nav-link category-item" >Doplnky</a>
        <a href="#" class="nav-link category-item" >Výpredaj</a>

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



<header>
    <h2>Najpredávanejšie</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod tempor incidunt ut labore et dolore magna aliqua.</p>
</header>

<!-- FILTERS ON THE LEFT SIDE -->
<main class="container">
    <aside class="filters">
        <form>
            <div class="filters-header">
                <h2 id="filtre">Filtre</h2>
                <label><button id="reset-filters">Vymaž filtre</button></label>
            </div>

            <fieldset class="filter-section">
                <h3>Farby</h3>
                <label><input type="checkbox" /> Modrá</label><br>
                <label><input type="checkbox" /> Zelená</label><br>
                <label><input type="checkbox" /> Červená</label><br>
                <label><input type="checkbox" /> Fialová</label>
            </fieldset>

            <fieldset class="filter-section">
                <h3>Značka</h3>
                <label><input type="checkbox" /> Nike</label><br>
                <label><input type="checkbox" /> Adidas</label><br>
                <label><input type="checkbox" /> Puma</label><br>
                <label><input type="checkbox" /> Reebok</label>
            </fieldset>

            <fieldset class="filter-section">
                <h3>Cena</h3>
                <input type="range" min="0" max="1000" id="price-range"/>
                <label for="price-range">Najdrahšie <span id="range-value">500 $</span></label>
            </fieldset>

            <!--         mozno aj button  ale netreba -->
            <!--        <button type="submit" class="apply-filters">Použiť filtre</button>-->
        </form>
    </aside>

    <section class="right-section">
        <!-- SORT CONTAINER ABOVE PRODUCTS -->
        <section class="sort-container">
            <div class="sort-header">
                <label for="sort-select">Zoradiť podľa:</label>
                <select id="sort-select">
                    <option value="price-asc">Cena: od najnižšej</option>
                    <option value="price-desc">Cena: od najvyššej</option>
                    <option value="name-asc">Názov: A-Z</option>
                    <option value="name-desc">Názov: Z-A</option>
                </select>
            </div>
            <span class="product-count">Zobrazených 9 produktov</span>
        </section>

        <section class="product-grid">
            <!-- EXAMPLE PRODUCT ITEMS -->
            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/tricko.jpg" alt="tricko">
                    <div class="product-name"><span>Tricko_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>


            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/nohavice_1.webp" alt="tricko">
                    <div class="product-name"><span>Nohavice_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>


            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/nohavice_2.webp" alt="tricko">
                    <div class="product-name"><span>Nohavice_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>


            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/kosela_1.webp" alt="tricko">
                    <div class="product-name"><span>Kosela_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>

            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/kosela_2.webp" alt="tricko">
                    <div class="product-name"><span>Kosela_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>


            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/nohavice_3.webp" alt="tricko">
                    <div class="product-name"><span>Nohavice_3</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>

            <article class="product-item">
                <a href="#" class="product-link">
                    <img src="images/mikina_2.webp" alt="tricko">
                    <div class="product-name"><span>Mikina_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>

                <button class="admin-product-edit" aria-label="Edit product" onclick="window.location.href='admin_edit_product_detail.html'">
                    <img src="images/edit.png" alt="edit">
                </button>
                <button class="admin-product-delete" aria-label="Delete product">
                    <img src="images/delete.png" alt="delete">
                </button>
            </article>

            <!-- ... more products ... -->
        </section>

        <nav class="pagination">
            <div class="page-chooser">
                <a href="#" id="left-arrow">&larr;</a>
                <a href="#">Strana 2 z 15</a>
                <a href="#" id="right-arrow">&rarr;</a>
            </div>
        </nav>
    </section>
</main>



<!-- FOOTER -->
<footer>
    &copy; 2025 Made with love from xStefanec & xKazimir
</footer>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!--Functionality for input range-->
<script src="javascript-files/filters.js"></script>
<script src="javascript-files/navbar.js"></script>


</body>
</html>