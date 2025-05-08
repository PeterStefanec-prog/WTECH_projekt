@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\CartItem;

    if (Auth::check()) {
        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
    } else {
        $cart = session()->get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));
    }

    $g = $gender ?? 'men';
@endphp


    <!-- Hlavna navigacia -->
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
                    <form action="{{ route('products.filter', [$g]) }}" method="GET" class="d-flex">
                        <input
                            type="text"
                            name="search"
                            class="form-control nav-textfield"
                            placeholder="Vyhľadaj"
                            value="{{ request('search') }}"
                        >
                        <button class="btn btn-link p-0 ms-2" type="submit">
                            <img src="{{ asset('images/lupa.png') }}" class="navbar-icon">
                        </button>
                    </form>
                </li>
                <li class="menu-item">
                    <a class="nav-link" href="{{ route('shopping_cart') }}">
                        <img src="{{ asset('images/kosik.png') }}" class="navbar-icon">
                        {{ $cartCount }} Košík
                    </a>
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
                </li>

                    {{-- novy blok pre admina --}}
                    @if(Auth::user()->is_admin)
                        <li class="menu-item mb-2">
                            <a class="nav-link" style="font-weight: bold; color: black; background-color: lightblue;">ADMIN SEKCIA</a>
                        </li>
                    @endif
                @endguest
{{--                <li class="menu-item">--}}
{{--                    <a class="nav-link" href="#"><img src="{{ asset('images/podpora.png') }}" class="navbar-icon">Podpora</a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
