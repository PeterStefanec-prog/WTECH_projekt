
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
                @php
                    if ($useDatabase) {
                        // ked logged in tak v cart_item
                        $stockSizes = $item->product->sizes;
                    } else {
                        // ak nie logged in -> produkt
                        $stockSizes = $item->sizes;
                    }
                    $stock = $stockSizes
                        ->firstWhere('size', $item->size)
                        ->stock ?? 0;
                @endphp
                <div class="product-quantity">
                    <div class="quantity-selector" data-max="{{ $stock }}">
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
        @if($total > 0)
            <button onclick="window.location.href='{{ route('address.index') }}'">
                Pokračovať na dopravu
            </button>
        @else
            <button disabled class="disabled">
                Pokračovať na dopravu
            </button>
            <p class="text-danger mt-2">Košík je prázdny, pridaj najprv nejaké produkty.</p>
        @endif
    </div>

</div>
@endsection

{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/quantities.js') }}"></script>
@endpush

