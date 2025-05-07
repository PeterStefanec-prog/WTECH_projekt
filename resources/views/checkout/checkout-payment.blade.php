
{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title', 'Choose Shipping')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-payment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-progress.css') }}">
@endpush

{{--tu vkladam meniaci sa content--}}
@section('content')
<main class="container">
  <section class="summary-card">
  <h1>Zhrnutie objednávky</h1>

  <div class="progress">
    <span class="step">Adresa</span>
    <span class="separator">——————</span>
    <span class="step">Doručenie</span>
    <span class="separator">——————</span>
    <span class="step active">Platba</span>
  </div>

  <form class="payment-form"
        action="{{ route('payment.process') }}"
        method="POST">
      @csrf
    <fieldset>
        <label id="card-holder-name">
            <input
                type="text"
                name="cardholder"
                placeholder="Meno držiteľa karty"
                required
                pattern="[A-Za-z\s]+"
                title="Meno musí obsahovať iba písmená a medzery.">
        </label>

        <label>
            <input
                type="text"
                name="cardnumber"
                placeholder="Číslo karty"
                required
                inputmode="numeric"
                minlength="19"
                maxlength="19"
                pattern="^\d{4} \d{4} \d{4} \d{4}$"
                title="Číslo karty musí byť vo formáte 1234 1234 1234 1234">
        </label>


        <div class="row">
        <select name="expiry-month" required>
          <option value="" disabled selected>Mesiac</option>
          <option>01</option><option>02</option><option>03</option>
          <option>04</option><option>05</option><option>06</option>
          <option>07</option><option>08</option><option>09</option>
          <option>10</option><option>11</option><option>12</option>
        </select>

        <select name="expiry-year" required>
          <option value="" disabled selected>Rok</option>
          <option>2025</option><option>2026</option><option>2027</option>
          <option>2028</option>
        </select>

          <input
              type="text"
              name="cvc"
              placeholder="CVC"
              required
              inputmode="numeric"
              maxlength="3"
              pattern="\d{3}"
              title="CVC musí obsahovať tri číslice.">
      </div>

      <label>
        <input type="email" name="email" placeholder="Email" required>
      </label>
    </fieldset>

    <button id="pay-button" type="submit" >Zaplať</button>
  </form>
  </section>
</main>
@endsection

{{--import javascript--}}
@push('scripts')
@endpush

