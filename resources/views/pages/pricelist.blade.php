@extends('layouts.app')
@section('title', 'Ceník nájemného a vybavení')
@section('description', '')
@section('keywords', '')
@section('class', 'pricelist space-top')

@section('content')

    <div class="page-intro">
        <div class="page-intro__content">
            <div class="page-header">
                <h1>Ceník nájemného a vybavení</h1>
            </div>
        </div>
    </div>
    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>
    <div class="main-wrapper__page">
        <div class="container">
            <div class="row cardbox-container">
                @foreach($caravans as $caravan)
                    <div class="col-sm-6 cardbox">
                        <div class="cardbox-body">
                            <div class="row align-items-center cardbox-header">
                                <div class="col-md-4 cardbox__thumbnail">
                                    <a href="{{ route('karavany.show', $caravan->slug) }}">
                                        <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="{{ $caravan->name }}">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <h2>
                                        <a href="{{ route('karavany.show', $caravan->slug) }}">
                                            {{ $caravan->name }}
                                        </a>
                                    </h2>
                                    <div class="cardbox__subtitle text-lowercase">
                                        {{ $caravan->charasteristics }}
                                    </div>
                                </div>

                                @if($caravan->tenerife)
                                    <a href="{{ route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum') }}" class="tenerife" data-toggle="tooltip" data-placement="left" title="Vozidlo je k zapůjčení pouze na Tenerife!">
                                        Jsem na Tenerife
                                    </a>
                                @endif
                            </div>
                            <div class="d-flex align-items-center cardbox-table">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <th></th>
                                            <th class="text-primary text-center">Po</th>
                                            <th class="text-primary text-center">Út</th>
                                            <th class="text-primary text-center">St</th>
                                            <th class="text-primary text-center">Čt</th>
                                            <th class="text-primary text-center">Pá</th>
                                            <th class="text-primary text-center">So</th>
                                            <th class="text-primary text-center">Ne</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="text-secondary" nowrap>Sezóna A</th>
                                                @foreach($caravan->seasons->where('id', 12) as $season)
                                                    <td nowrap>{{ number_format($season->pivot->day_1, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_2, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_3, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_4, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_5, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_6, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_7, 0, ',', ' ') }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th class="text-secondary" nowrap>Sezóna B</th>
                                                @foreach($caravan->seasons->where('id', 11) as $season)
                                                    <td nowrap>{{ number_format($season->pivot->day_1, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_2, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_3, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_4, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_5, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_6, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_7, 0, ',', ' ') }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th class="text-secondary" nowrap>Sezóna C</th>
                                                @foreach($caravan->seasons->where('id', 10) as $season)
                                                    <td nowrap>{{ number_format($season->pivot->day_1, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_2, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_3, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_4, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_5, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_6, 0, ',', ' ') }}</td>
                                                    <td nowrap>{{ number_format($season->pivot->day_7, 0, ',', ' ') }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <section id="sezony">
            <trees-bg></trees-bg>
            <div class="container position-relative">
                <div class="seasons__wrapper">
                    <div class="season-item card-3">
                        <div class="season-item__img">
                            <img src="{{ asset('images/seasons/season-a.jpg') }}" alt="Sezóna A" />

                            <div class="season-item__name">
                                <div class="season-name">
                                    Sezóna A
                                </div>
                                <div class="season-dates">
                                    @foreach($seasons->where('name', 'Sezóna A') as $season_date)
                                        <span class="d-block">{{ $season_date->date_range_string }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="season-item card-3">
                        <div class="season-item__img">
                            <img src="{{ asset('images/seasons/season-b.jpg') }}" alt="Sezóna B" />

                            <div class="season-item__name">
                                <div class="season-name">
                                    Sezóna B
                                </div>
                                <div class="season-dates">
                                    @foreach($seasons->where('name', 'Sezóna B') as $season_date)
                                        <span class="d-block">{{ $season_date->date_range_string }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="season-item card-3">
                        <div class="season-item__img">
                            <img src="{{ asset('images/seasons/season-c.jpg') }}" alt="Sezóna C" />

                            <div class="season-item__name">
                                <div class="season-name">
                                    Sezóna C
                                </div>
                                <div class="season-dates">
                                    @foreach($seasons->where('name', 'Sezóna C') as $season_date)
                                        <span class="d-block">{{ $season_date->date_range_string }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            {{-- <div class="row text-center">
                <div class="col-lg-12">
                    <p>Uvedené ceny jsou včetně DPH.</p>
                </div>
            </div> --}}
        <div class="container">
            <div class="row text-center mt-5 mb-4">
                <div class="col-lg-12">
                    <h2 class="d-block text-center">Volitelné příslušenství</h2>
                </div>
            </div>
            <div class="row">
                @foreach($accessories as $accessory)
                    <div class="col-lg-6">
                        <div class="megacheckbox d-flex">
                            <div class="label" data-toggle="tooltip" data-html="true" title="{{ $accessory->description }}">
                                <div class="name">
                                    <label>{{ $accessory->name }}</label>
                                </div>
                                <div class="price">
                                    {{ $accessory->price_per_day }} Kč za den

                                    @if(!empty($accessory->access_charge))
                                        + {{ $accessory->access_charge }} Kč jednorázový poplatek
                                    @endif
                                </div>
                            </div>
                            <div class="thumbnail">
                                <a data-fslightbox="accessories" href="{{ asset('storage/' . $accessory->thumbnail) }}">
                                    <img src="{{ asset('storage/' . $accessory->thumbnail) }}" alt="{{ $accessory->name }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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
