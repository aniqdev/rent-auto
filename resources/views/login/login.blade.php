@extends('layouts.app')
@section('title', 'Přihlášení')
@section('class', 'login space-top')

@section('content')

    <div class="page-intro">
        <div class="page-intro__content">
            <div class="page-header">
                <h1>Přihlášení</h1>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__page">

        <div class="container">

            <div class="row mb-4">
            
                <div class="col-md-4 offset-md-4">

                    {!! Form::open(['route' => 'login', 'class' => 'form w-xxl-550px bg-white rounded-lg p-20']) !!}

                        <div class="form-group material-control mb-4">
                            <label for="email" class="col-sm-8">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">E-mail</span>
                            </label>
                            {!! Form::email('email', null, ['class' => 'form-control mt-n3', 'autocomplete' => 'off', 'autofocus', 'required']) !!}
                        </div>

                        <div class="form-group material-control mb-4">
                            <label for="password" class="col-sm-8">
                                <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Heslo</span>
                            </label>
                            {!! Form::password('password', ['class' => 'form-control mt-n3', 'autocomplete' => 'off', 'autofocus']) !!}
                        </div>

                        <div class="form-group text-center">
                            {!! Form::button('Vstupit <i class="icofont-login"></i>', ['type' => 'submit', 'class' => 'primary-btn px-5 py-3']) !!}
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <p>K registraci budete vyzván v průběhu Vaší první rezervace.</p>
                </div>
            </div>

        </div>

    </div>


    <div class="top-list top-list-page">

        <div class="content--center">

            <h2>Nejoblíbenejší vozy k pronájmu</h2>
            <span class="content-title-description">Zákazníci u nás nejčastěji zapujčují</span>

        </div>

        <x-best-caravan-list :caravans="$caravans" />

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
