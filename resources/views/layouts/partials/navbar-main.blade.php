<!-- navigacne menu -->

@php $g = $gender ?? 'men'; @endphp
<nav class="navbar bg-light navbar-light d-flex justify-content-center">
    <div class="container-fluid justify-content-start">
        <a href="{{ route('home', 'men')   }}" class="nav-link gender-item {{ $g==='men'   ? 'strong-active' : '' }}">Muži</a>
        <a href="{{ route('home', 'women') }}" class="nav-link gender-item {{ $g==='women' ? 'strong-active' : '' }}">Ženy</a>
        <a href="{{ route('home', 'kids')  }}" class="nav-link gender-item {{ $g==='kids'  ? 'strong-active' : '' }}">Deti</a>
    </div>

    <div id="name-of-shop">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Superobchod" style="height:40px; margin-right:5px;">
            <span class="h4 fw-bold mb-0">Superobchod</span>
        </a>
    </div>
</nav>
