{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title','Domov')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endpush


{{--tu vkladam meniaci sa content--}}
@section('content')
<main>

    <section class="login-container">
        <h1>Prihlásenie</h1>

        <form method="POST" action="{{ route('login') }}">
{{--         Laravel na serveri porovna, ci tento token sedi s tym v session – ak nie, formular zlyha--}}
            @csrf

{{--            we know how the input will be called in the controller thanks to the name attribute--}}
            <input type="email" name="email" placeholder="E-mail" value="{{ old('email')  }}" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror

            <input type="password" name="password" placeholder="Heslo" required>
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror

            <label class="stay-logged-in">
                <input type="checkbox" name="remember">
                <span>Ostať prihlásený</span>
            </label>

            <button type="submit" class="btn primary">Prihlásiť sa</button>

            <p class="register-text">Nie ste zaregistrovaný?</p>

            <a href="{{ route('register') }}" class="btn secondary">Registrácia</a>

        </form>
    </section>
</main>
@endsection


