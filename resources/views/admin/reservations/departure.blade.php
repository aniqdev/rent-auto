@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa rezervací</h5>
                </div>
            </div>
            {{--  <div class="d-flex align-items-center flex-wrap">
                <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nová rezervace">
                    <a href="{{ route('admin.rezervace.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                    </span>Přidat novou rezervaci</a>
                </div>
            </div>  --}}
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder font-size-h4 text-white">Odjezd do 10 dní <small>(tenerife)</small></span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="font-weight-bolder font-size-h1 text-white">{{ $nearest_reservations->count() }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-scroll ps max-h-180px">
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless text-white no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>Zákazník</th>
                                                <th>Karavan</th>
                                                <th>Období</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nearest_reservations as $nearest_reservation)
                                                <tr >
                                                    <td class="align-middle">
                                                        <a href="{{ route('admin.rezervace.show', $nearest_reservation->id) }}"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            title="{{ $nearest_reservation->status->name }}" class="text-white">
                                                            {{ $nearest_reservation->customer_name }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="font-weight-bolder">{{ $nearest_reservation->caravan->name }}</div>
                                                    </td>
                                                    <td class="align-middle text-nowrap">{{ $nearest_reservation->start_date->format('d.m.') }} - {{ $nearest_reservation->end_date->format('d.m.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-custom bg-danger card-stretch gutter-b">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder font-size-h4 text-white">Odjezd do 25 dní</span>
                            </h3>
                            <div class="card-toolbar">
                                <span class="font-weight-bolder font-size-h1 text-white">{{ $remind_reservations->count() }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-scroll ps max-h-180px">
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless text-white no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>Zákazník</th>
                                                <th>Karavan</th>
                                                <th>Období</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($remind_reservations as $remind_reservation)
                                                <tr >
                                                    <td class="align-middle">
                                                        <a href="{{ route('admin.rezervace.show', $remind_reservation->id) }}"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            title="{{ $remind_reservation->status->name }}" class="text-white">
                                                            {{ $remind_reservation->customer_name }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="font-weight-bolder">{{ $remind_reservation->caravan->name }}</div>
                                                    </td>
                                                    <td class="align-middle text-nowrap">{{ $remind_reservation->start_date->format('d.m.') }} - {{ $remind_reservation->end_date->format('d.m.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                                <span class="card-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Seznam rezervací
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-7">
                                <div class="accordion accordion-solid accordion-svg-toggle" id="accordionExample8">
                                    <div class="card">
                                        <div class="card-header" id="headingOne8">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne8">
                                                <div class="card-label">Filtrování rezervací</div>
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="collapseOne8" class="collapse show" data-parent="#accordionExample8">
                                            <div class="card-body">
                                                {!! Form::open(['route' => 'admin.rezervace.index', 'method' => 'GET']) !!}
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="row align-items-center mb-6">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center">
                                                                        {!! Form::label('caravan', 'Karavan:', ['class' => 'mr-3 mb-0 d-none d-md-block']) !!}
                                                                        {!! Form::select('caravan', $caravans, request()->get('caravan'), ['class' => 'form-control', 'placeholder' => 'Vyberte karavan', 'tabindex' => null]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center">
                                                                        {!! Form::label('status', 'Status:', ['class' => 'mr-3 mb-0 d-none d-md-block']) !!}
                                                                        {!! Form::select('status', $statuses, request()->get('status'), ['class' => 'form-control', 'placeholder' => 'Vyberte status', 'tabindex' => null]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center mb-2">
                                                                        <div class="form-check">
                                                                            {!! Form::checkbox('deleted', true, request()->get('deleted'), ['class' => 'form-check-input']) !!}
                                                                            {!! Form::label('deleted', 'Smazané rezervace', ['class' => 'form-check-label mr-3 mb-0 text-nowrap d-none d-md-block']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-start">
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center">
                                                                        {!! Form::label('daysToStart', 'Počet dnů od', ['class' => 'mr-3 mb-0 text-nowrap d-none d-md-block']) !!}
                                                                        {!! Form::number('daysToStart', request()->get('daysToStart'), ['class' => 'form-control', 'placeholder' => 'Počet dnů od půjčení']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 my-2 my-md-0">
                                                                    <div class="d-flex align-items-center mb-2">
                                                                        {!! Form::label('daysFromStart', ' do', ['class' => 'mr-3 mb-0 text-nowrap d-none d-md-block']) !!}
                                                                        {!! Form::number('daysFromStart', request()->get('daysFromStart'), ['class' => 'form-control', 'placeholder' => 'Počet dnů do půjčení']) !!}
                                                                    </div>
                                                                    <div class="d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-sm btn-light-primary font-weight-bold mr-2 control-btn" data-parent="daysFromStart" data-value="10">10 dní</button>
                                                                        <button type="button" class="btn btn-sm btn-light-danger font-weight-bold control-btn" data-parent="daysFromStart" data-value="25">25 dní</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-xl-3 mt-5 mt-lg-0">
                                                            {!! Form::submit('Filtrovat', ['class' => 'btn btn-light-primary px-6 font-weight-bold']) !!}
                                                            <a href="{{ route('admin.rezervace.index') }}" class="btn btn-secondary px-6 font-weight-bold">Obnovit</a>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="mb-7">
                                {!! Form::open(['route' => 'admin.rezervace.index', 'method' => 'GET']) !!}
                                    <div class="row align-items-center">
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="row align-items-center">
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        {!! Form::label('caravan', 'Karavan:', ['class' => 'mr-3 mb-0 d-none d-md-block']) !!}
                                                        {!! Form::select('caravan', $caravans, request()->get('caravan'), ['class' => 'form-control', 'placeholder' => 'Vyberte karavan', 'tabindex' => null]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        {!! Form::label('status', 'Status:', ['class' => 'mr-3 mb-0 d-none d-md-block']) !!}
                                                        {!! Form::select('status', $statuses, request()->get('status'), ['class' => 'form-control', 'placeholder' => 'Vyberte status', 'tabindex' => null]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 my-2 my-md-0">
                                                    <div class="d-flex align-items-center">
                                                        {!! Form::label('daysToStart', 'Počet >=', ['class' => 'mr-3 mb-0 d-none d-md-block']) !!}
                                                        {!! Form::number('daysToStart', request()->get('daysToStart'), ['class' => 'form-control', 'placeholder' => 'Počet dnů do půjčení']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-3 mt-5 mt-lg-0">
                                            {!! Form::submit('Filtrovat', ['class' => 'btn btn-light-primary px-6 font-weight-bold']) !!}
                                            <a href="{{ route('admin.rezervace.index') }}" class="btn btn-secondary px-6 font-weight-bold">Obnovit</a>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>  --}}


                           {{-- Test --}}
                            {{-- <div class="last-list container ">
                                <div class="row">
                                <ul class="col-sm-2">
                                        <h4>caravan</h4>
                                        @foreach ($last as $item)
                                    <li>

                                        {{$item->caravan_id}}
                                    </li>
                                    @endforeach
                                </ul>

                                <ul class="col-sm-2">
                                        <h4>start</h4>

                                        @foreach ($last as $item)
                                    <li>
                                        {{$item->start_date}}
                                    </li>
                                        @endforeach
                                </ul>

                                <ul class="col-sm-2">
                                        <h4>End</h4>
                                        @foreach ($last as $item)
                                    <li>

                                        {{$item->end_date}}
                                    </li>
                                        @endforeach
                                </ul>

                                <ul class="col-sm-2">
                                        <h4>Result</h4>
                                        @foreach ($last as $item)
                                        <li>

                                            {{-- {{ array_diff($item->end_date, $item->start_date) }} --}}
                                        {{-- </li>
                                        @endforeach
                                </ul>

                                <ul class="col-sm-1">
                                    <h4>caravan_id</h4>
                                    @foreach ($carav as $item)
                                    <li>
                                        {{$item}}
                                    </li>
                                    @endforeach
                                </ul>
                                </div>

                            </div>  --}}
                            {{-- Test --}}




                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Zákazník</th>
                                                <th>Karavan</th>
                                                <th>Období rezervace</th>
                                                <th>Cena</th>
                                                <th>Vytvořena</th>
                                                <th>Akce</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $reservation)
                                                <tr style="border-left: 4px solid {{ $reservation->status->color }};">
                                                    <td class="align-middle">
                                                        <a href="{{ route('admin.rezervace.show', $reservation->id) }}" data-toggle="tooltip" title="{{ $reservation->status->name }}">
                                                            {{ $reservation->id }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $reservation->customer_name }}</td>
                                                    <td class="align-middle">
                                                        <div class="font-weight-bolder">{{ $reservation->caravan->name }}</div>
                                                        <div class="text-muted">{{ $reservation->caravan->spz }}</div>
                                                    </td>
                                                    <td class="align-middle">{{ $reservation->start_date->format('d.m.') }} - {{ $reservation->end_date->format('d.m.Y') }}</td>
                                                    <td class="align-middle">{{ number_format($reservation->total_price, 0) }} Kč</td>
                                                    <td class="align-middle">
                                                        {{ $reservation->created_at->format('d.m.Y') }}

                                                        @if($reservation->days_to_start > 0)
                                                            <a href="javascript;" data-toggle="tooltip" title="Počet dnů do půjčení">
                                                                <strong>({{ $reservation->days_to_start }})</strong>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle" nowrap>
                                                        <a href="{{ route('admin.export.reservationList', $reservation->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Rezervační list" data-toggle="tooltip" data-title="Rezervační list">
                                                            <span class="svg-icon svg-icon-md">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('admin.export.reservationInvoice', $reservation->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Zálohová faktura" data-toggle="tooltip" data-title="Zálohová faktura">
                                                            <span class="svg-icon svg-icon-md">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                    {{ $reservations->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
