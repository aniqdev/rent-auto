@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa slevových pravidel</h5>
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
            {!! Form::open(['route' => 'admin.slevy.store']) !!}
                <div class="row mb-8">    
                    <div class="col-lg-12">
                        <div class="card card-custom" data-card="true" id="kt_card_1">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Základní informace
                                    </h3>
                                </div>						
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('name', 'Název') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Sleva 2 dny na pronájem']) !!}
                                        <span class="form-text text-muted">Prosím zadejte název slevového pravidla.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('flag', 'Značka') !!}
                                        {!! Form::text('flag', null, ['class' => 'form-control', 'placeholder' => '7+2 zdarma']) !!}
                                        <span class="form-text text-muted">Značka se zobrazí u vozidel kterých se toto pravidlo týká.</span>
                                    </div>
                                    <div class="col-lg-2">
                                        {!! Form::label('priority', 'Priorita') !!}
                                        {!! Form::number('priority', null, ['class' => 'form-control', 'placeholder' => '1']) !!}
                                        <span class="form-text text-muted">Určuje prioritu pokud rezervace vyhovuje vícero pravidlem.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('description', 'Popis') !!}
                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Při rezervaci na 7 dnů 2 dny zdarma.']) !!}
                                        <span class="form-text text-muted">Prosím zadejte popis slevového pravidla.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('active', 'Aktivní') !!}
                                        <span class="switch">
                                            <label>
                                                {!! Form::checkbox('active', 1, true) !!}
                                                <span></span>
                                            </label>
                                        </span>
                                        <span class="form-text text-muted">Je slevové pravidlo aktivní?</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-8">    
                    <div class="col-lg-12">
                        <div class="card card-custom" data-card="true" id="kt_card_1">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Podmínky
                                    </h3>
                                </div>						
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('started_at', 'Platné od') !!}
                                        {!! Form::datetime('started_at', null, ['class' => 'form-control', 'placeholder' => 'Pravidlo začne platit od']) !!}
                                        <span class="form-text text-muted">
                                            Prosím zadejte datum počátku slevového pravidla.<br/>
                                            Ponechte 0 pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('ended_at', 'Platné do') !!}
                                        {!! Form::datetime('ended_at', null, ['class' => 'form-control', 'placeholder' => 'Pravidlo bude platit do']) !!}
                                        <span class="form-text text-muted">
                                            Prosím zadejte datum konce slevového pravidla.<br/>
                                            Ponechte 0 pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        {!! Form::label('min_price', 'Minimální částka rezervace') !!}
                                        <div class="input-group">
                                            {!! Form::number('min_price', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    Kč
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">
                                            Prosím zadejte minimální částku od které se má pravidlo aplikovat.<br/>
                                            Ponechte 0 pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('min_days', 'Minimální počet dnů rezervace') !!}
                                        {!! Form::number('min_days', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
                                        <span class="form-text text-muted">
                                            Prosím zadejte minimální počet dnů od kterých se má pravidlo aplikovat.<br/>
                                            Ponechte 0 pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('max_days', 'Maximální počet dnů rezervace') !!}
                                        {!! Form::number('max_days', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
                                        <span class="form-text text-muted">
                                            Prosím zadejte maximální počet dnů do kterých se má pravidlo aplikovat.<br/>
                                            Ponechte 0 pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                    <div class="col-lg-3">
                                        {!! Form::label('quantity', 'Celkem k dispozici') !!}
                                        <div class="input-group">
                                            {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    x
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">
                                            Prosím zadejte počet kolikrát se může pravidlo aplikovat.<br/>
                                            Ponechte 0 pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        {!! Form::label('start_date', 'Rezervace od') !!}
                                        {!! Form::date('start_date', null, ['class' => 'form-control', 'placeholder' => 'Pravidlo aplikovatna datum']) !!}
                                        <span class="form-text text-muted">
                                            Prosím zadejte datum pro omezení rezervace od.<br/>
                                            Ponechte prázdné pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        {!! Form::label('end_date', 'Rezervace do') !!}
                                        {!! Form::date('ended_at', null, ['class' => 'form-control', 'placeholder' => 'Pravidlo aplikovatna datum']) !!}
                                        <span class="form-text text-muted">
                                            Prosím zadejte datum pro omezení rezervace do.<br/>
                                            Ponechte prázdné pokud nechcete toto omezení použít.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('restrictions[]', 'Omezení') !!}
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                {!! Form::checkbox('restrictions[]', 'register', false, ['class' => 'form-control']) !!}
                                                <span></span>
                                                Pouze registrovaní uživatelé
                                            </label>
                                            <label class="checkbox">
                                                {!! Form::checkbox('restrictions[]', 'caravan', false, ['class' => 'form-control', 'data-select' => 'true', 'data-target' => '#caravan-list']) !!}
                                                <span></span>
                                                Výběr karavanu
                                            </label>
                                            <div class="form-group row collapse" id="caravan-list">
                                                <div class="col-lg-6">
                                                    {!! Form::label('caravans[]', 'Karavany') !!}
                                                    {!! Form::select('caravans[]', $caravans->pluck('name', 'id'), false, ['class' => 'form-control', 'multiple']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-8">    
                    <div class="col-lg-12">
                        <div class="card card-custom" data-card="true" id="kt_card_1">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Akce
                                    </h3>
                                </div>						
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('reductions[]', 'Použít slevu') !!}
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                {!! Form::radio('reductions[]', 'percent', false, ['class' => 'form-control']) !!}
                                                <span></span>
                                                Procenta (%)
                                            </label>
                                            <label class="checkbox">
                                                {!! Form::radio('reductions[]', 'amount', false, ['class' => 'form-control']) !!}
                                                <span></span>
                                                Částka
                                            </label>
                                            <label class="checkbox">
                                                {!! Form::radio('reductions[]', 'days', false, ['class' => 'form-control']) !!}
                                                <span></span>
                                                Dny
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('amount', 'Hodnota') !!}
                                        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::button('<i class="fas fa-plus"></i>Přidat', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection