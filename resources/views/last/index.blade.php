@extends('layouts.app')
@section('title', 'Last minute | Pronájem obytných vozů| Topobytnevozy.cz')
@section('description', 'Využijte slevu na pronájem obytného vozu a vyberte si poslední termíny u nejoblíbenějších obytných aut. Last minute vám umožní 5% nebo 10% slevu na pronájem.')
@section('keywords', 'půjčovna obytných vozů, karavany, vozový park, nové vozy, neomezený počet ujetých km, ')
@section('class', 'category')


@section('content')

{{-- link -to sale --}}
{{-- href="/rezervace?caravan={{$result_item->reservation->caravan->id}}&start_date={{$result_item->avaliable_from}}&end_date={{$result_item->avaliable_to}}" class="last-caravan-block col-sm-12 col-md-6 col-lg-4 col-xl-3" --}}

{{-- col-lg-4 col-md-6 col-sm-12 --}}


<div class="intro-img intro-overlay last-min-page last-min-page-content">
    <div class="intro-img__content last-min-page-content">
        <div class="hp-header">
            <h1 class="page-header">Last minute</h1>
        </div>
    </div>
</div>

<div class="main-wrapper__overlay last-minute-overplay">

    <div class="container">
        <div role="tabpanel">

            <div class="top-text-last-min-title">
                <h2 class="top-text-lastminute-title">Aktuální nabídka Last minute 2022</h2>
            </div>
            <div class="top-text-lastminute">
                Čerstvá nabídka Last Minute termínů v naší půjčovně obytných vozů v Praze. Všechny termíny, které najdete v naší sekci Last minute jsou na 3 nebo 4 dny. Jedná se o poslední volné dny u nejoblíbenějších obytných aut v daných měsících, a proto bychom vám je rádi nabídli se slevou 5% nebo 10%.
            </div>
            @if (count($result_array))
            <div class="last-caravns row mt-5">
                @foreach ($result_array as $result_item)
                    {{-- <div class="block-last"> --}}
                        <div class="last-caravan-block col-sm-12 col-md-6 col-lg-4 col-xl-3  ">
                            <div class="carvan-img">
                                <img src="{{ asset('storage/' . $result_item->reservation->caravan->thumbnail) }}" alt="">
                                <div class="for-sale">
                                    <?xml version="1.0" ?><svg width="40px" height="40px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                        .st0{display:none;}
                                        .st1{display:inline;}
                                        .st2{opacity:0.2;fill:none;stroke:#000000;stroke-width:5.000000e-02;stroke-miterlimit:10;}
                                    </style><g class="st0" id="grid_system"/><g id="_icons"><g><path d="M20.8,9.2c-0.4-0.4-0.6-0.9-0.6-1.4c0-2.2-1.8-4-4-4c-0.5,0-1-0.2-1.4-0.6c-1.6-1.6-4.1-1.6-5.7,0    C8.8,3.6,8.3,3.8,7.8,3.8c-2.2,0-4,1.8-4,4c0,0.5-0.2,1-0.6,1.4c-1.6,1.6-1.6,4.1,0,5.7c0.4,0.4,0.6,0.9,0.6,1.4c0,2.2,1.8,4,4,4    c0.5,0,1,0.2,1.4,0.6C10,21.6,11,22,12,22c1,0,2.1-0.4,2.8-1.2c0.4-0.4,0.9-0.6,1.4-0.6c2.2,0,4-1.8,4-4c0-0.5,0.2-1,0.5-1.4l0,0    c0,0,0,0,0,0C22.4,13.3,22.4,10.7,20.8,9.2z M19.4,13.4c-0.8,0.8-1.2,1.8-1.2,2.8c0,1.1-0.9,2-2,2c-1.1,0-2.1,0.4-2.8,1.2    c-0.8,0.8-2,0.8-2.8,0c-0.8-0.8-1.8-1.2-2.8-1.2c-1.1,0-2-0.9-2-2c0-1.1-0.4-2.1-1.2-2.8c-0.8-0.8-0.8-2,0-2.8    c0.8-0.8,1.2-1.8,1.2-2.8c0-1.1,0.9-2,2-2c1.1,0,2.1-0.4,2.8-1.2C11,4.2,11.5,4,12,4c0.5,0,1,0.2,1.4,0.6c0.8,0.8,1.8,1.2,2.8,1.2    c1.1,0,2,0.9,2,2c0,1.1,0.4,2.1,1.2,2.8C20.2,11.4,20.2,12.6,19.4,13.4l0.7,0.7L19.4,13.4z"/><circle cx="14" cy="14" r="1"/><circle cx="10" cy="10" r="1"/><path d="M13.3,9.3l-4,4c-0.4,0.4-0.4,1,0,1.4C9.5,14.9,9.7,15,10,15s0.5-0.1,0.7-0.3l4-4c0.4-0.4,0.4-1,0-1.4S13.7,8.9,13.3,9.3z"/></g></g></svg>
                                    {{-- <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <path style="fill:#E54728;" d="M452.064,487.193H59.936c-26.23,0-47.493-21.264-47.493-47.493V301.395c0-26.23,21.264-47.493,47.493-47.493h392.128c26.23,0,47.493,21.264,47.493,47.493v138.306C499.557,465.93,478.293,487.193,452.064,487.193z"/><g><path style="fill:#F95428;" d="M59.936,459.819c-11.094,0-20.119-9.025-20.119-20.119V301.394c0-11.094,9.025-20.119,20.119-20.119 h392.128c11.094,0,20.119,9.025,20.119,20.119V439.7c0,11.094-9.025,20.119-20.119,20.119H59.936z"/><circle style="fill:#F95428;" cx="256" cy="57.936" r="33.128"/></g><g><path style="fill:#FFFFFF;" d="M128.376,336.12h3.569c4.094,0,7.423,3.33,7.423,7.423c0,6.872,5.571,12.443,12.443,12.443 c6.872,0,12.443-5.571,12.443-12.443c0-17.814-14.493-32.309-32.309-32.309h-3.569c-19.783,0-35.878,16.095-35.878,35.878 s16.095,35.878,35.878,35.878c6.061,0,10.992,4.931,10.992,10.992c0,6.061-4.931,10.991-10.992,10.991h-3.569 c-4.094,0-7.423-3.33-7.423-7.422c0-6.872-5.571-12.443-12.443-12.443c-6.872,0-12.443,5.571-12.443,12.443 c0,17.814,14.493,32.308,32.309,32.308h3.569c19.783,0,35.878-16.095,35.878-35.877s-16.095-35.878-35.878-35.878 c-6.061,0-10.992-4.931-10.992-10.992C117.384,341.052,122.315,336.12,128.376,336.12z"/><path style="fill:#FFFFFF;" d="M326.9,391.935c-6.872,0-12.443,5.571-12.443,12.443v0.596h-21.983v-81.297 c0-6.872-5.571-12.443-12.443-12.443c-6.872,0-12.443,5.571-12.443,12.443v93.738c0,6.872,5.571,12.443,12.443,12.443H326.9 c6.872,0,12.443-5.571,12.443-12.443v-13.039C339.342,397.506,333.772,391.935,326.9,391.935z"/><path style="fill:#FFFFFF;" d="M407.059,351.741c6.872,0,12.443-5.571,12.443-12.443v-15.621c0-6.872-5.571-12.443-12.443-12.443 h-46.87c-6.872,0-12.443,5.571-12.443,12.443v93.738c0,6.872,5.571,12.443,12.443,12.443h46.87c6.872,0,12.443-5.571,12.443-12.443 v-13.039c0-6.872-5.571-12.443-12.443-12.443s-12.443,5.571-12.443,12.443v0.596h-21.984V382.99h13.997 c6.872,0,12.443-5.571,12.443-12.443s-5.571-12.443-12.443-12.443h-13.997V336.12h21.984v3.178 C394.616,346.171,400.187,351.741,407.059,351.741z"/><path style="fill:#FFFFFF;" d="M213.433,311.842c-19.616,0-35.574,15.958-35.574,35.574v69.395c0,6.872,5.571,12.443,12.443,12.443 c6.872,0,12.443-5.571,12.443-12.443v-18.797h21.377v18.797c0,6.872,5.571,12.443,12.443,12.443 c6.872,0,12.443-5.571,12.443-12.443v-69.395C249.007,327.8,233.048,311.842,213.433,311.842z M202.744,373.127v-25.711 c0-5.893,4.795-10.688,10.688-10.688c5.894,0,10.688,4.795,10.688,10.688v25.711H202.744z"/></g><path style="fill:#F9A493;" d="M462.228,375.787c-6.872,0-12.443-5.571-12.443-12.443v-59.88c-5.783-1.07-10.165-6.141-10.165-12.235c0-6.872,5.571-12.443,12.443-12.443c12.467,0,22.607,10.141,22.607,22.608v61.951C474.671,370.216,469.101,375.787,462.228,375.787z M452.064,303.672h0.012H452.064z"/><path style="fill:#333333;" d="M452.064,241.457h-40.596L292.454,85.248c5.721-7.616,9.117-17.075,9.117-27.313c0-25.127-20.444-45.571-45.571-45.571s-45.571,20.442-45.571,45.571c0,10.24,3.397,19.701,9.121,27.318L100.53,241.457H59.936C26.887,241.457,0,268.345,0,301.394V439.7c0,33.05,26.887,59.936,59.936,59.936h392.128c33.05,0,59.936-26.887,59.936-59.936V301.394C512,268.345,485.113,241.457,452.064,241.457z M256,37.251c11.406,0,20.685,9.279,20.685,20.685S267.405,78.621,256,78.621c-11.405,0-20.685-9.28-20.685-20.685S244.594,37.251,256,37.251z M239.341,100.339c5.164,2.036,10.779,3.167,16.659,3.167c5.881,0,11.498-1.132,16.664-3.169l107.518,141.121H131.816L239.341,100.339z M487.114,439.7c0,19.326-15.724,35.05-35.05,35.05H59.936c-19.326,0-35.05-15.724-35.05-35.05V301.394c0-19.326,15.724-35.05,35.05-35.05h392.128c19.326,0,35.05,15.724,35.05,35.05V439.7z"/><g>
                                    </svg> --}}
                                </div>
                            </div>
                            <div class="caravan-info-wrap">
                                <div class="caravan-name" title="{{$result_item->reservation->caravan->name}}">
                                    <h4>{{$result_item->reservation->caravan->name}}</h4>
                                </div>
                                <div class="caravan-price-wrap">
                                    @if ($result_item->day_diff == 4)
                                        <div class=" row caravan-price-old align-items-center">
                                            <h5 class="caravan-price-last-title">
                                                Cena :
                                            </h5>
                                            <span class="caravan-price-last-sale-old">
                                                {{ number_format($result_item->price * (100/95), 0, ',', ' ') }} Kč
                                            </span>
                                        </div>
                                        <div class="row caravan-sale align-items-center">
                                            <h5 class="caravan-price-last-title">
                                                Sleva :
                                            </h5>
                                            <span class="caravan-price-last-sale-percent">
                                                5%
                                            </span>
                                        </div>
                                    @else
                                        <div class=" row caravan-price-old align-items-center">
                                            <h5 class="caravan-price-last-title">
                                                Cena :
                                            </h5>
                                            <span class="caravan-price-last-sale-old">
                                                {{ number_format($result_item->price * (100/90), 0, ',', ' ') }} Kč
                                            </span>
                                        </div>
                                        <div class="row caravan-sale align-items-center">
                                            <h5 class="caravan-price-last-title">
                                                Sleva :
                                            </h5>
                                            <span class="caravan-price-last-sale-percent">
                                                10%
                                            </span>
                                        </div>
                                    @endif
                                        <div class="row price align-items-center">
                                            <h5 class="caravan-price-last-title">
                                            Cena po slevě :
                                            </h5>
                                            <span class="caravan-price-last-sale-new">
                                                {{$result_item->price}} Kč
                                            </span>
                                        </div>


                                    {{-- <div class="caravan-price-old">
                                        od {{$result_item->reservation->caravan->price_from}}
                                    </div>
                                    @if ($result_item->day_diff == 4)
                                        <div class="caravan_sale">
                                            Sleva 5%
                                        </div>
                                        <div class="caravan-price text-danger">
                                            od {{round($result_item->reservation->caravan->price_from * 0.95) }}
                                        </div>
                                    @else
                                        <div class="caravan_sale">
                                            Sleva 10%
                                        </div>
                                        <div class="caravan-price text-danger">
                                            od {{round($result_item->reservation->caravan->price_from * 0.90) }}
                                        </div>
                                    @endif
                                    <div class="price">
                                        {{$result_item->price}}
                                    </div> --}}
                                </div>
                                <div class="caravan-date-title text-center mt-3">
                                    <h5>Termín</h5>
                                </div>
                                <div class="row justify-content-around">
                                    <div class="caravan-avalibal">
                                        od <span class="caravan-avalibal-from">{{date('d-m', strtotime($result_item->avaliable_from))}}</span>
                                        do <span class="caravan-avalibal-to">{{date('d-m-Y', strtotime($result_item->avaliable_to))}}</span>
                                    </div>
                                </div>
                                <div class="caravn-days text-center">
                                    počet dnů <span class="days-for-rent">{{$result_item->day_diff}}</span>
                                </div>
                                <div class="price">
                                    {{-- {{$price}} --}}
                                </div>
                                <div class="d-flex justify-content-around mt-4">
                                    <a class="btn btn-to-calendar"
                                        href="{{ route('karavany.show', $result_item->reservation->caravan->slug) }}" >
                                        Detail vozu
                                    </a>
                                    <a class="btn btn-to-form"
                                        href="/rezervace?caravan={{$result_item->reservation->caravan->id}}&start_date={{$result_item->avaliable_from}}&end_date={{$result_item->avaliable_to}}">
                                        Pronajmout
                                    </a>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                @endforeach

            </div>
            @else
            <div class="emty-last-minute">Momentálně nejsou žádné Last Minute k dispozici.</div>
            @endif
        </div>
    </div>
</div>

@endsection
