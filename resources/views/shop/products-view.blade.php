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

    @include('layouts.partials.filters')

    <section class="right-section">
<!-- SORT CONTAINER ABOVE PRODUCTS -->
        <section class="sort-container">
            <form
                method="GET"
                action="{{ route('products.filter', [$gender, $category]) }}">
                
                <div class="sort-header">
                    <label for="sort-select">Zoradiť podľa:</label>
                    <select
                        name="sort"
                        id="sort-select"
                        onchange="this.form.submit()">

                        <option value=""           {{ request('sort')=='' ? 'selected':'' }}>– Bez zoradenia –</option>
                        <option value="price-asc"  {{ request('sort')=='price-asc'  ? 'selected':'' }}>Cena: od najnižšej</option>
                        <option value="price-desc" {{ request('sort')=='price-desc' ? 'selected':'' }}>Cena: od najvyššej</option>
                        <option value="name-asc"   {{ request('sort')=='name-asc'   ? 'selected':'' }}>Názov: A-Z</option>
                        <option value="name-desc"  {{ request('sort')=='name-desc'  ? 'selected':'' }}>Názov: Z-A</option>
                    </select>
                </div>

                <span class="product-count">
                    Zobrazených {{ $products->total() }} produktov
                </span>

            </form>
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

                {{-- len ak nie sme na prvej stranke, zobraz sipku --}}
                @if(! $products->onFirstPage())
                    <a href="{{ $products->previousPageUrl() }}" id="left-arrow">&larr;</a>
                @endif

                <span>Strana {{ $products->currentPage() }} z {{ $products->lastPage() }}</span>

                {{-- len ak este mame dalsiu stránku, zobraz sipku --}}
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

