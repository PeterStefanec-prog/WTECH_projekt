@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\CartItem;

    // vypočítame počet položiek v košíku
    if (Auth::check()) {
        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
    } else {
        $cart = session()->get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));
    }

    // gender na vyhľadávanie
    $g = $gender ?? 'men';
@endphp

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right-navbar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto d-flex">

            <!-- vyhľadávanie -->
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

            <!-- dynamický košík -->
            <li class="menu-item">
                <a class="nav-link" href="{{ route('shopping_cart') }}">
                    <img src="{{ asset('images/kosik.png') }}" class="navbar-icon">
                    {{ $cartCount }} Košík
                </a>
            </li>

            <!-- prihlásenie / profil + odhlásenie -->
            @guest
                <li class="menu-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <img src="{{ asset('images/prihlasenie.png') }}" class="navbar-icon">
                        Prihlásiť sa
                    </a>
                </li>
            @else
                <li class="menu-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">
                        <img src="{{ asset('images/prihlasenie.png') }}" class="navbar-icon">
                        {{ Auth::user()->full_name }}
                    </a>
                </li>
                <li class="menu-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="nav-link btn btn-link" type="submit">Odhlásiť sa</button>
                    </form>
                </li>

                <!-- admin sekcia -->
                @if(Auth::user()->is_admin)
                    <li class="menu-item mb-2">
                        <a class="nav-link" style="font-weight: bold; color: black; background-color: lightblue;">
                            ADMIN SEKCIA
                        </a>
                    </li>
                @endif
            @endguest

        </ul>
    </div>
</div>
