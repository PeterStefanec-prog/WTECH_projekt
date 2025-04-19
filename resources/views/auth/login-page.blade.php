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


    <section class="login-container">
        <h1>Prihlásenie</h1>

        <form>
            <input type="email" placeholder="E-mail" required>
            <input type="password" placeholder="Heslo" required>

            <label class="stay-logged-in">
                <input type="checkbox">
                <span>Ostať prihlásený</span>
            </label>

            <button type="submit" class="btn primary" onclick="window.location.href='index.html'">Prihlásiť sa</button>

            <p class="register-text">Nie ste zaregistrovaný?</p>

            <button type="button" class="btn secondary" onclick="window.location.href='register-page.html'">Registrácia</button>

            <button type="button" class="btn admin-login" onclick="window.location.href='admin_index.html'">Prihlásiť sa ako admin (demo)</button>
        </form>
    </section>

@endsection


