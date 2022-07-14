@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa pojmů</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Vrátit se zpět">
                    <a href="{{ url()->previous() }}" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                            </g>
                        </svg>
                    </span>Zpět</a>
                </div>
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
                                <h3 class="card-label">
                                    Nový pojem
                                </h3>
                            </div>						
                        </div>

                        {!! Form::open(['route' => 'admin.slovnik.store', 'files' => true]) !!}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('name', 'Pojem') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Náprava']) !!}
                                        <span class="form-text text-muted">Prosím zadejte název pojmu.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('thumbnail[]', 'Náhledový obrázek') !!}
                                        <div class="custom-file">
                                            {!! Form::file('thumbnail[]', ['class' => 'custom-file-input']) !!}
                                            <label class="custom-file-label" for="customFile">Prosím nahrajte náhledový obrázek pojmu.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('text', 'Obsah') !!}
                                        <div class="tinyeditor form-control" id="text">
                                            {!! old('text') !!}
                                        </div>
                                        <span class="form-text text-muted">Prosím zadejte popis pojmu.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('seo_title', 'SEO titulek') !!}
                                        {!! Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => 'Obchodní podmínky']) !!}
                                        <span class="form-text text-muted">Prosím zadejte titulek pro vyhledávače.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('seo_description', 'SEO popis') !!}
                                        {!! Form::text('seo_description', null, ['class' => 'form-control', 'placeholder' => 'Obchodní podmínky pro vypůjčení obytného ...']) !!}
                                        <span class="form-text text-muted">Prosím zadejte krátký popis pro vyhledávače.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('seo_keywords', 'SEO klíčová slova') !!}
                                        {!! Form::text('seo_keywords', null, ['class' => 'form-control', 'placeholder' => 'obchodni, podminky, karavany']) !!}
                                        <span class="form-text text-muted">Prosím zadejte klíčová slova pro vyhledávače.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('active', 'Publikováno') !!}
                                        <span class="switch">
                                            <label>
                                                {!! Form::checkbox('active', true) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="form-text text-muted">Je dostupné veřejnosti?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::button('<i class="fas fa-plus"></i>Přidat', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
