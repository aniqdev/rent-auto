@extends('layouts.app')
@section('title', )
@section('description', )
@section('keywords',)
@section('class', 'page space-top')


@section('content')



<div class="page-intro">
    <div class="page-intro__content" >
        <div class="page-header">
            <h1>Recenze</h1>
        </div>
    </div>
</div>

<div class="page-overlay">
    <separator-bg-light></separator-bg-light>
</div>

<div class="container">
    <div class="main-wrapper__page">
        <div class="recense-title text-center mb-5">
            <h2>Napište nám svůj názor</h2>
        </div>
        <form action="{{ route('review.store') }}" method="POST"  class="mt-5">
            @csrf
            {{-- <input type="hidden" name="url" value="{{ $currentUrl = url()->current() }}"> --}}
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            <input type="hidden" name="caravan_id" value="{{  $reservation->caravan_id }}">

            <div class="row justify-content-center mb-5">
                <div class="form-control_recense">
                    <label class="text-center d-block" for=""><h3>Uveďte své jméno </h3></label>
                    <input value="{{old('name')}}" type="text" name="name" class="form-control {{($errors->has('name') ? 'is-invalid':'')}}" placeholder="Jmeno">
                    @if($errors->has('name'))
                    <div class="invalid-feedback">Uveďte své jméno</div>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center align-items-center ">
                <div class="col-md-3">
                    <h3> Číslo rezervace</h3>
                    <span>{{ $reservation->id }}</span>
                </div>
                <div class="col-md-3">
                    <h3>Název obytného auta</h3>
                    <span>{{ $reservation->caravan->name }}</span>
                </div>
                <div class="col-md-3">
                    <h3>Termín</h3>
                    <span>{{ $reservation->start_date->format('Y-m-d') }} - {{ $reservation->end_date->format('Y-m-d') }}</span>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-6 recense-text">
                        <label class="text-center d-block mb-5 mt-5" for="recense"><h3>Recenze na zapůjčené obytné auto</h3></label>
                        <textarea class="form-control {{($errors->has('recense_caravan') ? 'is-invalid':'')}}" name="recense_caravan" id="" cols="30" rows="10" placeholder="Napište text">{{ old('recense_caravan') }}</textarea>
                        @if($errors->has('recense_caravan'))
                        <div class="invalid-feedback">Recenze na zapůjčené obytné auto</div>
                        @endif
                        <div class="stars  ">
                            <h5 class="stars-title">Hodnocení</h5>
                            <div class="st">
                                <input value="5" class="star star-5 {{($errors->has('rating_caravan') ? 'is-invalid':'')}}" id="stark-5" type="radio" name="rating_caravan" @if(old('rating_caravan') == 5 ) checked @endif/>
                                <label class="star star-5" for="stark-5"></label>
                                <input value="4" class="star star-4" id="stark-4" type="radio" name="rating_caravan" @if(old('rating_caravan') == 4) checked @endif/>
                                <label class="star star-4" for="stark-4"></label>
                                <input value="3" class="star star-3" id="stark-3" type="radio" name="rating_caravan" @if(old('rating_caravan') == 3) checked @endif/>
                                <label class="star star-3" for="stark-3"></label>
                                <input value="2" class="star star-2" id="stark-2" type="radio" name="rating_caravan" @if(old('rating_caravan') == 2) checked @endif/>
                                <label class="star star-2" for="stark-2"></label>
                                <input value="1" class="star star-1 " id="stark-1" type="radio" name="rating_caravan" @if(old('rating_caravan') == 1) checked @endif/>
                                <label class="star star-1" for="stark-1"></label>
                                @if($errors->has('rating_caravan'))
                                <div class="invalid-feedback">Vyplňte prosím hodnocení na obytné auto</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 recense-text">
                        <label class="text-center d-block mb-5 mt-5" for="recense"><h3>Recenze na firmu TopObytneVozy.cz</h3></label>
                        <textarea class="form-control {{($errors->has('recense_service') ? 'is-invalid':'')}}" name="recense_service" id="" cols="30" rows="10" placeholder="Napište text">{{ old('recense_service') }}</textarea>
                        @if($errors->has('recense_service'))
                        <div class="invalid-feedback">Recenze na firmu TopObytneVozy.cz</div>
                        @endif
                        <div class="stars">
                            <h5 class="stars-title">Hodnocení</h5>
                            <div class="st">
                            <input value="5" class="star star-5 {{($errors->has('rating_service') ? 'is-invalid':'')}}" id="starr-5" type="radio" name="rating_service" @if(old('rating_service') == 5) checked @endif/>
                            <label class="star star-5" for="starr-5"></label>
                            <input value="4" class="star star-4" id="starr-4" type="radio" name="rating_service" @if(old('rating_service') == 4) checked @endif/>
                            <label class="star star-4" for="starr-4"></label>
                            <input value="3" class="star star-3" id="starr-3" type="radio" name="rating_service" @if(old('rating_service') == 3) checked @endif/>
                            <label class="star star-3" for="starr-3"></label>
                            <input value="2" class="star star-2" id="starr-2" type="radio" name="rating_service" @if(old('rating_service') == 2) checked @endif/>
                            <label class="star star-2" for="starr-2"></label>
                            <input value="1" class="star star-1" id="starr-1" type="radio" name="rating_service" @if(old('rating_service') == 1) checked @endif/>
                            <label class="star star-1" for="starr-1"></label>
                            @if($errors->has('rating_service'))
                            <div class="invalid-feedback">Vyplňte prosím hodnocení na firmu</div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg recense-button">
                <button class="primary-btn" type="submit">
                    Odeslat
                    <i class="icofont-send-mail"></i>
                </button>
            </div>
        </form>
    </div>
</div>


@endsection

