<!-- Hlavna navigacia -->

<nav class="navbar navbar-expand-xl bg-light navbar-light">
    <div class="container-fluid justify-content-start">
{{-- added foreach - --}}
        @foreach(['Novinky','Oblečenie','Šport','Streetwear','Doplnky','Výpredaj'] as $cat)
            <a href="#" class="nav-link category-item">{{ $cat }}</a>
        @endforeach

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
                    <a class="nav-link" href="#"><img src="{{ asset('images/prihlasenie.png') }}" class="navbar-icon">Prihlásenie</a>
                </li>
                <li class="menu-item">
                    <a class="nav-link" href="#"><img src="{{ asset('images/podpora.png') }}" class="navbar-icon">Podpora</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
