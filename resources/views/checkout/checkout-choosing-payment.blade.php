
{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title', 'Choose Payment')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-choose-shipping-payment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout-progress.css') }}">
@endpush

{{--tu vkladam meniaci sa content--}}
@section('content')
<main class="container checkout-shipping">
  <section class="summary-card">
    <h1>Zhrnutie objednavky</h1>
    <div class="progress">
      <span class="step">Adresa</span>
      <span class="separator">——————</span>
      <span class="step">Doručenie</span>
      <span class="separator">——————</span>
      <span class="step active">Platba</span>
    </div>
    <form>
      <fieldset>
<!--        <legend>Spôsob platby</legend>-->
        <div class="shipping-option">
          <label><input type="radio" name="delivery" checked>Platobná karta</label>
        </div>

        <div class="shipping-option">
          <label><input type="radio" name="delivery">Apple pay</label>
        </div>

        <div class="shipping-option">
          <label><input type="radio" name="delivery">Pay pall</label>
        </div>
      </fieldset>
      <button type="button" onclick="window.location.href='{{ route('payment.loadPayment') }}'">Pokračovať k platbe</button>
    </form>
  </section>
</main>
@endsection

{{--import javascript--}}
@push('scripts')
@endpush
