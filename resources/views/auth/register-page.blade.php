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

    <div class="register-container">
        <h1>Registrácia</h1>

        <form id="registration-form">
            <input type="email" placeholder="Email" required>

            <div class="name-fields">
                <input type="text" placeholder="Meno" required>
                <input type="text" placeholder="Priezvisko" required>
            </div>

            <input type="text" placeholder="Adresa" required>
            <input type="text" placeholder="Mesto" required>
            <input type="password" placeholder="Heslo" required>

            <button type="submit" class="btn"onclick="window.location.href='index.html'">Registrovať sa</button>

            <button type="button" class="login-link" onclick="window.location.href='login-page.html'">alebo sa prihlásiť</button>


        </form>

    </div>

@endsection




{{--import javascript--}}
@push('scripts')
    <script src="js/validate-registration.js"></script>
@endpush
