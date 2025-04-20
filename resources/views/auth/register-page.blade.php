{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title','Domov')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register-page.css') }}">
@endpush


{{--tu vkladam meniaci sa content--}}
@section('content')
<main>
    <div class="register-container">
        <h1>Registrácia</h1>

        <form method="POST" action="{{ route('register') }}" id="registration-form">
            @csrf

            <div class="name-fields">
                <input type="text" name="first_name" placeholder="Meno"  value="{{ old('first_name') }}" required>
                @error('first_name') <div class="text-danger">{{ $message }}</div> @enderror
                <input type="text" name="last_name" placeholder="Priezvisko" value="{{ old('last_name') }}" required>
                @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror


            <input type="text"  name="address" placeholder="Adresa" value="{{ old('address') }}" required>
            @error('address') <div class="text-danger">{{ $message }}</div> @enderror

            <input type="text"  name="city" placeholder="Mesto" value="{{ old('city') }}" required>
            @error('city') <div class="text-danger">{{ $message }}</div> @enderror

            <input type="text"  name="postal_code" placeholder="PSC" value="{{ old('postal_code') }}" required>
            @error('postal_code') <div class="text-danger">{{ $message }}</div> @enderror

            <input type="text"  name="country" placeholder="Stat" value="{{ old('country') }}" required>
            @error('country') <div class="text-danger">{{ $message }}</div> @enderror

            <input type="password" name="password" placeholder="Heslo" required>
            <input type="password" name="password_confirmation" placeholder="Potvrď heslo" required>
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror

            <button type="submit" class="btn">Registrovať sa</button>

            <a href="{{ route('login') }}" class="login-link">alebo sa prihlásiť</a>

        </form>

    </div>
</main>
@endsection




{{--import javascript--}}
@push('scripts')
    <script src="js/validate-registration.js"></script>
@endpush
