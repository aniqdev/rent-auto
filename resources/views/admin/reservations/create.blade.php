@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa rezervací</h5>
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
                                    Nová rezervace
                                </h3>
                            </div>						
                        </div>

                        {!! Form::open(['route' => 'admin.rezervace.store', 'files' => true]) !!}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('caravan_id', 'Karavan') !!}
                                        {!! Form::select('caravan_id', $caravans, null, ['class' => 'form-control', 'placeholder' => 'Zvolte karavan']) !!}
                                        <span class="form-text text-muted">Prosím vyberte kategorií karavanu.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('start_date', 'Datum začátku') !!}
                                        {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                                        <span class="form-text text-muted">Prosím zadejte počátační datum rezervace.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('end_date', 'Datum konce') !!}
                                        {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                                        <span class="form-text text-muted">Prosím zadejte konečný datum rezervace.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Volitelné příslušenství:</label>
                                    <div class="row">
                                        @foreach($accessories as $accessory)
                                            <div class="col-lg-4">
                                                <label class="option">
                                                    <span class="option-control">
                                                        <span class="radio">
                                                            {!! Form::checkbox('accessory[][id]', $accessory->id, false, ['class' => 'form-control']) !!}
                                                            <span></span>
                                                        </span>
                                                    </span>
                                                    <span class="option-label">
                                                        <span class="option-head">
                                                            <span class="option-title">{{ $accessory->name }}</span>
                                                            <span class="option-focus">{{ $accessory->price_per_day }} Kč</span>
                                                        </span>
                                                        <span class="option-body">
                                                            @if(!empty($accessory->access_charge))
                                                                <p>+ {{ $accessory->access_charge }} Kč jednorázově</p>
                                                            @endif
                                                            {!! Form::number('accessory[][count]', null, ['class' => 'form-control form-control-sm form-control-solid', 'placeholder' => '1']) !!}
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{--  <div class="form-group">
                                    <label>Volitelné příslušenství</label>
                                    <div class="checkbox-inline">
                                        @foreach($accessories as $accessory)
                                            <label class="checkbox">
                                                {!! Form::checkbox('accessory[]', $accessory->id, false, ['class' => 'form-control']) !!}
                                                <span></span>
                                                {{ $accessory->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>  --}}
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('name', 'Jméno zákazníka') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Jan']) !!}
                                        <span class="form-text text-muted">Prosím zadejte jméno zákazníka.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('last_name', 'Příjmení zákazníka') !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Novák']) !!}
                                        <span class="form-text text-muted">Prosím zadejte příjmení zákazníka.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('birthdate', 'Datum narození') !!}
                                        {!! Form::date('birthdate', null, ['class' => 'form-control', 'placeholder' => 'Novák']) !!}
                                        <span class="form-text text-muted">Prosím zadejte datum narození zákazníka.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('phone', 'Telefón zákazníka') !!}
                                        {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => '727806465']) !!}
                                        <span class="form-text text-muted">Prosím zadejte telefonický kontakt na zákazníka.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('email', 'E-mail zákazníka') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'jan@novak.cz']) !!}
                                        <span class="form-text text-muted">Prosím zadejte e-mail zákazníka.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('address', 'Adresa') !!}
                                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'V Mokřinách 8']) !!}
                                        <span class="form-text text-muted">Prosím zadejte adresu zákazníka.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('city', 'Město') !!}
                                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Praha 4']) !!}
                                        <span class="form-text text-muted">Prosím zadejte město adresy zákazníka.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('zip', 'PŠC') !!}
                                        {!! Form::number('zip', null, ['class' => 'form-control', 'placeholder' => '14700']) !!}
                                        <span class="form-text text-muted">Prosím zadejte PSČ adresy zákazníka.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('company', 'Společnost zákazníka') !!}
                                        {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => '4WORKS Solutions s.r.o.']) !!}
                                        <span class="form-text text-muted">Prosím zadejte společnost zákazníka.</span>
                                    </div>
                                    <div class="col-lg-2">
                                        {!! Form::label('ico', 'IČO') !!}
                                        {!! Form::number('ico', null, ['class' => 'form-control', 'placeholder' => '02674947']) !!}
                                        <span class="form-text text-muted">Prosím zadejte IČO zákazníka.</span>
                                    </div>
                                    <div class="col-lg-2">
                                        {!! Form::label('dic', 'DIČ') !!}
                                        {!! Form::number('dic', null, ['class' => 'form-control', 'placeholder' => 'CZ02674947']) !!}
                                        <span class="form-text text-muted">Prosím zadejte DIČ zákazníka.</span>
                                    </div>
                                    <div class="col-lg-5">
                                        {!! Form::label('comment', 'Poznámka') !!}
                                        {!! Form::text('comment', null, ['class' => 'form-control', 'placeholder' => 'Poznámka ...']) !!}
                                        <span class="form-text text-muted">Prosím zadejte poznámku k rezervaci.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Způsob platby:</label>
                                    <div class="col-lg-10">
                                        <div class="radio-inline">
                                            <label class="radio radio-solid" data-toggle="tooltip" data-placement="top" data-html="true" title="Platba bankovním převodem">
                                                {!! Form::radio('payment_method', 'bankwire', true) !!}
                                                <span></span>Bankovní převod
                                            </label>
                                            <label class="radio radio-solid" data-toggle="tooltip" data-placement="top" data-html="true" title="Platba v hotovosti na provozovně">
                                                {!! Form::radio('payment_method', 'cash', false) !!}
                                                <span></span>Hotově
                                            </label>
                                        </div>
                                        <span class="form-text text-muted">Prosím vyberte platební metodu.</span>
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
