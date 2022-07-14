@extends('layouts.app')
@section('title', 'Půjčovna obytných vozů Tenerife')
@section('description', 'Česká půjčovna obytných vozů na Tenerife. Zažijte dobrodružství a svobodné cestování napříč celým ostrovem Tenerife s neomezeným nájezdem kilometrů.')
@section('keywords', 'půjčovna obytných vozů, karavany, půjčovna Tenerife, nové vozy, neomezený počet ujetých km, ')
@section('class', 'category')

@section('content')



    <div class="canars-img canars-overlay">
        <div class="canars-img__content">
            <div class="hp-header">
                <h1 class="page-header">Půjčovna Tenerife</h1>
                <x-date-picker-tenerife/>
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
                                            {{-- @if ($caravan->tenerife)
                                            <div>
                                                <button type="button" class="secondary-btn" data-toggle="modal" data-target="#exampleTener"> Modal </button>
                                                <button type="button" class="primary-btn" data-toggle="modal" data-target="#exampleTener"> Modal </button>
                                            </div>
                                            @else

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

    <div class="container">
        <p>&nbsp;</p>
        <p>V Česk&eacute; republice zač&iacute;n&aacute; zimn&iacute; sezona obytn&yacute;ch vozů, ale to neznamen&aacute;, že se nemůžete vydat obytn&yacute;m vozem za teplem. <strong>Nově nab&iacute;z&iacute;me pron&aacute;jem obytn&yacute;ch vozů na Kan&aacute;rsk&yacute;ch ostrovech, konkr&eacute;tně na Tenerife. Obytn&yacute; vůz si můžete pronajmout v obdob&iacute; 1.1.2022 - 31.12.2022.</strong> Jelikož v&aacute;m chceme dopř&aacute;t co největ&scaron;&iacute; komfort, tak v&aacute;m pronajat&yacute; vůz připrav&iacute;me na leti&scaron;ti v Tenerife a vy tak můžete rovnou vyrazit za pozn&aacute;n&iacute;m ostrova.</p>
        <p>&nbsp;</p>
        <h2>Jak to prob&iacute;h&aacute;?</h2>
        <p>Po př&iacute;letu na leti&scaron;tě v Tenerife na v&aacute;s bude čekat s připraven&yacute;m obytn&yacute;m vozem n&aacute;&scaron; Matěj. Kdo to je? Matěj je n&aacute;&scaron; velmi dobr&yacute; kamar&aacute;d z Česk&eacute; republiky, kter&yacute; na Kan&aacute;rsk&yacute;ch ostrovech žije. Porad&iacute; v&aacute;m kam se vydat za dobrodružstv&iacute;m, jak&aacute; m&iacute;sta nav&scaron;t&iacute;vit a kde se dobře naj&iacute;te.</p>
        <p>&nbsp;</p>
        <h2>Kdo bude va&scaron;&iacute;m parť&aacute;kem na cest&aacute;ch?</h2>
        <p>Pronajmout si můžete jeden ze tř&iacute; vozů, kter&eacute; na v&aacute;s budou čekat na leti&scaron;ti společně s na&scaron;&iacute;m Matějem. <strong>Obytn&aacute; auta se li&scaron;&iacute; hlavně podle počtu spac&iacute;ch m&iacute;st a ceně za pron&aacute;jem.</strong></p>
        <p>&nbsp;</p>
        <h3>Carado T 448 / T 459</h3>
        <p>Polointegrovan&eacute; vozy Carado si <strong>můžete pronajmout za akčn&iacute; cenu 2990 Kč / den včetně DPH</strong>. Auta jsou vhodn&aacute; pro 5 osob na span&iacute; a 4 osoby na j&iacute;zdu.. Při pron&aacute;jmu vozů Carado budete m&iacute;t v ceně 4 campingov&eacute; židle a stůl. Jedn&aacute; se o auta s manu&aacute;ln&iacute; převodovkou a pro jejich ř&iacute;zen&iacute; v&aacute;m bude stačit řidičsk&yacute; průkaz sk. B. Auta maj&iacute; odli&scaron;n&eacute; interi&eacute;rov&eacute; uskupen&iacute; a technick&eacute; vlastnosti, a tak konkr&eacute;tn&iacute; informace o vozech si můžete přeč&iacute;st v jejich detailu.</p>

        <p>&nbsp;</p>
        <h3>P&ouml;sll 2 Win R +</h3>
        <p>Na&scaron;e obytn&aacute; dod&aacute;vka P&ouml;sll je vhodn&aacute; pro 2 cestovatele kvůli 2 m&iacute;stum na span&iacute;. Počet sedadel v&nbsp;<span style="font-size: 1rem;">P&ouml;sll</span><span style="font-size: 1rem;"> je 4.</span><span style="font-size: 1rem;"> Jeji </span><strong style="font-size: 1rem;">pron&aacute;jem v&aacute;s vyjde na skvěl&yacute;ch 2 490 Kč / den včetně DPH</strong><span style="font-size: 1rem;">. V ceně m&aacute;te 2 campingov&eacute; židle a stůl. Pro ř&iacute;zen&iacute; obytn&eacute; dod&aacute;vky v&aacute;m bude stačit řidičsk&yacute; průkaz sk. B.</span></p>

        <h2>V ceně pron&aacute;jmu je zahrnuto:</h2>
        <p><span id="docs-internal-guid-01baf271-7fff-83f8-0fb8-f8f80ecf2e6e"></span></p>
        <ul>
            <li>Obytn&yacute; vůz dle va&scaron;eho objedn&aacute;n&iacute; včetně vybaven&iacute; i ložn&iacute;ho pr&aacute;dla</li>
            <li>Neomezen&eacute; kilometry</li>
            <li>Havarijn&iacute; poji&scaron;těn&iacute;</li>
            <li>Podporu na&scaron;eho pracovn&iacute;ka na Tenerife</li>
            <li>2 plynov&eacute; bomby</li>
            <li>U vozu&nbsp;P&ouml;sll 2 Win R - 2 kempingov&eacute; židle a stůl</li>
            <li>U vozu Carado T 448 / T 459 - 4 kempingov&eacute; židle a stůl</li>
        </ul>
        <p>&nbsp;</p>
        <h2>Informace k pron&aacute;jmu:</h2>
        <p><span id="docs-internal-guid-06130b02-7fff-49e3-5598-162ad9df726b"></span></p>
        <ul>
        <li>Minim&aacute;ln&iacute; doba pron&aacute;jmu je 7 dn&iacute;</li>
        <li>Obytn&yacute; vůz si vyzvednete i vr&aacute;t&iacute;te na leti&scaron;ti v Tenerife-Sur (TFS)</li>
        <li>Pron&aacute;jem obytn&eacute;ho auta na v&iacute;ce než 14 dn&iacute; v&aacute;m nacen&iacute;me individu&aacute;lně</li>
        <li>Pron&aacute;jem poskytujeme po cel&yacute; kalend&aacute;řn&iacute; rok</li>
        </ul>
        <p>&nbsp;</p>
        <h2>Pomocn&eacute; informace na cest&aacute;ch</h2>
        <p>Jestli nechcete předem ře&scaron;it ubytov&aacute;n&iacute; a vyhled&aacute;vat si autokempy, tak v&aacute;m doporučujeme si st&aacute;hnout některou z aplikac&iacute;, kter&eacute; V&aacute;m uk&aacute;žou autokempy a informace o nich. Věřte, že jich je na Tenerife hodně a na turisty s obytn&yacute;m vozem jsou připraveni.</p>
        <p>St&aacute;hnout si můžete např&iacute;klad aplikaci ADAC nebo Park4Night. <strong>Obě jsou zdarma</strong> a dostupn&eacute; jak na Obchod Play nebo App Store.</p>
        <p>&nbsp;</p>
        <div class="d-flex flex-wrap justify-content-center align-items-center"><img style="margin: 0px 1rem;" src="../../../storage/uploads/editor/CgFHKZA10EWwXU89ZqgR6tgN6DSxslyKYZasDuFB.png" alt="" width="200" height="200" /> <img style="margin: 0px 1rem;" src="../../../storage/uploads/editor/C36P1bGsnplMG7RL8rtZnxi6YlAsERUG3so1Q5oO.png" alt="" width="200" height="200" /></div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><img style="float: right;" src="../../../storage/uploads/editor/4qbkZQ0ERRiNopwaRbxgQdAztygLaA0ibtqIBqlg.png" alt="" width="400" height="329" /></p>
        <p>Může se v&aacute;m st&aacute;t, že při objevov&aacute;n&iacute; tohoto kr&aacute;sn&eacute;ho ostrova naraz&iacute;te i na česk&eacute; turisty. Tenerife je totiž pro čechy velmi obl&iacute;benou destinac&iacute;, kde jich z&aacute;roveň hodně žije a podnik&aacute;.&nbsp; Při hled&aacute;n&iacute; na internetu najdete různ&eacute; cestopisy, videa, ale i m&iacute;sta, kde můžete narazit na čechy. <strong>S t&iacute;m </strong><span style="font-size: 1rem;"><strong>souvis&iacute; i česk&aacute; restaurace Orange Caf&eacute;, nab&iacute;zej&iacute;c&iacute; v&yacute;born&eacute; m&iacute;stn&iacute; i česk&eacute; j&iacute;dlo.</strong> V n&aacute;pojov&eacute;m l&iacute;stku najdete točen&eacute; pivo</span><span style="font-size: 1rem;"> značky Pilsner Urquell a k j&iacute;dlu si můžete d&aacute;t sv&iacute;čkovou, kachnu nebo i hověz&iacute; gul&aacute;&scaron;.</span></p>
        <p>Orange Caf&eacute; se nach&aacute;z&iacute; 18km od jižn&iacute;ho leti&scaron;tě. J&iacute;zda autem nebo obytn&yacute;m vozem v&aacute;m bude trvat okolo 15 minut. Podrobněj&scaron;&iacute; informace o aktu&aacute;ln&iacute; situaci a otev&iacute;rac&iacute; době můžete naj&iacute;t na jejich webov&yacute;ch str&aacute;nk&aacute;ch <a href="https://orangecafetenerife.cz/">https://orangecafetenerife.cz/</a> nebo soci&aacute;ln&iacute;ch s&iacute;t&iacute;ch.</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>

    <the-map></the-map>


    <x-posts-list :posts="$posts" />

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
