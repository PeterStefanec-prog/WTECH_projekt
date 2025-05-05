
{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title', 'Choose Shipping')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-address.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-progress.css') }}">
@endpush

{{--tu vkladam meniaci sa content--}}
@section('content')
<main class="container">
    <section class="summary-card">
        <h1>Zhrnutie objednávky</h1>
        <div class="progress">
            <span class="step active">Adresa</span>
            <span class="separator">——————</span>
            <span class="step">Doručenie</span>
            <span class="separator">——————</span>
            <span class="step">Platba</span>
        </div>
        <form class="address-form">
            <div class="name-fields">
                <input type="text" placeholder="Meno" required>
                <input type="text" placeholder="Priezvisko" required>
            </div>
            <input type="text" placeholder="Adresa" required>
            <input type="text" placeholder="Mesto" required>
            <div class="postcode-row">
                <select>
                    <option>Slovensko</option>
                    <option>Česká republika</option>
                </select>
                <input type="text" placeholder="PSČ" required>
            </div>
            <textarea placeholder="Dodatočné info"></textarea>
            <button type="submit" onclick="window.location.href='{{ route('shipping.index') }}'">Pokračovať k doprave</button>
        </form>
    </section>
</main>
@endsection

{{--import javascript--}}
@push('scripts')
@endpush
