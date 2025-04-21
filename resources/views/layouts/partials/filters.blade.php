{{-- resources/views/layouts/partials/filters.blade.php --}}
<aside class="filters">
    <form
        method="GET"
        action="{{ route('products.filter', [$gender, $category]) }}"
    >
        <div class="filters-header">
            <h2 id="filtre">Filtre</h2>
            {{-- reset – odkaz na čistú stránku bez query stringu --}}
            <a href="{{ route('products.filter', [$gender, $category]) }}"
               id="reset-filters"
            >Vymaž filtre</a>
        </div>

        {{-- FARBY --}}
        <fieldset class="filter-section">
            <h3>Farby</h3>
            @foreach(['Blue','Green','Red','Purple'] as $c)
                <label class="d-block">
                    <input
                        type="checkbox"
                        name="color[]"
                        value="{{ $c }}"
{{--                        NECHAME ZASKRTNUTE FARBY AJ PO RELOAD - berie to z query stringu https--}}
                        {{ in_array($c, request('color', [])) ? 'checked' : '' }}
                    >
                    {{ [
                        'Blue' => 'Modrá',
                        'Green' => 'Zelená',
                        'Red' => 'Červená',
                        'Purple' => 'Fialová',
                    ][$c] ?? $c }}
                </label>
            @endforeach
        </fieldset>

        {{-- ZNAČKA --}}
        <fieldset class="filter-section">
            <h3>Značka</h3>
            @foreach(['Nike','Adidas','Puma','Reebok'] as $b)
                <label class="d-block">
                    <input
                        type="checkbox"
                        name="brand[]"
                        value="{{ $b }}"
                        {{ in_array($b, request('brand', [])) ? 'checked' : '' }}
                    >
                    {{ $b }}
                </label>
            @endforeach
        </fieldset>

        {{-- CENA --}}
        <fieldset class="filter-section">
            <h3>Cena</h3>
            <input
                type="range"
                name="max"
                min="0"
                max="1000"
                id="price-range"
                value="{{ request('max', 500) }}"
            >
            <label for="price-range">
                Najdrahšie
                <span id="range-value">{{ request('max', 500) }} $</span>
            </label>
        </fieldset>



        <button type="submit" id="submit_but" >
            Použiť filtre
        </button>
    </form>
</aside>
