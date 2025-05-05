{{-- ZAKLADNY LAYOUT -------------------------------------------------------}}
@extends('layouts.app')

{{-- TITLE --}}
@section('title','Domov')

{{-- STYLES  ------------------------------------}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home_body.css') }}">
@endpush

{{-- OBSAH -----------------------------------------------------------------}}
@section('content')

    {{-- HERO Banner ---}}
    <section class="hero-banner">
        <img src="{{ asset('images/main_photo_1.jpg') }}" alt="Hero Banner">
        <img src="{{ asset('images/main_photo_2.jpg') }}" alt="Hero Banner">
    </section>

    <main>

        {{-- *** ADMIN: PRIDAT NOVÝ PRODUKT *** --}}
        @auth
            @if(Auth::user()->is_admin)
                <section class="adding-item-div">
                    <h2>Pridať nový produkt</h2>
                    <div id="add_product">
                        <a href="{{ route('admin.add_product') }}" class="product-item">
                            <img src="{{ asset('images/add_new.svg') }}" alt="Pridať">
                        </a>
                    </div>
                </section>
            @endif
        @endauth

        {{-- *** NAJNOVŠIE PRODUKTY *** --}}
        <section>
            <div class="section-header">
                <h1 class="section-title">Najnovšie produkty</h1>
                <button class="shop-all-btn"
                        onclick="window.location.href='#'"> {{-- '{{ route('products.filter', [$gender ?? 'men', 'Clothes']) }}' --}}
                    Shop All
                </button>
            </div>

            {{-- prvý rad 4 ks --}}
            <section class="product-grid">
                @foreach ($newest_products as $product)
                    <div class="product-card-wrapper">
                        <a href="{{ route('product.detail', $product->id) }}" class="product-item">
                            <img src="{{ $product->photos->first()->url ?? asset('images/default.jpg') }}"
                                 alt="{{ $product->name }}">
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="price">${{ $product->price }}</div>
                        </a>

                        {{-- *** ADMIN EDIT / DELETE *** --}}
                        @auth
                            @if(Auth::user()->is_admin)
                                <button class="admin-product-edit"
                                        onclick="location.href='#'"> {{-- '{{ route('admin.edit.product', $product->id) }}' -daj tu href ziadne on clisk --}}
                                    <img src="{{ asset('images/edit.png') }}" alt="edit">
                                </button>
                                <form method="POST" action="" {{-- {{ route('admin.delete.product', $product->id) }} --}}
                                      class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="admin-product-delete">
                                        <img src="{{ asset('images/delete.png') }}" alt="delete">
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </section>
        </section>

        {{-- druhý rad 4 ks – rovnaká logika --}}
        <section class="product-grid">
            @foreach ($newest_products_second_line as $product)
                <div class="product-card-wrapper">
                    <a href="{{ route('product.detail', $product->id) }}" class="product-item">
                        <img src="{{ $product->photos->first()->url ?? asset('images/default.jpg') }}"
                             alt="{{ $product->name }}">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="price">${{ $product->price }}</div>
                    </a>

                    @auth
                        @if(Auth::user()->is_admin)
                            <button class="admin-product-edit"
                                    onclick="location.href=''"> {{-- {{ route('admin.edit.product', $product->id) }} --}}
                                <img src="{{ asset('images/edit.png') }}" alt="edit">
                            </button>
                            <form method="POST" action="" {{-- {{ route('admin.delete.product', $product->id) }} --}}
                                  class="d-inline">
                                @csrf @method('DELETE')
                                <button class="admin-product-delete">
                                    <img src="{{ asset('images/delete.png') }}" alt="delete">
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </section>

    </main>
@endsection
