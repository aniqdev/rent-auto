@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa slideru</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                @can('Vytvořit příspěvek')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nový slide">
                        <a href="{{ route('admin.aktuality.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>Přidat nový slide</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row mb-8">    
                <div class="col-lg-12">
                    <div class="card card-custom" data-card="true" id="kt_card_1">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect opacity="0.200000003" x="0" y="0" width="24" height="24"/>
                                                <path d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Hlavní nastavení slideru
                                </h3>
                            </div>						
                        </div>

                        {!! Form::open(['route' => 'slider.store'], ) !!}
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            {!! Form::label('sliderSpeed', 'Rychlost změny slidu') !!}
                                            {!! Form::number('sliderSpeed', null, ['class' => 'form-control', 'placeholder' => '6000']) !!}
                                            <span class="form-text text-muted">Prosím zadejte hodnotu v ms.</span>
                                        </div>
                                        <div class="col-lg-6">
                                            {!! Form::label('autoplay', 'Autoplay') !!}
                                            
                                            <span class="switch">
                                                <label>
                                                    {!! Form::checkbox('autoplay', 'autoplay', true) !!}
                                                    <span></span>
                                                </label>
                                            </span>
                                            <span class="form-text text-muted">Automaticky přepínat slider?</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::button('<i class="far fa-save"></i>Uložit', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            <div class="row mb-8">    
                <div class="col-lg-12">
                    <div class="card card-custom" data-card="true" id="kt_card_1">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="card-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Seznam všech slidů
                                </h3>
                            </div>						
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <table class="table no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Aktualita</th>
                                            <th>Kategorie</th>
                                            <th>Uživatel</th>
                                            <th>Stav</th>
                                            <th>Vytvořeno</th>
                                            <th>Upraveno</th>
                                            <th>Akce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
