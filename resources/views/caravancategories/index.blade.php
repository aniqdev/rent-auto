@extends('layouts.app')
@section('title', 'Půjčovna obytných vozů Praha')
@section('description', 'Oblíbená půjčovna obytných vozů Praha. Pronájem obytných aut rok výroby 2021 - 2022 s neomezeným nájezdem km. Jsme top půjčovna obytných vozů Praha.')
@section('keywords', 'půjčovna obytných vozů, karavany, půjčovna Praha, nové vozy, neomezený počet ujetých km, ')
@section('class', 'category')

@section('content')



    <div class="intro-img intro-overlay">
        <div class="intro-img__content">
            <div class="hp-header">
                <h1 class="page-header">Půjčovna Praha</h1>
                <x-date-picker-praha/>
            </div>
        </div>
    </div>



    <div class="main-wrapper__overlay">

        <div class="container">
            <div role="tabpanel">
                <nav class="nav nav-hover" role="tablist">
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
                </nav>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="kategorie-vsechny" aria-labelledby="kategorie-vsechny-tab">
                        @if($caravans->count() < 1)
                            <div class="row cardbox-container">
                                <div class="col-sm-12 cardbox">
                                    <div class="message">
                                        V tuto chvíli není dostupné žádné vozidlo v nabídce.
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach($caravans as $caravan)
                            <div class="row cardbox-container">
                                <div class="col-sm-12 cardbox">
                                    <div class="row align-items-center cardbox-header">
                                        <div class="col-md-2 cardbox__thumbnail">
                                            <a href="{{ route('karavany.show', $caravan->slug) }}">
                                                <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="" style="width: 240px; height: auto;">
                                            </a>

                                            @isset($caravan->concern)
                                                <div class="cardbox__flags">
                                                    <span class="flag">{{ $caravan->concern }}</span>
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="col-md-6">
                                            <h2>
                                                <a href="{{ route('karavany.show', $caravan->slug) }}">
                                                    {{ $caravan->name }}
                                                </a>
                                                @if($caravan->winter)
                                                    <a href="{{ route('stranky.show', 'zimni-sezona') }}" class="winter-icon">
                                                        <i class="icofont-snow-alt"></i>
                                                    </a>
                                                @endif
                                                @if($caravan->tenerife)
                                                    <a href="{{ route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum') }}" class="summer-icon">
                                                        <img src="{{ asset('images/web/palm.png') }}" alt="Tenerife">
                                                    </a>
                                                @endif
                                            </h2>
                                            <div class="cardbox__subtitle text-lowercase">
                                                {{ $caravan->charasteristics }}
                                            </div>
                                            <div class="cardbox__tags">
                                                <span class="badge badge-danger">neomezený nájezd km</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 cardbox__price">
                                            <div class="title">nájemné za den</div>
                                            <div class="price">
                                                <span class="text-muted">od</span>
                                                {{ number_format($caravan->price_from, 0, ',', ' ') }} Kč
                                                <span class="text-muted">vč. DPH</span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 cardbox__actions">
                                            {{-- @if ($caravan->tenerife) --}}
                                            {{-- <div>
                                                <button type="button" class="secondary-btn" data-toggle="modal" data-target="#exampleTener"> Modal </button>
                                                <button type="button" class="primary-btn" data-toggle="modal" data-target="#exampleTener"> Modal </button>
                                            </div> --}}
                                            {{-- @else

                                            @endif --}}


                                            <a href="{{ route('karavany.show', $caravan->slug) }}" class="secondary-btn">
                                                Detail vozu
                                                <i class="icofont-thin-right"></i>
                                            </a>
                                            <a href="{{ route('karavany.show', $caravan->slug) }}#kalendar" class="primary-btn">
                                                Obsazenost vozu
                                                <i class="icofont-thin-right"></i>
                                            </a>

                                        </div>
                                    </div>
                                    {{-- Modal --}}
                                    {{-- <div class="modal fade" id="exampleTener" tabindex="-1" aria-hidden="true" aria-labelledby="exampleTenerLabel">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleTenerLabel">Hello</h5>
                                                    <button class="btn-close" data-dismiss="modal" aria-label="close"></button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn-close" data-dismiss="modal"> close</button>
                                                    <a href="{{ route('karavany.show', $caravan->slug) }}#kalendar" class="primary-btn">
                                                        Obsazenost vozu
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div> --}}

                                    {{-- Modal --}}

                                    <div class="d-flex align-items-center cardbox-parameters">
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">v provozu od</div>
                                                <div class="primary-value">{{ $caravan->year }}</div>
                                            </div>
                                        </div>
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">počet sedadel</div>
                                                <div class="primary-value">{{ $caravan->seats }}</div>
                                            </div>
                                        </div>
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">počet lůžek</div>
                                                <div class="primary-value">{{ $caravan->beds }}</div>
                                            </div>
                                        </div>
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">délka</div>
                                                <div class="primary-value">{{ number_format($caravan->length / 100, 2, ',', ' ') }} m</div>
                                            </div>
                                        </div>
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">šířka</div>
                                                <div class="primary-value">{{ number_format($caravan->width / 100, 2, ',', ' ') }} m</div>
                                            </div>
                                        </div>
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">výška</div>
                                                <div class="primary-value">{{ number_format($caravan->height / 100, 2, ',', ' ') }} m</div>
                                            </div>
                                        </div>
                                        <div class="cardbox__parameter">
                                            <div>
                                                <div class="description">váha</div>
                                                <div class="primary-value">{{ number_format($caravan->weight, 0, ',', ' ') }} kg</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center cardbox-icons @if($caravan->winter) winter @endif">
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Řidičský průkaz">
                                            <img src="{{ asset('icons/driving-license.svg') }}" class="svg-icon" alt="Řidičský průkaz">
                                            <span class="value">B</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Převodovka">
                                            <img src="{{ asset('icons/transmission.svg') }}" class="svg-icon" alt="Převodovka">
                                            <span class="value">{{ $caravan->transmission }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Druh paliva">
                                            <img src="{{ asset('icons/fuel.svg') }}" class="svg-icon" alt="Palivo">
                                            <span class="value">{{ $caravan->fuel }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Výkon motoru">
                                            <img src="{{ asset('icons/motor.svg') }}" class="svg-icon" alt="Motor">
                                            <span class="value">{{ $caravan->power }}K</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Počet jízdních kol">
                                            <img src="{{ asset('icons/bike.svg') }}" class="svg-icon" alt="Jízdní kolo">
                                            <span class="value">{{ $caravan->bike_carrier }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Dálniční známka">
                                            <img src="{{ asset('icons/highway.svg') }}" class="svg-icon" alt="Dálniční známka">
                                            <span class="value">{{ $caravan->highway_sign }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Topení">
                                            <img src="{{ asset('icons/heating.svg') }}" class="svg-icon" alt="Vytápění">
                                            <span class="value">{{ $caravan->heating }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Klimatizace">
                                            <img src="{{ asset('icons/clima.svg') }}" class="svg-icon" alt="Klimatizace">
                                            <span class="value">{{ $caravan->climatization }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Navigace">
                                            <img src="{{ asset('icons/gps.svg') }}" class="svg-icon" alt="GPS">
                                            <span class="value">{{ $caravan->gps }}</span>
                                        </div>
                                        @if(!empty($caravan->awning))
                                            <div class="cardbox__icon" data-toggle="tooltip" title="Markýza">
                                                <img src="{{ asset('icons/awning.svg') }}" class="svg-icon" alt="Markýza">
                                                <span class="value"></span>
                                            </div>
                                        @endif
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Kempingový nábytek">
                                            <img src="{{ asset('icons/furniture.svg') }}" class="svg-icon" alt="Nábytek">
                                            <span class="value weekend">{{ $caravan->furniture }}</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Seznam kempů a příručka k použití">
                                            <img src="{{ asset('icons/manual.svg') }}" class="svg-icon" alt="Manuál">
                                            <span class="value"></span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Možnost převzít / vrátit vozidlo mimo pracovní dny">
                                            <span class="value weekend">SO+NE</span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Možnost vrácení mírně znečistěného vozu">
                                            <img src="{{ asset('icons/broom.svg') }}" class="svg-icon" alt="Zněčištení">
                                            <span class="value"></span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Možnost parkování osobního vozu u nás">
                                            <img src="{{ asset('icons/parking.svg') }}" class="svg-icon" alt="Parkování">
                                            <span class="value"></span>
                                        </div>
                                        <div class="cardbox__icon" data-toggle="tooltip" title="Asistenční služby">
                                            <img src="{{ asset('icons/phone.svg') }}" class="svg-icon" alt="Asistence">
                                            <span class="value"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @foreach($categories as $category)
                        <div role="tabpanel" class="tab-pane fade" id="kategorie-{{ $category->slug }}" aria-labelledby="kategorie-{{ $category->slug }}-tab">
                            @if($category->caravans->count() > 0)
                                @foreach($category->caravans as $caravan)
                                    <div class="row cardbox-container">
                                        <div class="col-sm-12 cardbox">
                                            <div class="row align-items-center cardbox-header">
                                                <div class="col-md-2 cardbox__thumbnail">
                                                    <a href="{{ route('karavany.show', $caravan->slug) }}">
                                                        <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="" style="width: 240px; height: auto;">
                                                    </a>

                                                    @isset($caravan->concern)
                                                        <div class="cardbox__flags">
                                                            <span class="flag">{{ $caravan->concern }}</span>
                                                        </div>
                                                    @endisset
                                                </div>
                                                <div class="col-md-6">
                                                    <h2>
                                                        <a href="{{ route('karavany.show', $caravan->slug) }}">
                                                            {{ $caravan->name }}
                                                        </a>
                                                        @if($caravan->winter)
                                                            <a href="{{ route('stranky.show', 'zimni-sezona') }}" class="winter-icon">
                                                                <i class="icofont-snow-alt"></i>
                                                            </a>
                                                        @endif
                                                        @if($caravan->tenerife)
                                                            <a href="{{ route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum') }}" class="summer-icon">
                                                                <img src="{{ asset('images/web/palm.png') }}" alt="Tenerife">
                                                                <span>Jsem na Tenerife</span>
                                                            </a>
                                                        @endif
                                                    </h2>
                                                    <div class="cardbox__subtitle text-lowercase">
                                                        {{ $caravan->charasteristics }}
                                                    </div>
                                                    <div class="cardbox__tags">
                                                        <span class="badge badge-danger">neomezený nájezd km</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 cardbox__price">
                                                    <div class="title">nájemné za den</div>
                                                    <div class="price">
                                                        <span class="text-muted">od</span>
                                                        {{ number_format($caravan->price_from, 0, ',', ' ') }} Kč
                                                        <span class="text-muted">vč. DPH</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 cardbox__actions">
                                                    <a href="{{ route('karavany.show', $caravan->slug) }}" class="secondary-btn">
                                                        Detail vozu
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                    <a href="{{ route('karavany.show', $caravan->slug) }}#kalendar" class="primary-btn">
                                                        Obsazenost vozu
                                                        <i class="icofont-thin-right"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center cardbox-parameters">
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">v provozu od</div>
                                                        <div class="primary-value">{{ $caravan->year }}</div>
                                                    </div>
                                                </div>
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">počet sedadel</div>
                                                        <div class="primary-value">{{ $caravan->seats }}</div>
                                                    </div>
                                                </div>
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">počet lůžek</div>
                                                        <div class="primary-value">{{ $caravan->beds }}</div>
                                                    </div>
                                                </div>
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">délka</div>
                                                        <div class="primary-value">{{ number_format($caravan->length / 100, 2, ',', ' ') }} m</div>
                                                    </div>
                                                </div>
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">šířka</div>
                                                        <div class="primary-value">{{ number_format($caravan->width / 100, 2, ',', ' ') }} m</div>
                                                    </div>
                                                </div>
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">výška</div>
                                                        <div class="primary-value">{{ number_format($caravan->height / 100, 2, ',', ' ') }} m</div>
                                                    </div>
                                                </div>
                                                <div class="cardbox__parameter">
                                                    <div>
                                                        <div class="description">váha</div>
                                                        <div class="primary-value">{{ number_format($caravan->weight, 0, ',', ' ') }} kg</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center cardbox-icons @if($caravan->winter) winter @endif">
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Řidičský průkaz">
                                                    <img src="{{ asset('icons/driving-license.svg') }}" class="svg-icon" alt="Řidičský průkaz">
                                                    <span class="value">B</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Převodovka">
                                                    <img src="{{ asset('icons/transmission.svg') }}" class="svg-icon" alt="Převodovka">
                                                    <span class="value">{{ $caravan->transmission }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Druh paliva">
                                                    <img src="{{ asset('icons/fuel.svg') }}" class="svg-icon" alt="Palivo">
                                                    <span class="value">{{ $caravan->fuel }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Výkon motoru">
                                                    <img src="{{ asset('icons/motor.svg') }}" class="svg-icon" alt="Motor">
                                                    <span class="value">{{ $caravan->power }}K</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Počet jízdních kol">
                                                    <img src="{{ asset('icons/bike.svg') }}" class="svg-icon" alt="Jízdní kola">
                                                    <span class="value">{{ $caravan->bike_carrier }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Dálniční známka">
                                                    <img src="{{ asset('icons/highway.svg') }}" class="svg-icon" alt="Dálniční známka">
                                                    <span class="value">{{ $caravan->highway_sign }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Topení">
                                                    <img src="{{ asset('icons/heating.svg') }}" class="svg-icon" alt="Topení">
                                                    <span class="value">{{ $caravan->heating }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Klimatizace">
                                                    <img src="{{ asset('icons/clima.svg') }}" class="svg-icon" alt="Klimatizace">
                                                    <span class="value">{{ $caravan->climatization }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Navigace">
                                                    <img src="{{ asset('icons/gps.svg') }}" class="svg-icon" alt="GPS">
                                                    <span class="value">{{ $caravan->gps }}</span>
                                                </div>
                                                @if(!empty($caravan->awning))
                                                    <div class="cardbox__icon" data-toggle="tooltip" title="Markýza">
                                                        <img src="{{ asset('icons/awning.svg') }}" class="svg-icon" alt="Markýza">
                                                        <span class="value"></span>
                                                    </div>
                                                @endif
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Kempingový nábytek">
                                                    <img src="{{ asset('icons/furniture.svg') }}" class="svg-icon" alt="Nábytek">
                                                    <span class="value weekend">{{ $caravan->furniture }}</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Seznam kempů a příručka k použití">
                                                    <img src="{{ asset('icons/manual.svg') }}" class="svg-icon" alt="Manuál">
                                                    <span class="value"></span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Možnost převzít / vrátit vozidlo mimo pracovní dny">
                                                    <span class="value weekend">SO+NE</span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Možnost vrácení mírně znečistěného vozu">
                                                    <img src="{{ asset('icons/broom.svg') }}" class="svg-icon" alt="Zněčištení">
                                                    <span class="value"></span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Možnost parkování osobního vozu u nás">
                                                    <img src="{{ asset('icons/parking.svg') }}" class="svg-icon" alt="Parkování">
                                                    <span class="value"></span>
                                                </div>
                                                <div class="cardbox__icon" data-toggle="tooltip" title="Asistenční služby">
                                                    <img src="{{ asset('icons/phone.svg') }}" class="svg-icon" alt="Asistence">
                                                    <span class="value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row cardbox-container">
                                    <div class="col-sm-12 cardbox">
                                        <div class="message">
                                            V tuto chvíli není v dané kategorií žádné vozidlo v nabídce.
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    <the-map></the-map>

    <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Nemůžete najít, co potřebujete?</h2>
        </div>

        <div class="cta-content">
            <p>Vyzkoušejte nás kontaktovat pomocí formuláře.</p>
            <a href="{{ route('stranky.show', 'kontakt') }}" class="primary-btn">Kontaktovat <i class="icofont-thin-right"></i></a>
        </div>
    </div>



@endsection
