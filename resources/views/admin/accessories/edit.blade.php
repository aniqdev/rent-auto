@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa volitelného příslušenství</h5>
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
                                    Upravit příslušenství <strong>{{ $accessory->name }}</strong>
                                </h3>
                            </div>
                        </div>

                        {!! Form::model($accessory, ['route' => ['admin.prislusenstvi.update', $accessory->id], 'method' => 'PUT', 'files' => true]) !!}
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('name', 'Jméno') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Skládací židle']) !!}
                                        <span class="form-text text-muted">Prosím zadejte název příslušenství.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('price_per_day', 'Cena na den') !!}
                                            <div class="input-group">
                                                {!! Form::number('price_per_day', null, ['class' => 'form-control', 'step' => '.10', 'placeholder' => '25']) !!}
                                                <div class="input-group-append"><span class="input-group-text">Kč</span></div>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Prosím zadejte cenu za den pronájmu.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('access_charge', 'Jednorázový poplatek') !!}
                                            <div class="input-group">
                                                {!! Form::number('access_charge', null, ['class' => 'form-control', 'step' => '.10', 'placeholder' => '130']) !!}
                                                <div class="input-group-append"><span class="input-group-text">Kč</span></div>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Prosím zadejte výši slevy celým / desetiním číslem.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        {!! Form::label('max_count', 'Maximální množství k zapůjčení') !!}
                                        {!! Form::number('max_count', null, ['class' => 'form-control', 'step' => '1', 'placeholder' => '1']) !!}
                                        <span class="form-text text-muted">Prosím zadejte maximální možné množství k zapůjčení k jedné rezervaci.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('stock', 'Počet kusů skladem') !!}
                                        {!! Form::number('stock', null, ['class' => 'form-control border-success', 'step' => '1', 'placeholder' => '1']) !!}
                                        <span class="form-text text-muted">Prosím zadejte množství příslušenství které máte skladem.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        {!! Form::label('thumbnail[]', 'Obrázek příslušenství') !!}
                                        <div class="custom-file">
                                            {!! Form::file('thumbnail[]', ['class' => 'custom-file-input']) !!}
                                            <label class="custom-file-label" for="customFile">Prosím nahrajte obrázek příslušenství.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        {!! Form::label('description', 'Popis') !!}
                                        <div class="tinyeditor form-control" id="description" placeholder="Skládací židle s držákem nápojů v látkovém provedení ...">
                                            {!! $accessory->description !!}
                                        </div>
                                        <span class="form-text text-muted">Prosím zadejte stručný popis příslušenství.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::button('<i class="fas fa-pen"></i>Upravit', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                            </div>
                        {!! Form::close() !!}

                        <form class="container mb-5" action="{{ route('admin.prislusenstvi.destroy', $accessory->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger font-weight-bolder col-sm-1">
                                Smazat
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
