<!-- Hlavna navigacia -->
@php $g = $gender ?? 'men'; @endphp

<nav class="navbar navbar-expand-xl bg-light navbar-light">
    <div class="container-fluid justify-content-start">


            <a href="{{ route('products.filter', [$g,'Clothes'])    }}" class="nav-link category-item">Oblečenie</a>
            <a href="{{ route('products.filter', [$g,'Sport'])      }}" class="nav-link category-item">Sport</a>
            <a href="{{ route('products.filter', [$g,'Streetwear']) }}" class="nav-link category-item">Streetwear</a>
            <a href="{{ route('products.filter', [$g,'Accessories']) }}" class="nav-link category-item">Accessories</a>
            <a href="{{ route('products.filter', [$g,'Sales']) }}" class="nav-link category-item">Sales</a>



        <button class="navbar-toggler ms-auto bg-light" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvas-right-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navmenu">
            <ul class="navbar-nav ms-auto d-flex">
                <li class="menu-item d-flex align-items-center search-group">
                    <img src="{{ asset('images/lupa.png') }}" class="navbar-icon"><input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
                </li>
                <li class="menu-item">
                    <a class="nav-link" href="#"><img src="{{ asset('images/kosik.png') }}" class="navbar-icon">2 Košík</a>
                </li>
                <li class="menu-item">
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">
                            <img src="{{ asset('images/prihlasenie.png') }}" class="navbar-icon">
                            Prihlásit sa
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('profile.show') }}">
                            <img src="{{ asset('images/prihlasenie.png') }}" class="navbar-icon">
                            {{ Auth::user()->full_name }}
                        </a>
                </li>
                <li>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link" type="submit">Odhlásiť sa</button>
                        </form>
                    @endguest
                </li>
{{--                <li class="menu-item">--}}
{{--                    <a class="nav-link" href="#"><img src="{{ asset('images/podpora.png') }}" class="navbar-icon">Podpora</a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
