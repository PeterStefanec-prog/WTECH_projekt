@extends('layouts.app')

@section('title', $product->name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product-body.css') }}">
@endpush


@section('content')
    <div class="content-wrapper"> {{-- ZABALENÝ OBSAH --}}
        <section class="container">
            <section class="product-images-grid">
                {{--iterating through all photos of the product - and creating url for each of them--}}
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
                {{--pridane pre kazdu velkost aj pocet kolko kusov je dostupnych--}}
               <form action="{{ route('cart.add') }}" method="POST" id="add-to-cart-form">
                   @csrf
                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                   <input type="hidden" name="quantity" id="quantity" value="1">

                   <h2>Size</h2>
                   <fieldset class="size-selector">
                       @forelse($product->sizes->where('stock', '>', 0) as $ps)
                           <label>
                               <input type="radio" name="size" value="{{ $ps->size }}" required>
                               <span>{{ $ps->size }}</span>
                               <small class="availability" style="font-size:1rem; color:gray">({{ $ps->stock }})</small>
                           </label>
                       @empty
                           <p class="text-muted">Žiadne veľkosti momentálne nie sú dostupné.</p>
                       @endforelse
                   </fieldset>

                   <section class="product-quantity">
                       <div class="quantity-selector">
                           <button type="button" class="quantity-button" id="decrease">−</button>
                           <span class="quantity" id="quantity-display">1</span>
                           <button type="button" class="quantity-button" id="increase">+</button>
                       </div>
                       <button type="submit" class="add-to-cart">Pridaj do košíka</button>
                   </section>
               </form>

            </section>
        </section>
    </div> {{-- KONIEC content-wrapper --}}
@endsection

{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/quantities.js') }}"></script>
    <script src="{{ asset('js/image-zoom.js') }}"></script>
@endpush
