@extends('layouts.app')
@section('title', 'Rezervace č. ' . $reservation->id)
@section('class', 'confirmation space-top')

@section('content')

    <!-- Měřicí kód Sklik.cz -->
    {{-- <script type="text/javascript">
        var seznam_cId = 100108307;
        var seznam_value = 0;
    </script>
    <script type="text/javascript" src="https://www.seznam.cz/rs/static/rc.js" async></script> --}}

    <script type="text/javascript" src="https://c.seznam.cz/js/rc.js"></script>
    <script>
        var conversionConf = {
            id: 100108307,
            value: 0
        };
        if (window.rc && window.rc.conversionHit) {
            window.rc.conversionHit(conversionConf);
        }
    </script>

    <div class="confirmation-intro">
        <div class="page-intro__content">
            <div class="confirmation-header">
                <h1>Rezervace byla odeslána</h1>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__confirmation">

        <div class="container">

            <div class="row">

                <div class="col-md-8 offset-md-2">

                    <div class="cardbox-confirmation">

                        <i class="icofont-check-alt text-success"></i>
                        <div class="message">
                            <h3>Děkujeme Vám za Vaši rezervaci.</h3>
                            <p>
                                Na Vaši e-mailovou adresu jsme Vám zaslali souhrn Vaší rezervace.<br />
                                O schválení rezervace Vás budeme informovat na e-mailovou adresu.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="cta__wrapper">
        <div class="cta-content">
            <p>Neváhejte si nyní vrátit na domovskou stránku.</p>
            <a href="{{ route('home') }}" class="primary-btn">Domovská stránka</a>
        </div>
    </div>

    <the-map></the-map>

@endsection
