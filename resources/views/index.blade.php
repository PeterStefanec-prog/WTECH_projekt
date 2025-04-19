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
            <h1 class="section-title">Najnovšie produkty</h1>
            <button class="shop-all-btn" onclick="window.location.href='products-view.html'">Shop All</button>
        </div>

        <section class="product-grid">
            <a href="product-detail.html" class="product-item">
                <img src="images/budna_1.jpg.webp" alt="tricko">
                <div class="product-name">Bunda_1</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/nohavice_1.webp" alt="tricko">
                <div class="product-name">Nohavice_1</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/tricko.jpg" alt="tricko">
                <div class="product-name">Tricko_1</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/bunda_2.webp" alt="tricko">
                <div class="product-name">Bunda_2</div>
                <div class="price">100$</div>
            </a>
        </section>
    </section>

    <section>
        <section class="product-grid">
            <a href="product-detail.html" class="product-item">
                <img src="images/tricko_2.webp" alt="tricko">
                <div class="product-name">Tricko_2</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/kosela_1.webp" alt="tricko">
                <div class="product-name">Kosela_1</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/mikina_1.webp" alt="tricko">
                <div class="product-name">Mikina_1</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/nohavice_2.webp" alt="tricko">
                <div class="product-name">Nohavice_2</div>
                <div class="price">100$</div>
            </a>
        </section>
    </section>

    <!-- Section 2: Odporucane produkty-->
    <section style="margin-top: 3rem;">
        <section class="section-header">
            <h1 class="section-title">Odporúčané produkty</h1>
            <button class="shop-all-btn" onclick="window.location.href='products-view.html'">Shop All</button>
        </section>
        <section class="product-grid">
            <a href="product-detail.html" class="product-item">
                <img src="images/tricko_3.webp" alt="tricko">
                <div class="product-name">Tricko_3</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/kosela_2.webp" alt="tricko">
                <div class="product-name">Kosela_2</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/mikina_2.webp" alt="tricko">
                <div class="product-name">Mikina_2</div>
                <div class="price">100$</div>
            </a>
            <a href="product-detail.html" class="product-item">
                <img src="images/Nohavice_3.webp" alt="tricko">
                <div class="product-name">Nohavice_3</div>
                <div class="price">100$</div>
            </a>
        </section>
    </section>
</main>


{{--import javascript--}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384‑MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="{{ asset('javascript-files/navbar.js') }}"></script>
@endpush



@endsection
