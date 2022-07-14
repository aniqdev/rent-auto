@extends('layouts.light')
@section('title', 'Porovnání obytných vozů')
@section('description', 'Porovnejte všechny naše obytné vozy.')
@section('keywords', 'porovnani, obytne, vozy')
@section('class', 'compare')

@section('content')

    <div class="main-wrapper__gray compare-wrapper">

        {{--  <div class="cta__wrapper">
            <div class="cta-header">
                <h1>Vyberte si svůj obytný vůz</h1>
            </div>
        </div>  --}}

        <div class="lineup-compare">

            <div class="lineup-compare__category">
                <div class="lineup-compare__category-intro">
                    <div class="filter mb-3">
                        <select name="category" class="form-control-solid" id="category">
                            <option value="">Všechny kategorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter mb-3">
                        <select name="beds" class="form-control-solid" id="beds">
                            <option value="">Nerozhoduje počet lůžek</option>
                        </select>
                    </div>
                </div>
                <ul class="vehicle__list">
                    <li class="parameter general-info">
                        <div class="list__name">Základní informace</div>
                        <ul class="list__values">
                            <li class="list__item" data-param="1">Model</li>
                            <li class="list__item" data-param="2">Charakteristika</li>
                            <li class="list__item" data-param="20">Typ</li>
                            <li class="list__item" data-param="3">Barva</li>
                            <li class="list__item" data-param="4">Délka</li>
                            <li class="list__item" data-param="5">Šířka</li>
                            <li class="list__item" data-param="6">Výška</li>
                            <li class="list__item" data-param="7">Váha</li>
                            <li class="list__item" data-param="8">V provozu od</li>
                        </ul>
                    </li>
                    <li class="parameter motor">
                        <div class="list__name">Motor</div>
                        <ul class="list__values">
                            <li class="list__item" data-param="9">Motor</li>
                            <li class="list__item" data-param="10">Výkon</li>
                            <li class="list__item" data-param="11">Emise</li>
                            <li class="list__item" data-param="12">Převodovka</li>
                            <li class="list__item" data-param="13">Objem palivové nádrže</li>
                            <li class="list__item" data-param="14">Spotřeba</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="lineup-compare__data">
                <div class="swiper-wrapper">
                    @foreach($caravans as $caravan)
                        <div class="vehicle-item">

                            <div class="vehicle__thumbnail">
                                <a href="{{ route('karavany.show', $caravan->slug) }}">
                                    <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="{{ $caravan->name }}">
                                </a>
                            </div>

                            <div class="vehicle__name">
                                <a href="{{ route('karavany.show', $caravan->slug) }}">
                                    {{ $caravan->name }}
                                </a>
                            </div>

                            <div class="vehicle__price">
                                <div class="title">nájemné za den</div>
                                <div class="price">
                                    <span class="text-muted">od</span>
                                    {{ number_format($caravan->price_from, 0, ',', ' ') }} Kč
                                    <span class="text-muted">vč. DPH</span>
                                </div>
                            </div>

                            <ul class="vehicle__list">
                                <li class="parameter general-info">
                                    <div class="list__name">Základní informace</div>
                                    <ul class="list__values">
                                        <li class="list__item" data-param="1">
                                            <span class="mobile-label">Model:</span>
                                            {{ $caravan->name }}
                                        </li>
                                        <li class="list__item" data-param="2">
                                            <span class="mobile-label">Charakteristika:</span>
                                            {{ $caravan->charasteristics }}
                                        </li>
                                        <li class="list__item" data-param="3">
                                            <span class="mobile-label">Typ:</span>
                                            {{ $caravan->type }}
                                        </li>
                                        <li class="list__item" data-param="4">
                                            <span class="mobile-label">Barva:</span>
                                            {{ $caravan->color }}
                                        </li>
                                        <li class="list__item" data-param="5">
                                            <span class="mobile-label">Délka:</span>
                                            {{ $caravan->length }} m
                                        </li>
                                        <li class="list__item" data-param="6">
                                            <span class="mobile-label">Šířka:</span>
                                            {{ $caravan->width }} m
                                        </li>
                                        <li class="list__item" data-param="7">
                                            <span class="mobile-label">Výška:</span>
                                            {{ $caravan->height }} m
                                        </li>
                                        <li class="list__item" data-param="8">
                                            <span class="mobile-label">Hmotnost:</span>
                                            {{ $caravan->weight }} kg
                                        </li>
                                        <li class="list__item" data-param="9">
                                            <span class="mobile-label">V provozu od:</span>
                                            {{ $caravan->year }}
                                        </li>
                                    </ul>
                                </li>
                                <li class="parameter motor">
                                    <div class="list__name">Motor</div>
                                    <ul class="list__values">
                                        <li class="list__item" data-param="10">
                                            <span class="mobile-label">Motor:</span>
                                            {{ $caravan->motor }}
                                        </li>
                                        <li class="list__item" data-param="11">
                                            <span class="mobile-label">Výkon:</span>
                                            {{ $caravan->power }} koní
                                        </li>
                                        <li class="list__item" data-param="12">
                                            <span class="mobile-label">Emisní třída:</span>
                                            EURO {{ $caravan->emission }}
                                        </li>
                                        <li class="list__item" data-param="13">
                                            <span class="mobile-label">Druh paliva:</span>
                                            {{ $caravan->fuel }}
                                        </li>
                                        <li class="list__item" data-param="14">
                                            <span class="mobile-label">Objem palivové nádrže:</span>
                                            {{ $caravan->fuel_tank }}
                                        </li>
                                        <li class="list__item" data-param="15">
                                            <span class="mobile-label">Převodovka:</span>
                                            {{ $caravan->transmission }}
                                        </li>
                                    </ul>
                                </li>
                                <li class="parameter interior">
                                    <div class="list__name">Motor</div>
                                    <ul class="list__values">
                                        <li class="list__item" data-param="10">
                                            <span class="mobile-label">Motor:</span>
                                            {{ $caravan->motor }}
                                        </li>
                                        <li class="list__item" data-param="11">{{ $caravan->power }} koní</li>
                                        <li class="list__item" data-param="12">EURO {{ $caravan->emission }}</li>
                                        <li class="list__item" data-param="13">{{ $caravan->fuel }}</li>
                                        <li class="list__item" data-param="14">{{ $caravan->fuel_tank }}</li>
                                        <li class="list__item" data-param="15">{{ $caravan->transmission }}</li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    @endforeach
                </div>
            </div>

             {{-- <div class="swiper-wrapper">

                @foreach($caravans as $caravan)

                    <div class="vehicle-item">

                        <div class="vehicle__thumbnail">
                            <a href="{{ route('karavany.show', $caravan->slug) }}">
                                <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="{{ $caravan->name }}" class="img-fluid">
                            </a>
                        </div>

                        <div class="vehicle__list">

                            <ul class="general-info">
                                <li>{{ $caravan->name }}</li>
                                <li>{{ $caravan->charasteristics }}</li>
                                <li>{{ $caravan->length }} m</li>
                                <li>{{ $caravan->width }} m</li>
                                <li>{{ $caravan->height }} m</li>
                                <li>{{ $caravan->weight }} kg</li>
                                <li>{{ $caravan->year }}</li>
                            </ul>

                        </div>

                    </div>

                @endforeach

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div> --}}

        </div>

    </div>



    {{--  <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Nemůžete najít, co potřebujete?</h2>
        </div>

        <div class="cta-content">
            <p>Vyzkoušejte nás kontaktovat pomocí formuláře.</p>
            <a href="{{ route('stranky.show', 'kontakt') }}" class="primary-btn">Kontaktovat</a>
        </div>
    </div>  --}}

@endsection
