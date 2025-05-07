
{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title', 'Choose Shipping')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order_confirmed.css') }}">
@endpush

{{--tu vkladam meniaci sa content--}}
@section('content')
<main>
    <section class="order-confirmation">
        <h1>Vaša objednávka č. xxxxxx bola úspešne vytvorená</h1>
        <button class="back-button" onclick="window.location.href='{{ route('home') }}'">
            Späť na domovskú obrazovku
        </button>
    </section>
</main>
@endsection

{{--import javascript--}}
@push('scripts')
@endpush
