{{--pouzi app.blade.php ako zaklad - definuje navbar, footer atd--}}
@extends('layouts.app')

{{--menim title podla toho kde som--}}
@section('title','Domov')

{{--vkladanie styles do zasobnika--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_add_product_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/size-selector.css') }}">
@endpush


{{--tu vkladam meniaci sa content--}}
@section('content')




{{-- SHOW SUCCESS OR ERROR MESSAGES --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif



{{-- FORM START --}}
<form method="POST"
      action="{{ route('admin.store_product') }}"
      enctype="multipart/form-data">    {{-- aby laravel vedel spracova subory - enkodovanie --}}
    @csrf

    <h1 class="section-title">Nový produkt</h1>

    {{-- IMAGES GRID --}}
    <main class="container">
        <section class="product-images-grid" >
            @for($i = 0; $i < 4; $i++)
                <div class="product-image-div">
                    <label style="cursor:pointer; width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                        {{-- pick the i-th existing photo or fallback to placeholder --}}
                        @php
                            $existing = isset($product)
                              ? ($product->photos->get($i)->url ?? null)
                              : null;
                        @endphp
                        <img
                            src="{{ old("photos.$i")
                         ? asset('storage/' . old("photos.$i"))
                         : ($existing ?? asset('images/add_new.svg')) }}"
                            class="product-image"
                            id="preview-{{ $i }}"
                        >
                        {{-- hidden file input --}}
                        <input
                            type="file"
                            name="photos[]"
                            accept="image/*"
                            style="display:none"
                            onchange="document.getElementById('preview-{{ $i }}').src = window.URL.createObjectURL(this.files[0]);"
                        >
                    </label>
                </div>
            @endfor

        </section>



        {{-- Product parameters --}}
        <section class="product-description">
            {{-- Name --}}
            <h2 for="nazov" class="desc-labels" >Názov</h2>
            <input
                id="nazov"
                name="name"
                class="form-control mb-3"
                type="text"
                placeholder="Názov produktu..."
                value="{{ old('name', $product->name ?? '') }}" {{-- old (uz som vyplnal?), $product->name ak editujeme --}}
            >
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror


            {{-- Gender --}}
            <section class="mb-3">
                <h2 class="desc-labels">Pohlavie</h2><br>
                @foreach(['women'=>'Ženy','men'=>'Muži','kids'=>'Deti'] as $val=>$label)
                    <label>
                        <input
                            type="radio"
                            name="gender"
                            value="{{ $val }}"
                            {{ old('gender', $product->gender ?? '') === $val ? 'checked' : '' }}   {{-- ak je old nacita, inak zoberieme z produktu ak je to edit ( a podla toho dame checked ) --}}
                        > {{ $label }}
                    </label>
                @endforeach
            </section>
            @error('gender') <div class="text-danger">{{ $message }}</div> @enderror


            {{-- Price --}}
            <h2 class="desc-labels" for="cena">Cena</h2>
            <input
                id="cena"
                name="price"
                class="form-control mb-3"
                type="number"
                placeholder="Cena produktu..."
                min="0"
                value="{{ old('price', $product->price ?? '') }}"
            >
            @error('price') <div class="text-danger">{{ $message }}</div> @enderror

            {{-- Brand --}}
            <h2 class="desc-labels" for="brand">Značka</h2>
            <input
                id="brand"
                name="brand"
                class="form-control mb-3"
                type="text"
                placeholder="Znacka produktu..."
                min="0"
                value="{{ old('brand', $product->brand ?? '') }}"
            >
            @error('brand') <div class="text-danger">{{ $message }}</div> @enderror



            {{-- Category --}}
            <div class="d-flex justify-content-between mb-3">
                <div class="type-column">
                    <h2 class="desc-labels">Typ</h2>
                    <ul class="type-list">
                        @foreach([
                          'Clothes'=>'Oblečenie',
                          'Sport'=>'Šport','Streetwear'=>'Streetwear',
                          'Accessories'=>'Doplnky','Sales'=>'Vypredaj'
                        ] as $val=>$label)
                            <li
                                data-value="{{ $val }}"
                                class="{{ old('typ', $product->category ?? 'oblecenie') === $val ? 'selected' : '' }}"
                            >{{ $label }}</li>
                        @endforeach
                    </ul>
                    <input
                        type="hidden"
                        id="typ-produktu"
                        name="category"
                        value="{{ old('typ', $product->category ?? '') }}"
                    >
                </div>



                {{--Color --}}
                <div style="width: 50%;">
                    <h2 class="desc-labels" for="farba">Farba</h2>
                    <select
                        id="farba"
                        name="color"
                        class="form-control mb-1"
                    >
                        @foreach(['cervena'=>'Červená','modra'=>'Modrá','zelena'=>'Zelená','cierna'=>'Čierna','biela'=>'Biela'] as $val=>$label)
                            <option
                                value="{{ $val }}"
                                {{ old('color', $product->color ?? '') === $val ? 'selected' : '' }}
                            >{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('color') <div class="text-danger">{{ $message }}</div> @enderror
            @error('category')   <div class="text-danger">{{ $message }}</div> @enderror


            {{-- Sizes --}}
            <h2 class="desc-labels">Veľkosti</h2>
            <fieldset class="size-selector mb-3">
                @php
                    $oldSizes = old('size', isset($product)
                                ? $product->sizes->pluck('size')->toArray()
                                : []);

                @endphp {{-- Vytiahne to pomocou pluck vlastne len atributy size teda XL, M, L ...  --}}
                @foreach(['S','M','L','XL'] as $s)
                    <label>
                        <input
                            type="checkbox"
                            name="size[]"
                            value="{{ $s }}"
                            {{ in_array($s, $oldSizes) ? 'checked' : '' }}
                        ><span>{{ $s }}</span>
                    </label>
                @endforeach
            </fieldset>
            @error('size') <div class="text-danger">{{ $message }}</div> @enderror


            {{-- DESCRIPTION --}}
            <h2 class="desc-labels" for="popis">Popis</h2>
            <textarea
                id="popis"
                name="description"
                class="form-control mb-3"
                rows="4"
                placeholder="Popis produktu..."
            >{{ old('description', $product->description ?? '') }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror

            {{-- SUBMIT --}}
            <button type="submit" class="add-to-store">Pridať</button>        </section>
    </main>
</form>






@endsection

{{--import javascript--}}
@push('scripts')
    <script src="{{ asset('js/filters.js') }}"></script>
    <script src="{{ asset('js/quantities.js') }}"></script>
    <script src="{{ asset('js/image-zoom.js') }}"></script>
    <script src="{{ asset('js/type-selector.js') }}"></script>
@endpush
