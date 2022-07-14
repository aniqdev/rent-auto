@extends('layouts.app')
@section('title', 'Půjčovna obytných vozů')
@section('class', 'pagenotfound')

@section('content')

    <div class="intro-img intro-overlay" style="background-image: url({{ asset('images/web/notfound-img.jpg') }})">

        <div class="intro-img__content">

            <div class="hp-header">
                <h1 class="page-header">Ups, tohle se nepovedlo ...</h1>
                <div class="w-100 mb-3 text-center text-white">Ať děláme, co děláme, nemůžeme požadovanou stránku najít.</div>
                <date-picker></date-picker>
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