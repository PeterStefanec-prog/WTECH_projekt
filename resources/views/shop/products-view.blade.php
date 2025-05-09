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
    {{--    // ALERTY--}}
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

                {{-- zachovaj existujuce filtre okrem page a sort --}}
                @foreach(request()->except(['sort','page']) as $name => $value)
{{--                    ak je value pole - teda napriklad [blue, red] z checboxu color, potrebujeme vygenerovat pre kazdy prvok input--}}
                    @if(is_array($value))
                        @foreach($value as $v)
                            <input type="hidden" name="{{ $name }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                    @endif
                @endforeach

{{--                actual sort    - pomocou request posielame na tu istu url, kde sme ale s novym parametrom  sort --}}
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
            @foreach ($products as $product)
                <article class="product-item">
                    <a href="{{ route('product.detail', $product->id) }}" class="product-link">
                        <img src="{{ $product->photos->first()->url ?? asset('images/default.jpg') }}"
                             alt="{{ $product->name }}">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">${{ $product->price }}</div>
                    </a>

                    {{-- *** ADMIN EDIT / DELETE *** --}}
                    @auth
                        @if(Auth::user()->is_admin)
                            <a  href="{{ route('admin.edit_product', $product->id) }}" class="admin-product-edit">
                                <img src="{{ asset('images/edit.png') }}" alt="edit">
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.delete_product', $product->id) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Naozaj chcete produkt vymazať?');">
                                @csrf
                                @method('DELETE')
                                <button class="admin-product-delete">
                                    <img src="{{ asset('images/delete.png') }}" alt="delete">
                                </button>
                            </form>
                        @endif
                    @endauth
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

