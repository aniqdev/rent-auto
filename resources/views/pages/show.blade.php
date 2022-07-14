@extends('layouts.app')
@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('keywords', $page->seo_keywords)
@section('class', 'page space-top')

@section('content')

    <div class="page-intro">
        <div class="page-intro__content" @if($page->thumbnail) style="background: url({{ asset('storage/' . $page->thumbnail) }}) no-repeat center center;" @endif>
            <div class="page-header">
                <h1>{{ $page->name }}</h1>
                {{-- <x-date-picker/> --}}
            </div>
            {{-- <nav class="nav nav-hover" role="tablist">
                <a href="#kategorie-vsechny" class="nav-item active" data-toggle="tab" role="tab" aria-controls="kategorie-vsechny" aria-selected="true">
                    Všechny vozy
                    <span class="count">({{ $caravans->count() }})</span>
                </a>

                @foreach($categories as $category)
                    <a href="#kategorie-{{ $category->slug }}" class="nav-item" data-toggle="tab" role="tab" aria-controls="kategorie-{{ $category->slug }}" aria-selected="false">
                        {{ $category->name }}
                        <span class="count">({{ $category->caravans->count() }})</span>
                    </a>
                @endforeach
            </nav> --}}

        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__page">

        <div class="container">

            <div class="row">

                @if($page->slug == 'kontakt')

                    <div class="col-md-6">

                        {!! $page->text !!}

                    </div>

                    <div class="col-md-6">

                        <x-contact-form />





                </div>
                @else

                    <div class="col-md-10 offset-md-1">

                        {!! $page->text !!}

                    </div>

                @endif

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
