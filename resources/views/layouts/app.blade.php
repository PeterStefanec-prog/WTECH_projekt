<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF token pre AJAX --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamicky title: ak nie je, použije sa 'Adko Petko Market' --}}
    <title>@yield('title','Adko Petko Market')</title>

    {{-- globalne CSS: Bootstrap CDN + vlastny navbar.css --}}
    {{-- integrity je vlastne SHa hash suboru - prepocita hash po sitahnuti, ak nesedi je problem --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384‑EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    {{-- Space pre per‑page CSS --}}
    @stack('styles')
</head>
<body>

{{-- Top‑bar + hl. navigacia + offcanvas + footer --}}
@include('layouts.partials.top-bar')
@include('layouts.partials.navbar-main')
@include('layouts.partials.navbar-category')
@include('layouts.partials.offcanvas')

{{-- Tu dame obsah kazdej podstranky--}}

    @yield('content')


@include('layouts.partials.footer')

{{-- Globálne JS: Bootstrap bundle --}}
<script src="https://cdn.jsdelivr.net/…bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/navbar.js') }}"></script>

{{-- Space pre per‑page JS --}}
@stack('scripts')


</body>
</html>
