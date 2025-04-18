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
    <title>Adko Petko Market</title>
</head>
<body>


<!--**************** START OF TOP NAVBAR ********************-->
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
        <a href="#" class="nav-link category-item"  onclick="window.location.href='index.html'">Novinky</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Oblečenie</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Topánky</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Šport</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Streetwear</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Doplnky</a>
        <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Výpredaj</a>

        <!-- tlacidlo na rozbalenie menu -->
        <button class="navbar-toggler ms-auto bg-light" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvas-right-navbar"
                aria-controls="offcanvas-right-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navigacne menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navmenu">
            <ul class="navbar-nav ms-auto d-flex">
                <li class="menu-item d-flex align-items-center search-group">
                    <img src="images/lupa.png" alt="lupa" class="navbar-icon">
                    <input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
                </li>

                <li class="menu-item active">
                    <a class="nav-link" href="shopping_cart.html">
                        <img src="images/kosik.png" alt="Košík" class="navbar-icon">
                        <span>2 Košík</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="nav-link" href="login-page.html">
                        <img src="images/prihlasenie.png" alt="login" class="navbar-icon">
                        Prihlásenie
                    </a>
                </li>
                <li class="menu-item">
                    <a class="nav-link" href="#">
                        <img src="images/podpora.png" alt="podpora" class="navbar-icon">
                        Podpora
                    </a>
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
        <ul class="navbar-nav ms-auto d-flex">
            <li class="menu-item d-flex align-items-center search-group">
                <img src="images/lupa.png" alt="lupa" class="navbar-icon">
                <input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
            </li>
            <li class="menu-item">
                <a class="nav-link" href="shopping_cart.html">
                    <img src="images/kosik.png" alt="Košík" class="navbar-icon">
                    2 Košík
                </a>
            </li>
            <li class="menu-item">
                <a class="nav-link" href="login-page.html">
                    <img src="images/prihlasenie.png" alt="login" class="navbar-icon">
                    Prihlásenie
                </a>
            </li>
            <li class="menu-item">
                <a class="nav-link" href="#">
                    <img src="images/podpora.png" alt="podpora" class="navbar-icon">
                    Podpora
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- ********************************************* END OF NAVBAR  **************************************************-->



<header>
    <h1>Najpredávanejšie</h1>
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
                <a href="product-detail.html" class="product-link">
                    <img src="images/tricko.jpg" alt="tricko">
                    <div class="product-name"><span>Tricko_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/nohavice_1.webp" alt="tricko">
                    <div class="product-name"><span>Nohavice_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/nohavice_2.webp" alt="tricko">
                    <div class="product-name"><span>Nohavice_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/kosela_1.webp" alt="tricko">
                    <div class="product-name"><span>Kosela_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/kosela_2.webp" alt="tricko">
                    <div class="product-name"><span>Kosela_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/tricko_2.webp" alt="tricko">
                    <div class="product-name"><span>Tricko_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/mikina_2.webp" alt="tricko">
                    <div class="product-name"><span>Mikina_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/nohavice_3.webp" alt="tricko">
                    <div class="product-name"><span>Nohavice_3</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/budna_1.jpg.webp" alt="tricko">
                    <div class="product-name"><span>Bunda_1</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
            </article>

            <article class="product-item">
                <a href="product-detail.html" class="product-link">
                    <img src="images/bunda_2.webp" alt="tricko">
                    <div class="product-name"><span>Bunda_2</span></div>
                    <div class="product-price"><span>$70</span></div>
                </a>
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
    </main>
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