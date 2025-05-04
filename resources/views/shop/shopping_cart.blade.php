{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title', 'Košík')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shopping-cart.css') }}">
@endpush

{{--tu vkladam meniaci sa content--}}
@section('content')
<div class="container">
    <div class="cart-items">
        <h2>Tvoj košík</h2>

        @forelse($cartItems as $item)
            @php
                $product = $useDatabase ? $item->product : $item;
            @endphp
            <div class="item">
                <img alt="{{ $product->name }}" src="{{ $product->photos->first()->url ?? asset('images/default.jpg') }}">
                <div class="details">
                    <h3>{{ $product->name }}</h3>
                    <span>Veľkosť: {{ $item->size ?? 'N/A' }}</span>
                    <span class="price">${{ $product->price }}</span>
                </div>

                <div class="product-quantity">
                    <div class="quantity-selector">
                        <button type="button" class="quantity-button">−</button>
                        <span class="quantity">{{ $item->quantity }}</span>
                        <button type="button" class="quantity-button">+</button>
                    </div>

                    {{-- FORMULÁR NA ODSTRÁNENIE PRODUKTU --}}
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $useDatabase ? $item->product->id : $item->id }}">
                        <input type="hidden" name="size" value="{{ $item->size ?? '' }}">
                        <button type="submit" class="remove btn btn-link text-danger p-0">Odstrániť</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Košík je prázdny.</p>
        @endforelse

    </div>

    <div class="summary">
        <h3>Sumár</h3>
       <div class="subtotal">Medzisúčet:
           <span>${{ $total }}</span> bez dopravy
       </div>
        <button onclick="window.location.href='#'">Pokračovať na dopravu</button>
    </div>
</div>
@endsection

{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/quantities.js') }}"></script>
@endpush

