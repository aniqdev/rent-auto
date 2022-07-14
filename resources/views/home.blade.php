@extends('layouts.app')
@section('title', 'Půjčovna obytných vozů')
@section('description', 'Půjčovna obytných vozů. Pronajměte si obytný vůz s neomezeným nájezdem kilometrů a užijte si dovolenou s celou rodinou. Top půjčovna obytných vozů Praha.')
@section('class', 'homepage')

@section('content')

    <div class="intro-img intro-overlay">




        <div class="intro-img__content">

            <div class="hp-header">
                <h1 class="page-header">Půjčovna obytných vozů</h1>
                <x-date-picker-praha/>
            </div>

            <x-main-caravan-list :categories="$categories" />

        </div>

    </div>


    <div class="hp-content">

        <div class="top-list">

            <div class="content--center">
                            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popupModal">
                Launch demo modal
            </button> --}}

                <h2>Nejoblíbenejší vozy k pronájmu</h2>
                <span class="content-title-description">Zákazníci u nás nejčastěji zapujčují</span>

            </div>

            <x-best-caravan-list :caravans="$caravans" />

        </div>

        <trees-bg></trees-bg>

        {{--  <adv-section></adv-section>  --}}
        <x-adv-section />

    </div>


    <div class="container">
        @if ($avg_rating != 0)
        <div class="rating-avg text-center pb-5">
            <div class="reting-text d-block">
                <h2>
                    Hodnocení Topobztnevozy.cz
                </h3>
            </div>
            <div class="rating-starts-avg pl-5">
                <div class="avg-rating">{{number_format($avg_rating, 1)}}/5</div>
                <div class="small-ratings home-rating">
                    <?php for($i = 1; $i <=5; $i++): ?>
                    <i class="fa fa-star {{ round($avg_rating) >= $i  ? 'rating-color' : '' }}"></i>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        @endif

        {{-- <div class="avg-rating">{{$avg_rating}}</div> --}}


        @if (!empty($reviews->toArray()))
        <div id="carouselExampleInterval" class="carousel slide pb-5" data-ride="carousel" style="box-shadow: 0px 0px 20px 1px #ccc;padding: 30px;">
            {{-- data-ride="carousel"  --}}
            <div class="carousel-inner">
                @foreach (array_chunk($reviews->toArray(), 2) as $key => $review)
                    <div class=" carousel-item {{$key === 0 ? 'active' : ''}}" data-interval="10000">
                        <div class="row">
                            <div class="slider-1 col-6">
                                <div class="slider-header d-flex align-items-center" style="margin-left: 20%;">
                                    <h4 class="mr-3 rating-autor-home" style="display: block;text-align:center;">{{$review[0]['name']}}</h4>
                                    <div class="small-ratings">
                                        <?php for($i = 1; $i <=5; $i++): ?>
                                        <i class="fa fa-star {{ $review[0]['rating_service'] >= $i  ? 'rating-color' : '' }}"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div style="margin: 20px 20px 20px 130px;">{{$review[0]['recense_service']}}</div>
                            </div>
                            @if (isset($review[1]))
                            <div class="slider-2 col-6">
                                <div class="slider-header d-flex align-items-center"  style="margin-left: 3%;">
                                    <h4 class="mr-3 rating-autor-home" style="display: block;text-align:center;">{{$review[1]['name']}}</h4>
                                    <div class="small-ratings">
                                        <?php for($i = 1; $i <=5; $i++): ?>
                                        <i class="fa fa-star {{ $review[1]['rating_service'] >= $i  ? 'rating-color' : '' }}"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div style="margin: 20px 130px 20px 20px;">{{$review[1]['recense_service']}}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="bi bi-arrow-left" aria-hidden="true" style="font-size: 30px;color: #3b358b;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="bi bi-arrow-right" aria-hidden="true" style="font-size: 30px;color: #3b358b;" ></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @else
        <div id="carouselExampleInterval" class="carousel slide pb-5 d-none" data-ride="carousel" style="box-shadow: 0px 0px 20px 1px #ccc;padding: 30px;">
            <div class="carousel-inner">
            @foreach (array_chunk($reviews->toArray(), 2) as $key => $review)
                <div class=" carousel-item {{$key === 0 ? 'active' : ''}}" data-interval="10000">
                <div class="row">
                    <div class="slider-1 col-6">
                        <div class="slider-header d-flex align-items-center ">
                            <h3 style="display: block;text-align:center;">{{$review[0]['name']}}</h3>
                            <span>{{$review[0]['rating_service']}}</span>
                        </div>

                        <div style="margin: 20px 20px 20px 130px;">{{$review[0]['recense_service']}}</div>
                    </div>
                    @if (isset($review[1]))
                    <div class="slider-2 col-6" >
                        <div class="slider-header d-flex align-items-center">
                            <h3 style="display: block;text-align:center;">{{$review[1]['name']}}</h3>
                            <span>{{$review[1]['rating_service']}}</span>
                        </div>
                        <div style="margin: 20px 130px 20px 20px;">{{$review[1]['recense_service']}}</div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="bi bi-arrow-left" aria-hidden="true" style="font-size: 30px;color: #3b358b;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="bi bi-arrow-right" aria-hidden="true" style="font-size: 30px;color: #3b358b;" ></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        @endif

        <div class="home-page-rent-car-tenerif row mt-5">
            <div class="rent-car-tenerif-text col-lg-6">
                <a href="{{ route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum') }}">
                    <h3>Půjčovna obytných vozů Tenerife</h3>
                </a>
                <p>
                    Milujete cestování obytným vozem, tak jako my a zároveň vás láká exotické prostředí?
                    S naší půjčovnou na Tenerife vám umožníme procestovat ostrov v pohodlí obytňáku, tak jak jste zvyklý.
                    Na výběr máte mezi 3 auty, které vám budou dělat parťáka při cestování. Na Tenerife jsou krásné pláže a velmi zajímavá místa k pořádání výletů pro dospělé, ale i děti.
                    Ohledně parkování po ostrově vám pomůže aplikace Park4Night nebo náš Matěj, který na Tenerife žije. Zažijte pořádné dobrodružství a podívejte se co na vás čeká.
                </p>
                <div class="rent-car-tenerif-link mt-5 mb-5">
                    <a href="{{ route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum') }}" class="secondary-btn">Chci na Tenerife</a>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- box-shadow: 0px 5px 21px 5px grey;
                padding: 0; --}}
                <a href="{{ route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum') }}" class="rent-car-tenerif-photo ">
                    <img src="{{ asset('images/web/obytvoz.jpeg') }}">
                </a>
            </div>

        </div>
    </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>


    <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Líbí se Vám, co Vám můžeme nabídnout?</h2>
        </div>

        <div class="cta-content">
            <p>Neváhejte si také pronajmout obytný vůz.</p>
            <a href="{{ route('karavany-kategorie.index') }}" class="primary-btn">Pronajmout <i class="icofont-thin-right"></i></a>
        </div>
    </div>

    {{-- <div class="container"> --}}
    {{-- data-ride="carousel" --}}
    {{-- box-shadow: 0px 0px 20px 1px #ccc; --}}

    @if (!empty($galleries->toArray()))
        <div id="carouselImagesInterval" class="carousel slide p-5"  style="">
            {{-- data-ride="carousel"  --}}
            <div class="carousel-inner clients-gallery">
                @foreach (array_chunk($galleries->toArray(), 4) as $key => $gallery)
                    <div class=" carousel-item {{$key === 0 ? 'active' : ''}}" data-interval="1000000000">
                        <div class="row justify-content-center ">
                            {{-- align-items-center --}}
                            @foreach ($gallery as $image)
                            <div class="slider-1 col-2">
                                <a data-fancybox="gallery" class="client-image-link" href="{{$image['url']}}" style="background-image: url('{{$image['url']}}')">
                                    {{-- <img class="rounded client-image" src="{{$image['url']}}"/> --}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselImagesInterval" role="button" data-slide="prev">
                <span class="bi bi-arrow-left" aria-hidden="true" style="font-size: 30px;color: #3b358b;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselImagesInterval" role="button" data-slide="next">
                <span class="bi bi-arrow-right" aria-hidden="true" style="font-size: 30px;color: #3b358b;" ></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @else
        <div id="carouselImagesInterval" class="carousel slide pb-5 d-none" data-ride="carousel" style="box-shadow: 0px 0px 20px 1px #ccc;padding: 30px;">
            <div class="carousel-inner">
            @foreach (array_chunk($galleries->toArray(), 2) as $key => $gallery)
                <div class=" carousel-item {{$key === 0 ? 'active' : ''}}" data-interval="10000">
                    <div class="row justify-content-center">
                        <div class="slider-1 col-2">
                            <a data-fancybox="gallery" href="{{$gallery[0]['url']}}">
                                <img class="rounded" src="{{$gallery[0]['url']}}" style="width: 100%;  height: 200px; image-rendering: pixelated;"/>
                            </a>
                        </div>
                        @if (isset($gallery[1]))
                        <div class="slider-2 col-2" >
                            <a data-fancybox="gallery" href="{{$gallery[1]['url']}}">
                                <img class="rounded" src="{{$gallery[1]['url']}}" style="width: 100%;  height: 200px; image-rendering: pixelated;"/>
                            </a>
                        </div>
                        @endif
                        @if (isset($gallery[2]))
                        <div class="slider-2 col-2" >
                            <a data-fancybox="gallery" href="{{$gallery[2]['url']}}">
                                <img class="rounded" src="{{$gallery[2]['url']}}" style="width: 100%;  height: 200px; image-rendering: pixelated;"/>
                            </a>
                        </div>
                        @endif
                        @if (isset($gallery[3]))
                        <div class="slider-2 col-2" >
                            <a data-fancybox="gallery" href="{{$gallery[3]['url']}}">
                                <img class="rounded" src="{{$gallery[3]['url']}}" style="width: 100%;  height: 200px; image-rendering: pixelated;"/>
                            </a>
                        </div>
                        @endif
                    </div>
            </div>
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselImagesInterval" role="button" data-slide="prev">
                <span class="bi bi-arrow-left" aria-hidden="true" style="font-size: 30px;color: #3b358b;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselImagesInterval" role="button" data-slide="next">
                <span class="bi bi-arrow-right" aria-hidden="true" style="font-size: 30px;color: #3b358b;" ></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        @endif

    <the-map></the-map>


      <!-- Modal -->
  <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title popup-title" id="popupModal">
            Blogový článek: Volné termíny v červenci a srpnu.

          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body popup-body">
            {{-- <p class="popup-text">
                Podívejte se na aktuální obsazenost obytných aut v období velkých prázdnin.
            </p> --}}
            <div class="popup-img">
                <img src="{{ asset('images/popup/popupcome.png') }}" alt="">
            </div>
        </div>
        <div class="modal-footer popup-button">
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <a class="btn btn-secondary" href="{{ route('aktuality.show', 'pronajem-obytneho-vozu-v-cervenci-nebo-srpnu-pospeste-si') }}"> Volné termíny</a>
        </div>
      </div>
    </div>
  </div>

    <?php

    if (!isset($_COOKIE['SHOW_MODAL'])){

    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

            setTimeout(function() {
                $('#popupModal').modal('show')
            }, 5000);
            });
        </script>
    <?php
    setCookie('SHOW_MODAL', 'Y', time() + 3600, '/');
    }
    ?>


@endsection

{{-- Установим куку SHOW_MODAL значение Y на сутки для всех страниц сайта. --}}
{{-- 86400 сутки --}}
