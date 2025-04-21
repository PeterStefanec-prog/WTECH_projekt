{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title','Domov')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/input-range.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products-view.css') }}">
@endpush


{{--tu vkladam meniaci sa content--}}
@section('content')


<header>
    <h1>{{ ucfirst($gender) }}
        <br>
        {{ $category }}
    </h1>
    <p>Vyber si z našej ponuky {{ $category ?? 'noviniek' }} pre {{ $gender }}.</p>
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

            @foreach($products as $product)
                <article class="product-item">
                    <a href="{{ route('product.detail', $product->id) }}" class="product-link">
                        <img
                            src="{{ $product->photos->first()->url ?? asset('images/default.jpg') }}"
                            alt="{{ $product->name }}"
                        >
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">${{ $product->price }}</div>
                    </a>
                </article>
            @endforeach

        </section>


        {{-- pagination --}}
        <nav class="pagination">
            <div class="page-chooser">

                {{-- len ak nie sme na prvej stránke, zobraz šípku --}}
                @if(! $products->onFirstPage())
                    <a href="{{ $products->previousPageUrl() }}" id="left-arrow">&larr;</a>
                @endif

                <span>Strana {{ $products->currentPage() }} z {{ $products->lastPage() }}</span>

                {{-- len ak ešte máme ďalšiu stránku, zobraz šípku --}}
                @if($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" id="right-arrow">&rarr;</a>
                @endif

            </div>
        </nav>

    </section>
</main>

@endsection



{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/filters.js') }}"></script>
@endpush

