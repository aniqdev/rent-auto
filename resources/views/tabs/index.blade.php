@extends('layouts.app')
@section('title', 'Rady a informace')
@section('description', 'Všechny potřebné informace, které potřebujete vědět předtím, než si karavan zapůjčíte.')
@section('keywords', 'rady a informace, podmínky, vybavení karavanů, stornopoplatky, volitelná výbava, vratná kauce, nájem zahrnuje, platba za pronájem, slevy, pojištění')
@section('class', 'faq space-top')
@section('html-attributes'){!! 'itemscope itemtype="https://schema.org/FAQPage"' !!}@endsection

@section('content')

    <div class="page-intro">
        <div class="page-intro__content">
            <div class="page-header">
                <h1>Rady a informace</h1>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__page">

        <div class="container">

            <div class="row">
            
                {{-- <div class="col-md-8 offset-md-2 col-sm-12"> --}}
                <div class="col-md-8 col-sm-12">
                
                    <div class="accordion" id="faq">

                        @foreach($tabs as $tab)
                            <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                <div class="accordion-header" id="question-{{ $tab->id }}">
                                    <h2 class="mb-0">
                                        <button type="button" class="accordion-button" data-toggle="collapse" data-target="#answer-{{ $tab->id }}" aria-expanded="false" aria-controls="answer-{{ $tab->id }}" itemprop="name">
                                            {{ $tab->name }}
                                            <i class="icofont-rounded-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div class="collapse" id="answer-{{ $tab->id }}" aria-labelledby="question-{{ $tab->id }}" data-parent="#faq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                    <div class="accordion-body" itemprop="text">
                                        {!! $tab->text !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                
                </div>

                <aside class="col-md-4 aside-light">
                    <div class="aside-body">
                        <h3>Ke stažení</h3>
                        <p><a href="{{ asset('docs/VOP_16.pdf') }}" target="__blank">Všeobecné obchodní podmínky</a></p>
                        <p><a href="{{ asset('docs/Najemni-smlouva.pdf') }}" target="__blank">Smlouva o pronájmu</a></p>
                    </div>
                </aside>
                
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
