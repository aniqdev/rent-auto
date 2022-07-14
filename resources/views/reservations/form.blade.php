@extends('layouts.app')
@section('title', $caravan->name)
@section('class', 'reservation')

@section('content')




    <div class="product-gallery">

        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if(!empty($caravan->photos))
                    @foreach($caravan->photos as $photo)
                        <a class="swiper-slide" style="background-image: url({{ asset('storage/' . $photo->path) }});" data-fslightbox="gallery" href="{{ asset('storage/' . $photo->path) }}"></a>
                    @endforeach
                @else
                    <a class="swiper-slide">Bez fotogalerie</a>
                @endif
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>

    <div class="main-wrapper__overlay product-wrapper">

        <div class="container">

            <div class="row cardbox-container">
                <div class="col-sm-12 cardbox">
                    <div class="row align-items-center cardbox-header">
                        <div class="col-md-2 cardbox__thumbnail">
                            <a href="{{ route('karavany.show', $caravan->slug) }}">
                                <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="" style="width: 240px; height: auto;">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <h2>
                                <a href="{{ route('karavany.show', $caravan->slug) }}">
                                    {{ $caravan->name }}
                                </a>
                            </h2>
                            <div class="cardbox__subtitle text-lowercase">
                                {{ $caravan->charasteristics }}
                            </div>
                        </div>
                        <div class="col-md-3 cardbox__actions">
                            <span class="name">termín</span>
                            <div class="text-secondary font-weight-bold">{{ $start_date->format('d.m.') }} - {{ $end_date->format('d.m.Y') }}</div>

                            <span class="name">nájemné</span>
                            @if ($is_sale)
                            @if ($days_diff == 4)
                            <div><span class="text-secondary font-weight-bold old-price-form">{{ number_format($price * (100/95), 0, ',', ' ') }} Kč</span> vč. DPH</div>
                            <div><span class="font-weight-bold sale-price-form">Sleva <span class="text-danger">5%</span></div>
                            @else
                            <div><span class="text-secondary font-weight-bold old-price-form">{{ number_format($price * (100/90), 0, ',', ' ') }} Kč</span> vč. DPH</div>
                            <div><span class="font-weight-bold sale-price-form">Sleva <span class="text-danger">10%</span></div>
                            @endif
                            @endif
                            {{-- <div><span class="text-secondary font-weight-bold sale-price-form">{{ number_format($price, 0, ',', ' ') }} Kč</span> vč. DPH</div> --}}

                            <div><span class="text-secondary font-weight-bold sale-price-form">{{ number_format($price, 0, ',', ' ') }} Kč</span> vč. DPH</div>
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

                    <div class="d-flex align-items-center cardbox-icons">
                        <div class="cardbox__icon" data-toggle="tooltip" title="Řidičský průkaz">
                            <img src="{{ asset('icons/driving-license.svg') }}" class="svg-icon" alt="">
                            <span class="value">B</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Převodovka">
                            <img src="{{ asset('icons/transmission.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->transmission }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Druh paliva">
                            <img src="{{ asset('icons/fuel.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->fuel }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Výkon motoru">
                            <img src="{{ asset('icons/motor.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->power }}K</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Počet jízdních kol">
                            <img src="{{ asset('icons/bike.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->bike_carrier }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Dálniční známka">
                            <img src="{{ asset('icons/highway.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->highway_sign }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Topení">
                            <img src="{{ asset('icons/heating.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->heating }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Klimatizace">
                            <img src="{{ asset('icons/clima.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->climatization }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Navigace">
                            <img src="{{ asset('icons/gps.svg') }}" class="svg-icon" alt="">
                            <span class="value">{{ $caravan->gps }}</span>
                        </div>
                        @if(!empty($caravan->awning))
                            <div class="cardbox__icon" data-toggle="tooltip" title="Markýza">
                                <img src="{{ asset('icons/awning.svg') }}" class="svg-icon" alt="">
                                <span class="value"></span>
                            </div>
                        @endif
                        <div class="cardbox__icon" data-toggle="tooltip" title="Kempingový nábytek">
                            <img src="{{ asset('icons/furniture.svg') }}" class="svg-icon" alt="">
                            <span class="value weekend">{{ $caravan->furniture }}</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Seznam kempů a příručka k použití">
                            <img src="{{ asset('icons/manual.svg') }}" class="svg-icon" alt="">
                            <span class="value"></span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Možnost převzít / vrátit vozidlo mimo pracovní dny">
                            <span class="value weekend">SO+NE</span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Možnost vrácení mírně znečistěného vozu">
                            <img src="{{ asset('icons/broom.svg') }}" class="svg-icon" alt="">
                            <span class="value"></span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Možnost parkování osobního vozu u nás">
                            <img src="{{ asset('icons/parking.svg') }}" class="svg-icon" alt="">
                            <span class="value"></span>
                        </div>
                        <div class="cardbox__icon" data-toggle="tooltip" title="Asistenční služby">
                            <img src="{{ asset('icons/phone.svg') }}" class="svg-icon" alt="">
                            <span class="value"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="main-wrapper__normal">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
            </div>
        </div>

        <reservation-form
            :loggeduser="{{ (Auth::check()) ? 'true' : 'false' }}"
            :caravan="{{ $caravan }}"
            :result_array='@json($result_array)'
            :accessories="{{ $accessories }}"
            start_date="{{ $start_date->format('Y-m-d') }}"
            end_date="{{ $end_date->format('Y-m-d') }}"
            :reasons="{{ $reasons }}"
            :days_count="{{ $end_date->diff($start_date)->format('%a') }}">
        </reservation-form>

    </div>

    <the-map></the-map>

    <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Potřebujete pomoc s objednávkou?</h2>
        </div>

        <div class="cta-content">
            <p>Neváhejte nám zavolat, rádi Vám pomůžeme.</p>
            <a href="{{ route('stranky.show', 'kontakt') }}" class="primary-btn">Kontaktovat</a>
        </div>
    </div>


@endsection
