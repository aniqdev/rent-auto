@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa karavanů</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Vrátit se zpět">
                    <a href="{{ url()->previous() }}" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                            </g>
                        </svg>
                    </span>Zpět</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row mb-8">    
                <div class="col-lg-12">
                    <div class="card card-custom" data-card="true" id="kt_card_1">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Nový karavan
                                </h3>
                            </div>						
                        </div>

                        {!! Form::open(['route' => 'admin.karavany.store', 'files' => true]) !!}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('name', 'Název') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Carado T448']) !!}
                                        <span class="form-text text-muted">Prosím zadejte hlavní název karavanu.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('subtitle', 'Podnázev') !!}
                                        {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'obytný vůz s alkovnou']) !!}
                                        <span class="form-text text-muted">Prosím zadejte vedlejší název karavanu.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('charasteristics', 'Charakteristika') !!}
                                        {!! Form::text('charasteristics', null, ['class' => 'form-control', 'placeholder' => 'luxusní vůz s alkovnou pro šest osob']) !!}
                                        <span class="form-text text-muted">Prosím zadejte krátkou charakteristiku karavanu.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('caravan_category_id', 'Kategorie') !!}
                                        {!! Form::select('caravan_category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Zvolte možnost']) !!}
                                        <span class="form-text text-muted">Prosím vyberte kategorií karavanu.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('spz', 'SPZ') !!}
                                        {!! Form::text('spz', null, ['class' => 'form-control', 'placeholder' => '4AM 2367']) !!}
                                        <span class="form-text text-muted">Prosím zadejte SPZ karavanu.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('thumbnail[]', 'Náhledový obrázek') !!}
                                        <div class="custom-file">
                                            {!! Form::file('thumbnail[]', ['class' => 'custom-file-input']) !!}
                                            <label class="custom-file-label" for="customFile">Vyberte obrázek</label>
                                        </div>
                                        <span class="form-text text-muted">Prosím vyberte hlavní obrázek karavanu (.png).</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('floor_plan[]', 'Půdorys karavanu') !!}
                                        <div class="custom-file">
                                            {!! Form::file('floor_plan[]', ['class' => 'custom-file-input']) !!}
                                            <label class="custom-file-label" for="customFile">Vyberte obrázek půdorysu</label>
                                        </div>
                                        <span class="form-text text-muted">Prosím vyberte obrázek půdorysu karavanu (.png, .jpg).</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('video', 'Video') !!}
                                        {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'https://youtube.com']) !!}
                                        <span class="form-text text-muted">Prosím zadejte link videa ze služby Youtube.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('living_comfort', 'Komfort bydlení') !!}
                                        {!! Form::number('living_comfort', null, ['class' => 'form-control', 'placeholder' => '1-10']) !!}
                                        <span class="form-text text-muted">Prosím zadejte číselnou hodnotu komfortu bydlení.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('driving_comfort', 'Komfort jízdy') !!}
                                        {!! Form::number('driving_comfort', null, ['class' => 'form-control', 'placeholder' => '1-10']) !!}
                                        <span class="form-text text-muted">Prosím zadejte číselnou hodnotu komfortu jízdy.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('equipment', 'Provedení vozu') !!}
                                        {!! Form::number('equipment', null, ['class' => 'form-control', 'placeholder' => '1-10']) !!}
                                        <span class="form-text text-muted">Prosím zadejte číselnou hodnotu provedení vozu.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('operating_costs', 'Provozní náklady') !!}
                                        {!! Form::number('operating_costs', null, ['class' => 'form-control', 'placeholder' => '1-10']) !!}
                                        <span class="form-text text-muted">Prosím zadejte číselnou hodnotu provozních nákladů.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('short_description', 'Krátký popis') !!}
                                        <div class="tinyeditor form-control" id="short_description" placeholder="Polointegrovaný obytný vůz s ...">
                                            {!! old('short_description') !!}
                                        </div>
                                        <span class="form-text text-muted">Prosím v krátkosti opište karavan.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('description', 'Popis') !!}
                                        <div class="tinyeditor form-control" id="description" placeholder="Představujeme vám novou kategorii luxusních polointegrovaných obytných vozů ...">
                                            {!! old('description') !!}
                                        </div>
                                        <span class="form-text text-muted">Prosím zadejte podrobný popis karavanu.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('key_benefits', 'Klíčové vlastnosti') !!}
                                        <div class="tinyeditor form-control" id="key_benefits" placeholder="- navigace">
                                            {!! old('key_benefits') !!}
                                        </div>
                                        <span class="form-text text-muted">Prosím zadejte klíčové vlastnosti karavanu v odrážkách.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                {!! Form::label('seo_title', 'SEO titulek') !!}
                                                {!! Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => 'Karavan Sunlight V 60 Adventure Edition']) !!}
                                                <span class="form-text text-muted">Prosím zadejte titulek pro vyhledávače.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                {!! Form::label('seo_description', 'SEO popis') !!}
                                                {!! Form::text('seo_description', null, ['class' => 'form-control', 'placeholder' => 'Karavan Sunlight V 60 Adventure Edition je vhodnou volbou pro ...']) !!}
                                                <span class="form-text text-muted">Prosím zadejte krátký popis pro vyhledávače.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                {!! Form::label('seo_keywords', 'SEO klíčová slova') !!}
                                                {!! Form::text('seo_keywords', null, ['class' => 'form-control', 'placeholder' => 'karavan, sunlight, adventure, edition']) !!}
                                                <span class="form-text text-muted">Prosím zadejte klíčová slova pro vyhledávače.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('photos[]', 'Galerie') !!}
                                        <div class="custom-file">
                                            {!! Form::file('photos[]', ['class' => 'custom-file-input', 'multiple' => 'multiple']) !!}
                                            <label class="custom-file-label" for="customFile">Vyberte obrázky karavanu do galerie.</label>
                                        </div>
                                        <span class="form-text text-muted">Prosím vyberte obrázky karavanu do galerie (jpg, jpeg, png, gif).</span>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('model', 'Model') !!}
                                        {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('type', 'Typ') !!}
                                        {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('year', 'Rok výroby') !!}
                                        {!! Form::text('year', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('color', 'Barva') !!}
                                        {!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('width', 'Šířka (cm)') !!}
                                        {!! Form::number('width', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('height', 'Výška (cm)') !!}
                                        {!! Form::number('height', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('length', 'Délka (cm)') !!}
                                        {!! Form::number('length', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('weight', 'Váha (kg)') !!}
                                        {!! Form::number('weight', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('climatization', 'Klimatizace') !!}
                                        {!! Form::text('climatization', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('heating', 'Topení') !!}
                                        {!! Form::text('heating', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('platform', 'Podvozek') !!}
                                        {!! Form::text('platform', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('transmission', 'Převodovka') !!}
                                        {!! Form::text('transmission', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('motor', 'Motor') !!}
                                        {!! Form::text('motor', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('power', 'Výkon motoru (koní)') !!}
                                        {!! Form::text('power', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('emission', 'Emise') !!}
                                        {!! Form::text('emission', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('fuel_tank', 'Objem palivové nádrže') !!}
                                        {!! Form::text('fuel_tank', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('seats', 'Počet sedadel') !!}
                                        {!! Form::text('seats', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('beds', 'Počet postelí') !!}
                                        {!! Form::text('beds', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('blinds', 'Závěsy / rolety') !!}
                                        {!! Form::text('blinds', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('awning', 'Sluneční markýza') !!}
                                        {!! Form::text('awning', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('security', 'Bezpečnostní výbava') !!}
                                        {!! Form::text('security', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('cruise_control', 'Tempomat') !!}
                                        {!! Form::text('cruise_control', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('electric_equipment', 'Elektrická výbava') !!}
                                        {!! Form::text('electric_equipment', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('audio_video', 'Audiovizuální technika') !!}
                                        {!! Form::text('audio_video', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('fridge_volume', 'Objem lednice') !!}
                                        {!! Form::text('fridge_volume', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('hotplate', 'Počet plotýnek') !!}
                                        {!! Form::text('hotplate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('basin', 'Dřez') !!}
                                        {!! Form::text('basin', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('shower', 'Sprcha') !!}
                                        {!! Form::text('shower', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('toilet', 'WC') !!}
                                        {!! Form::text('toilet', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('water_tank', 'Objem nádrže čerstvé') !!}
                                        {!! Form::text('water_tank', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('waste_tank', 'Objem nádrže odpadní') !!}
                                        {!! Form::text('waste_tank', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('bike_carrier', 'Počet jízních kol') !!}
                                        {!! Form::text('bike_carrier', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('converter', 'Měnič') !!}
                                        {!! Form::text('converter', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('outdoor_lights', 'Venkovní osvětlení') !!}
                                        {!! Form::text('outdoor_lights', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('highway_sign', 'Dálniční známky') !!}
                                        {!! Form::text('highway_sign', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('driving_license', 'Druh řidičáku') !!}
                                        {!! Form::text('driving_license', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('fuel', 'Druh paliva') !!}
                                        {!! Form::text('fuel', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('gps', 'GPS') !!}
                                        {!! Form::text('gps', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('furniture', 'Počet kempingového nábytku') !!}
                                        {!! Form::text('furniture', null, ['class' => 'form-control is-valid', 'placeholder' => '']) !!}
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('concern', 'Koncern / skupina') !!}
                                        {!! Form::text('concern', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-10"></div>
                                <h5 class="text-dark font-weight-bold mb-10">Podrobná specifikace karavanu:</h5>
                                <div class="form-group row">
                                    @foreach($tabs as $tab)
                                        <div class="col-lg-6 mb-10">
                                            {!! Form::label('tab[' . $tab->id . ']', $tab->name) !!}
                                            <div class="tinyeditor form-control" id="{{ 'tab[' . $tab->id . ']' }}" placeholder="">
                                                
                                            </div>
                                            <span class="form-text text-muted">Prosím zadejte podrobný popis ke {{ $tab->name }}.</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="separator separator-dashed my-10"></div>
                                <h5 class="text-dark font-weight-bold mb-10">Ceny pronájmu dle sezónosti:</h5>
                                <div class="col-lg-12">
                                    <div class="row">
                                        @foreach($seasons as $season)
                                            <div class="col-md-3 mb-8">
                                                <p class="text-dark font-weight-bold text-center">{{ $season->name }}</p>
                                                <p class="text-dark text-center">{{ $season->start_date->format('d.m.Y') }} - {{ $season->end_date->format('d.m.Y') }}</p>
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][1]', null, ['class' => 'form-control', 'placeholder' => 'Pondělí']) !!}
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][2]', null, ['class' => 'form-control', 'placeholder' => 'Úterý']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][3]', null, ['class' => 'form-control', 'placeholder' => 'Středa']) !!}
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][4]', null, ['class' => 'form-control', 'placeholder' => 'Čtvrtek']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][5]', null, ['class' => 'form-control', 'placeholder' => 'Pátek']) !!}
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][6]', null, ['class' => 'form-control', 'placeholder' => 'Sobota']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6 col-md-12">
                                                        {!! Form::text('day[' . $season->id . '][7]', null, ['class' => 'form-control', 'placeholder' => 'Neděle']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('active', 'Povolit rezervace') !!}
                                        <span class="switch">
                                            <label>
                                                {!! Form::checkbox('active', true) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="form-text text-muted">Je povoleno rezervovat karavan?</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('winter', 'Zimní paket') !!}
                                        <span class="switch">
                                            <label>
                                                {!! Form::checkbox('winter', true) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="form-text text-muted">Připraveno na zimu?</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('tenerife', 'Kanárske ostrovy') !!}
                                        <span class="switch">
                                            <label>
                                                {!! Form::checkbox('tenerife', true) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="form-text text-muted">Vozidlo na Tenerife?</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('accessories', 'Povolit volitelné příslušenství') !!}
                                        <span class="switch">
                                            <label>
                                                {!! Form::checkbox('accessories', true) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="form-text text-muted">Povolit možnost dalšího příslušenství?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::button('<i class="fas fa-pen"></i>Upravit', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
