@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product-body.css') }}">
@endpush

@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="content-wrapper"> {{-- ZABALENÝ OBSAH --}}
        <section class="container">
            <section class="product-images-grid">
                @foreach($product->photos as $photo)
                    <article class="product-image-div">
                        <img src="{{ asset($photo->url) }}" alt="{{ $product->name }}" class="product-image">
                    </article>
                @endforeach
            </section>

            <section id="lightbox" class="lightbox">
                <img class="lightbox-img" src="" alt="">
            </section>

            <section class="product-description">
                <h1>{{ $product->name }}</h1>
                <span id="product-price">{{ $product->price }} $</span>
                <p>{{ $product->description }}</p>

                <br><br>
                <h2>Size</h2>
                <fieldset class="size-selector">
                    @foreach($product->available_sizes ?? ['S', 'M', 'L', 'XL'] as $size)
                        <label><input type="radio" name="size" value="{{ $size }}">
                            <span>{{ $size }}</span>
                        </label>
                    @endforeach
                </fieldset>

                <section class="product-quantity">
                    <div class="quantity-selector">
                        <button type="button">−</button>
                        <span class="quantity">1</span>
                        <button type="button">+</button>
                    </div>
                    <button class="add-to-cart">Pridaj do košíka</button>
                </section>
            </section>
        </section>
    </div> {{-- KONIEC content-wrapper --}}
@endsection
