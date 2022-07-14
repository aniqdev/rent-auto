@extends('layouts.app')
@section('title', )
@section('description', )
@section('keywords',)
@section('class', 'page space-top')


@section('content')

<div class="page-intro">
    <div class="page-intro__content" >
        <div class="page-header">
            <h1>Nahrání fotek z dovolené</h1>
        </div>
    </div>
</div>

<div class="page-overlay">
    <separator-bg-light></separator-bg-light>
</div>



<div class="container">
    <div class="main-wrapper__page">

        <div class="wrapp-gallery px-5">
            <form class="client-gallery-wrap row" action="{{ route('client-gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                <input type="hidden" name="caravan_id" value="{{  $reservation->caravan_id }}">

                    <div class="col-md-6">
                        <div class="client-gallery-text">
                            <ol >
                                <li>Pro nahrání fotek klikněte na tlačítko NAHRÁT</li>
                                <li>Zvolte maximálně 10 fotografií, které chcete zaslat</li>
                                <li>Po zvolení fotografií z vaší galerie, klikněte na tlačítko ODESLAT</li>
                            </ol>
                            <span><i>Odesláním fotografií souhlasíte s jejich umístěním na webové stránky a sociální sítě firmy TopObytneVozy.</i></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endforeach
                        @endif
                        <div class="client-gallery-form mb-5">
                            <input oninput="gallery_input(this)" name="gallery[]" type="file" class="form-control mb-3" multiple>
                            <button class="btn btn-primary" type="submit">Odeslat</button>
                        </div>
                    </div>

            </form>


        </div>
    </div>
</div>









@endsection
