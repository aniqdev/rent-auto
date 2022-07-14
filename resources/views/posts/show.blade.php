@extends('layouts.app')
@section('title', $post->seo_title)
@section('description', $post->seo_description)
@section('keywords', $post->seo_keywords)
@section('class', 'post space-top')

@section('content')

    <div class="page-intro">
        <div class="page-intro__content" @if($post->thumbnail) style="background: url({{ asset('storage/' . $post->thumbnail) }}) no-repeat center center;" @endif>
            <div class="page-header">

            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="div-pad">

    </div>
    <div class="main-wrapper__page">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 offset-md-2">

                    <h1 class="text-primary font-weight-bold">{{ $post->name }}</h1>

                    <hr>

                    {!! $post->text !!}

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
