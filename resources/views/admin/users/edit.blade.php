@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa uživatelů</h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold">{{ $user->name }}</span>
                    </div>
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
                                    Upravit uživatele {{ $user->name }}
                                </h3>
                            </div>
                        </div>

                        {!! Form::model($user, ['route' => ['uzivatele.update', $user->id], 'method' => 'PUT']) !!}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('name', 'Jméno') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Jan']) !!}
                                        <span class="form-text text-muted">Prosím zadejte jméno uživatele.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('last_name', 'Příjmení') !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Novák']) !!}
                                        <span class="form-text text-muted">Prosím zadejte příjmení uživatele.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('email', 'E-mail') !!}
                                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@email.cz']) !!}
                                        <span class="form-text text-muted">Prosím zadejte platný e-mail pod kterým se bude uživatel přihlašovat.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('phone', 'Telefón') !!}
                                        {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => '720000000']) !!}
                                        <span class="form-text text-muted">Prosím zadejte platné telefonní číslo.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('birthdate', 'Datum narození') !!}
                                        {!! Form::date('birthdate', $user->birthdate, ['class' => 'form-control']) !!}
                                        <span class="form-text text-muted">Prosím zadejte datum narození.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('address', 'Adresa') !!}
                                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Hlavní 158/21']) !!}
                                        <span class="form-text text-muted">Prosím zadejte adresu a číslo popisné.</span>
                                    </div>
                                    <div class="col-lg-2">
                                        {!! Form::label('city', 'Město') !!}
                                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Praha']) !!}
                                        <span class="form-text text-muted">Prosím zadejte město.</span>
                                    </div>
                                    <div class="col-lg-2">
                                        {!! Form::label('zip', 'PSČ') !!}
                                        {!! Form::number('zip', null, ['class' => 'form-control', 'placeholder' => '14000']) !!}
                                        <span class="form-text text-muted">Prosím zadejte PSČ.</span>
                                    </div>
                                    <div class="col-lg-2">
                                        {!! Form::label('discount', 'Sleva') !!}
                                        {!! Form::number('discount', null, ['class' => 'form-control', 'placeholder' => '10']) !!}
                                        <span class="form-text text-muted">Prosím zadejte výši slevy v procentech.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('company', 'Společnost') !!}
                                        {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'TopCarsRent s.r.o.']) !!}
                                        <span class="form-text text-muted">Prosím zadejte název společnosti.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('ico', 'IČO') !!}
                                        {!! Form::number('ico', null, ['class' => 'form-control', 'placeholder' => '02674947']) !!}
                                        <span class="form-text text-muted">Prosím zadejte platné IČO.</span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('dic', 'DIČ') !!}
                                        {!! Form::text('dic', null, ['class' => 'form-control', 'placeholder' => 'CZ02674947']) !!}
                                        <span class="form-text text-muted">Prosím zadejte platné DIČ.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('password', 'Heslo') !!}
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Heslo']) !!}
                                        <span class="form-text text-muted">Prosím zadejte heslo minimálně 6 znaků dlouhé.</span>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('password_confirmation', 'Potvrzení hesla') !!}
                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Heslo']) !!}
                                        <span class="form-text text-muted">Prosím zadejte heslo znovu.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <label class="col-lg-1 col-form-label">Oprávnění:</label>
                                    <div class="col-lg-11">
                                        <div class="radio-inline">
                                            @foreach($roles as $role)
                                                <label class="radio radio-solid">
                                                    {!! Form::radio('role', $role->id, $user->hasRole($role->name)) !!}
                                                    <span></span>{{ $role->name }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <span class="form-text text-muted">Prosím vyberte uživatelskou roli.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::button('<i class="fas fa-pen"></i>Upravit', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
