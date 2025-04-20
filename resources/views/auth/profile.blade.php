{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title','Domov')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="css/checkout-address.css">
    <link rel="stylesheet" href="css/orders-table.css">
    <link rel="stylesheet" href="css/profile.css">
@endpush


{{--tu vkladam meniaci sa content--}}
@section('content')
    {{-- flesh message after succesfull update --}}
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <main class="container">
        <section class="summary-card">
            <h2>Váš účet</h2>
            <h2>{{ $user->full_name }}</h2>

            <form method="POST" action="{{ route('profile.update') }}" class="address-form">
                @csrf
{{--                method PUT is needed because form in laravel has to be sent as POST request but we need it to be PUT--}}
                @method('PUT')

                <fieldset>
                    {{-- Email --}}
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror

                    {{-- Meno / Priezvisko --}}
                    <div class="name-fields">
                        <input
                            type="text"
                            name="first_name"
                            placeholder="Meno"
                            value="{{ old('first_name', $user->first_name) }}"
                            required
                        >
                        @error('first_name') <div class="text-danger">{{ $message }}</div> @enderror

                        <input
                            type="text"
                            name="last_name"
                            placeholder="Priezvisko"
                            value="{{ old('last_name', $user->last_name) }}"
                            required
                        >
                        @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Ulica --}}
                    <input
                        type="text"
                        name="address"
                        placeholder="Adresa"
                        value="{{ old('address', $user->address->street ?? '') }}"
                        required
                    >
                    @error('address') <div class="text-danger">{{ $message }}</div> @enderror

                    {{-- Mesto --}}
                    <input
                        type="text"
                        name="city"
                        placeholder="Mesto"
                        value="{{ old('city', $user->address->city ?? '') }}"
                        required
                    >
                    @error('city') <div class="text-danger">{{ $message }}</div> @enderror

                    {{-- Krajina + PSČ --}}
                    <div class="postcode-row">
                        <select name="country" required>
                            <option value="Slovensko" {{ old('country', $user->address->country ?? '') === 'Slovensko' ? 'selected' : '' }}>
                                Slovensko
                            </option>
                            <option value="Česká republika" {{ old('country', $user->address->country ?? '') === 'Česká republika' ? 'selected' : '' }}>
                                Česká republika
                            </option>
                        </select>

                        <input
                            type="text"
                            name="postal_code"
                            placeholder="PSČ"
                            value="{{ old('postal_code', $user->address->postal_code ?? '') }}"
                            required
                        >
                        @error('postal_code') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </fieldset>

                <button type="submit">Uložiť údaje</button>
{{--                <button--}}
{{--                    type="button"--}}
{{--                    onclick="window.location.href='{{ route('password.request') }}'">--}}
{{--                    Zmeniť heslo--}}
{{--                </button>--}}
            </form>
        </section>
    </main>



<!-- Orders Table Section -->
<section class="orders-section">
  <h2>Moje objednávky</h2>
  <table class="orders-table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Meno zákazníka</th>
      <th>Cena</th>
      <th>Datum objednávky</th>
      <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>300</td>
      <td>Jozko Mrkvicka</td>
      <td>$400</td>
      <td>08.01.2025</td>
      <td>Zaplatené</td>
    </tr>
    <tr>
      <td>300</td>
      <td>Jozko Mrkvicka</td>
      <td>$400</td>
      <td>08.01.2025</td>
      <td>Zaplatené</td>
    </tr>
    <tr>
      <td>300</td>
      <td>Jozko Mrkvicka</td>
      <td>$400</td>
      <td>08.01.2025</td>
      <td>Zaplatené</td>
    </tr>
    <tr>
      <td>300</td>
      <td>Jozko Mrkvicka</td>
      <td>$400</td>
      <td>08.01.2025</td>
      <td>Zaplatené</td>
    </tr>
    </tbody>
  </table>
</section>

@endsection
