@extends('layouts.app')
@section('title', $caravan->seo_title)
@section('description', $caravan->seo_description)
@section('keywords', $caravan->seo_keywords)
@section('class', 'caravan')


@section('content')

{{-- <div class="intro-img intro-overlay">
    <div class="intro-img__content">
        <div class="hp-header">
            <h1 class="page-header">Last minutes</h1>
        </div>
    </div>
</div> --}}

<div class="product-gallery mt-5 pt-5">


    <h1>Last minutes</h1>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            @if(!empty($caravan->photos))
                @foreach($caravan->photos as $photo)
                    @if(file_exists(public_path('storage') . '/' . $photo->path) && file_exists(public_path('storage') . '/' . $photo->photography))
                        <a class="swiper-slide" style="background-image: url({{ asset('storage/' . $photo->photography) }});" data-fslightbox="gallery" href="{{ asset('storage/' . $photo->path) }}"></a>
                    @endif
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
                    </div>
                    <div class="col-md-2 cardbox__price">
                        <div class="title">n??jemn?? za den</div>
                        <div class="price">
                            <span class="text-muted">od</span>
                            {{ number_format($caravan->price_from, 0, ',', ' ') }} K??
                            <span class="text-muted">v??. DPH</span>
                        </div>
                    </div>
                    <div class="col-md-2 cardbox__actions">
                        <a href="#kalendar" class="primary-btn">
                            Pronajmout
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
                            <div class="description">po??et sedadel</div>
                            <div class="primary-value">{{ $caravan->seats }}</div>
                        </div>
                    </div>
                    <div class="cardbox__parameter">
                        <div>
                            <div class="description">po??et l????ek</div>
                            <div class="primary-value">{{ $caravan->beds }}</div>
                        </div>
                    </div>
                    <div class="cardbox__parameter">
                        <div>
                            <div class="description">d??lka</div>
                            <div class="primary-value">{{ number_format($caravan->length / 100, 2, ',', ' ') }} m</div>
                        </div>
                    </div>
                    <div class="cardbox__parameter">
                        <div>
                            <div class="description">??????ka</div>
                            <div class="primary-value">{{ number_format($caravan->width / 100, 2, ',', ' ') }} m</div>
                        </div>
                    </div>
                    <div class="cardbox__parameter">
                        <div>
                            <div class="description">v????ka</div>
                            <div class="primary-value">{{ number_format($caravan->height / 100, 2, ',', ' ') }} m</div>
                        </div>
                    </div>
                    <div class="cardbox__parameter">
                        <div>
                            <div class="description">v??ha</div>
                            <div class="primary-value">{{ number_format($caravan->weight, 0, ',', ' ') }} kg</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center cardbox-icons @if($caravan->winter) winter @endif">
                    <div class="cardbox__icon" data-toggle="tooltip" title="??idi??sk?? pr??kaz">
                        <img src="{{ asset('icons/driving-license.svg') }}" class="svg-icon" alt="">
                        <span class="value">B</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="P??evodovka">
                        <img src="{{ asset('icons/transmission.svg') }}" class="svg-icon" alt="">
                        <span class="value">{{ $caravan->transmission }}</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Druh paliva">
                        <img src="{{ asset('icons/fuel.svg') }}" class="svg-icon" alt="">
                        <span class="value">{{ $caravan->fuel }}</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="V??kon motoru">
                        <img src="{{ asset('icons/motor.svg') }}" class="svg-icon" alt="">
                        <span class="value">{{ $caravan->power }}K</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Po??et j??zdn??ch kol">
                        <img src="{{ asset('icons/bike.svg') }}" class="svg-icon" alt="">
                        <span class="value">{{ $caravan->bike_carrier }}</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="D??lni??n?? zn??mka">
                        <img src="{{ asset('icons/highway.svg') }}" class="svg-icon" alt="">
                        <span class="value">{{ $caravan->highway_sign }}</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Topen??">
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
                        <div class="cardbox__icon" data-toggle="tooltip" title="Mark??za">
                            <img src="{{ asset('icons/awning.svg') }}" class="svg-icon" alt="">
                            <span class="value"></span>
                        </div>
                    @endif
                    <div class="cardbox__icon" data-toggle="tooltip" title="Kempingov?? n??bytek">
                        <img src="{{ asset('icons/furniture.svg') }}" class="svg-icon" alt="">
                        <span class="value weekend">{{ $caravan->furniture }}</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Seznam kemp?? a p????ru??ka k pou??it??">
                        <img src="{{ asset('icons/manual.svg') }}" class="svg-icon" alt="">
                        <span class="value"></span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Mo??nost p??evz??t / vr??tit vozidlo mimo pracovn?? dny">
                        <span class="value weekend">SO+NE</span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Mo??nost vr??cen?? m??rn?? zne??ist??n??ho vozu">
                        <img src="{{ asset('icons/broom.svg') }}" class="svg-icon" alt="">
                        <span class="value"></span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Mo??nost parkov??n?? osobn??ho vozu u n??s">
                        <img src="{{ asset('icons/parking.svg') }}" class="svg-icon" alt="">
                        <span class="value"></span>
                    </div>
                    <div class="cardbox__icon" data-toggle="tooltip" title="Asisten??n?? slu??by">
                        <img src="{{ asset('icons/phone.svg') }}" class="svg-icon" alt="">
                        <span class="value"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row product-overview">
            <div class="col-md-4 pl-3">
                <h3>Z??kladn?? informace</h3>
                <div class="short-description">
                    {!! $caravan->short_description !!}
                </div>
            </div>
            <div class="col-md-5">
                <h3>Na??e hodnocen??</h3>
                <div class="product-review">
                    <div class="product-review__item d-flex align-items-center">
                        <div class="name">Komfort bydlen??</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $caravan->living_comfort * 100 / 10 }}%" aria-valuenow="{{ $caravan->living_comfort }}" aria-valuemin="0" aria-valuemax="10"></div>
                        </div>
                        <div class="value text-center">
                            {{ $caravan->living_comfort }}
                        </div>
                    </div>
                    <div class="product-review__item d-flex align-items-center">
                        <div class="name">Komfort j??zdy</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $caravan->driving_comfort * 100 / 10 }}%" aria-valuenow="{{ $caravan->living_comfort }}" aria-valuenow="{{ $caravan->driving_comfort }}" aria-valuemin="0" aria-valuemax="10"></div>
                        </div>
                        <div class="value text-center">
                            {{ $caravan->driving_comfort }}
                        </div>
                    </div>
                    <div class="product-review__item d-flex align-items-center">
                        <div class="name">Proveden?? vozu</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $caravan->equipment * 100 / 10 }}%" aria-valuenow="{{ $caravan->living_comfort }}" aria-valuenow="{{ $caravan->equipment }}" aria-valuemin="0" aria-valuemax="10"></div>
                        </div>
                        <div class="value text-center">
                            {{ $caravan->equipment }}
                        </div>
                    </div>
                    <div class="product-review__item d-flex align-items-center">
                        <div class="name">Provozn?? n??klady</div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $caravan->operating_costs * 100 / 10 }}%" aria-valuenow="{{ $caravan->living_comfort }}" aria-valuenow="{{ $caravan->operating_costs }}" aria-valuemin="0" aria-valuemax="10"></div>
                        </div>
                        <div class="value text-center">
                            {{ $caravan->operating_costs }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h3>V??hody</h3>
                <div class="key-benefits">
                    {!! $caravan->key_benefits !!}
                </div>
            </div>
        </div>

    </div>

</div>



@endsection
