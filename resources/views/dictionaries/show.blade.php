@extends('layouts.app')
@section('title', $dictionary->seo_title)
@section('description', $dictionary->seo_description)
@section('keywords', $dictionary->seo_keywords)
@section('class', 'dictionary space-top')

@section('content')
    
    <div class="page-intro intro-overlay">
        <div class="page-intro__content" @if($dictionary->thumbnail) style="background: url({{ asset('storage/' . $dictionary->thumbnail) }}) no-repeat center center;" @endif>
            <div class="page-header invert">
                <h1>Co je <span class="text-secondary font-weight-bold">{{ $dictionary->name }}</span>?</h1>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__page">

        <div class="container">

            <div class="row">

                <div class="col-md-8 offset-md-2">
                
                    {!! $dictionary->text !!}

                    <div class="mt-5 text-center">
                        <a href="{{ route('pojmy.index') }}" title="Zpět na seznam pojmů" class="secondary-btn"><i class="icofont-thin-left"></i> Všechny pojmy</a>
                    </div>
                
                </div>

            </div>

        </div>

    </div>


    {{-- <div class="top-list top-list-page">

        <div class="content--center">

            <h2>Nejoblíbenejší vozy k pronájmu</h2>
            <span class="content-title-description">Zákazníci u nás nejčastěji zapujčují</span>

        </div>

        <x-best-caravan-list :caravans="$caravans" />

    </div> --}}

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
