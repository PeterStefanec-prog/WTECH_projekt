{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title','Domov')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home_body.css') }}">
@endpush


{{--tu vkladam meniaci sa content--}}
@section('content')


<header>
    <h1>Toto je tvoje oblecenie, sport ,... </h1>
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
    </section>
</main>

@endsection



{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/filters.js') }}"></script>
@endpush

