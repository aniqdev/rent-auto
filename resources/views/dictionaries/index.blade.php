@extends('layouts.app')
@section('title', 'Slovník pojmů o cestování obytným autem')
@section('description', 'Zda se zajímáte o cestování obytným autem nebo karavanem, přečtěte si náš slovník pojmů ve kterém se dozvíte více.')
@section('keywords', 'slovnik, pojmů, obytné, vozy, topobytnévozy')
@section('class', 'dictionaries space-top')

@section('content')

    <div class="page-intro">
        <div class="page-intro__content">
            <div class="page-header">
                <h1>Slovník pojmů</h1>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__page">

        <div class="container">
            <ul class="nav dictionary-nav justify-content-center">

                @foreach($dictionaries as $key => $items)
                    <li class="nav-item">
                        <a href="#pojmy-{{ $key }}" class="nav-link">{{ $key }}</a>
                    </li>
                @endforeach
                
            </ul>

            <div class="dictionaries-wrapper">

                @forelse($dictionaries as $key => $items)
                    <div class="dictionary-item">
                        <h2 id="pojmy-{{ $key }}">{{ $key }}</h2>

                        <div class="dictionary-item__list">

                            @foreach($items as $item)
                                <p><a href="{{ route('pojmy.show', $item->slug) }}" title="Co je {{ $item->name }}?" class="dictionary-item__link">{{ $item->name }}</a></p>
                            @endforeach

                        </div>
                    </div>
                @empty
                    <h3 class="text-center w-100">Aktuálně nejsou k dispozici žádné pojmy.</h3>
                @endforelse

            </div>

        </div>

    </div>


    <div class="top-list top-list-page">

        <div class="content--center">

            <h2>Nejoblíbenejší vozy k pronájmu</h2>
            <span class="content-title-description">Zákazníci u nás nejčastěji zapujčují</span>

        </div>

        <x-best-caravan-list :caravans="$caravans" />

    </div>

    <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Nemůžete najít, co potřebujete?</h2>
        </div>

        <div class="cta-content">
            <p>Vyzkoušejte nás kontaktovat pomocí formuláře.</p>
            <a href="{{ route('stranky.show', 'kontakt') }}" class="primary-btn">Kontaktovat <i class="icofont-thin-right"></i></a>
        </div>
    </div>

    <the-map></the-map>

@endsection