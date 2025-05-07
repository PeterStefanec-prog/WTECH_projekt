
{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title', 'Choose Shipping')

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
      <span class="step active">Doručenie</span>
      <span class="separator">——————</span>
      <span class="step">Platba</span>
    </div>
      <form action="{{ route('shipping.store') }}" method="POST">
          @csrf
          <fieldset>
              @foreach($shippingMethods as $method)
                  <section class="shipping-option">
                      <label>
                          <input
                              type="radio"
                              name="shipping_method"
                              value="{{ $method->id }}"
                              {{ $loop->first ? 'checked' : '' }}
                          >
                          {{ $method->name }}
                      </label>
                      <small>{{ $method->shipping_time }}</small>
                  </section>
              @endforeach
          </fieldset>

          <button type="submit">
              Pokračovať k platbe
          </button>
      </form>
  </section>
</main>
@endsection

{{--import javascript--}}
@push('scripts')
@endpush
