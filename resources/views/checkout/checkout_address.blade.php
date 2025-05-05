
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
            <form id="address-form"
                  class="address-form"
                  data-redirect="{{ route('shipping.index') }}">
                <div class="name-fields">
                    <input type="text" name="first_name" placeholder="Meno" required
                           value="{{ old('first_name', auth()->user()->first_name) }}">
                    <input type="text" name="last_name" placeholder="Priezvisko" required
                           value="{{ old('last_name', auth()->user()->last_name) }}">
                </div>

                <input type="text" name="street" placeholder="Adresa" required
                       value="{{ old('street', optional($address)->street) }}">
                <input type="text" name="city" placeholder="Mesto" required
                       value="{{ old('city', optional($address)->city) }}">

                <div class="postcode-row">
                    <select name="country" required>
                        <option value="">Vyber krajinu</option>
                        <option value="Slovensko"
                            {{ optional($address)->country=='Slovensko' ? 'selected':'' }}>
                            Slovensko
                        </option>
                        <option value="Česká republika"
                            {{ optional($address)->country=='Česká republika' ? 'selected':'' }}>
                            Česká republika
                        </option>
                    </select>

                    <input type="text" name="postal_code" placeholder="PSČ" required
                           value="{{ old('postal_code', optional($address)->postal_code) }}">
                </div>

                <textarea name="notes" placeholder="Dodatočné info">{{ old('notes', optional($address)->notes) }}</textarea>

                <button type="submit">Pokračovať k doprave</button>
            </form>
        </section>
    </main>
@endsection

{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/register-fields-check.js') }}"></script>
@endpush
