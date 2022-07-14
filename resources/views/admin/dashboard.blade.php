@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Nástěnka</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <a href="#" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1 mr-3" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="" data-placement="top" data-original-title="Aktuální datum">
                    <span class="opacity-60 font-weight-bolder mr-2" id="kt_dashboard_daterangepicker_title">Dnes:</span>
                    <span class="font-weight-bolder" id="kt_dashboard_daterangepicker_date">{{ $current_date }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title">
                                <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Vytíženost karavanů</span>
                            </h3>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                            <span class="font-weight-bolder display5 text-dark-75 py-4 pl-5 pr-5">
                                <span class="font-weight-normal font-size-h6 text-muted counter">{{ $caravan_reserved }} /</span>
                                {{ $caravan_count }}
                            </span>
                            <reservation-chart></reservation-chart>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title">
                                <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Oblíbenost karavanů</span>
                            </h3>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-between pt-0">
                            <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-4">9.3M</span>
                            <div class="d-flex align-items-center justify-content-between w-300px">
                                <caravan-chart :reservations="{{ $reservations }}"></caravan-chart>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <span class="symbol symbol-circle symbol-light-primary symbol-60 mr-5">
                                    <span class="symbol-label d-flex flex-column">
                                        <span class="font-weight-bolder font-size-h3">08</span>
                                        <span class="font-weight-bold font-size-sm text-uppercase">Dec</span>
                                    </span>
                                </span>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h5">Poslední Google recenze</a>
                                    <span class="text-muted font-weight-bold mt-2">Matúš Vojáček</span>
                                </div>
                            </div>
                            <p class="pt-7 mb-1">Skvělé služby, ...</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between flex-wrap py-4">
                            <a href="#" class="btn btn-sm btn-primary font-weight-bolder px-6">Zobrazit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div id="stats-widget-slider-1" class="carousel slide" data-ride="carousel" data-interval="8000">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <span class="font-size-h6 text-muted font-weight-bolder text-uppercase pr-2">Poslední rezervace</span>
                                </div>
                                <div class="carousel-inner pt-9">
                                    <div class="carousel-item active">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            @foreach($reservations->sortByDesc('id')->take(4) as $reservation)
                                                <p class="text-dark-75 font-size-lg font-weight-normal pt-2 mb-0"><strong>{{ $reservation->id }}</strong> - <a href="{{ route('admin.rezervace.show', $reservation->id) }}" class="text-secondary">{{ $reservation->caravan->name }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div id="stats-widget-slider-1" class="carousel slide" data-ride="carousel" data-interval="8000">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <span class="font-size-h6 text-muted font-weight-bolder text-uppercase pr-2">Nejbližší odjezdy</span>
                                </div>
                                <div class="carousel-inner pt-9">
                                    <div class="carousel-item active">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            @foreach($reservations->where('start_date', '>=', Carbon\Carbon::now())->sortBy('start_date')->take(4) as $reservation)
                                                <p class="text-dark-75 font-size-lg font-weight-normal pt-2 mb-0"><strong>{{ $reservation->start_date->format('d.m.Y') }}</strong> - <a href="{{ route('admin.rezervace.show', $reservation->id) }}" class="text-secondary">{{ $reservation->caravan->name }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div id="stats-widget-slider-1" class="carousel slide" data-ride="carousel" data-interval="8000">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <span class="font-size-h6 text-muted font-weight-bolder text-uppercase pr-2">Nejbližší příjezdy</span>
                                </div>
                                <div class="carousel-inner pt-9">
                                    <div class="carousel-item active">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            @foreach($reservations->where('end_date', '>=', Carbon\Carbon::now())->sortBy('end_date')->take(4) as $reservation)
                                                <p class="text-dark-75 font-size-lg font-weight-normal pt-2 mb-0"><strong>{{ $reservation->end_date->format('d.m.Y') }}</strong> - <a href="{{ route('admin.rezervace.show', $reservation->id) }}" class="text-secondary">{{ $reservation->caravan->name }}</a></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div id="stats-widget-slider-2" class="carousel slide" data-ride="carousel" data-interval="8000">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <span class="font-size-h6 text-muted font-weight-bolder text-uppercase pr-2">Novinky</span>
                                    <div class="p-0">
                                        <a href="#stats-widget-slider-2" class="btn btn-icon btn-light btn-sm mr-1" role="button" data-slide="prev">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#stats-widget-slider-2" class="btn btn-icon btn-light btn-sm" role="button" data-slide="next">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="carousel-inner pt-9">
                                    @foreach($posts as $post)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold cursor-pointer">{{ $post->name }}</h3>
                                                <p class="text-dark-75 font-size-lg font-weight-normal pt-2 mb-0">{!! \Illuminate\Support\Str::limit(strip_tags($post->text), 42) !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div id="stats-widget-slider-3" class="carousel slide" data-ride="carousel" data-interval="8000">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <span class="font-size-h6 text-muted font-weight-bolder text-uppercase pr-2">Aktivní slevové kupóny</span>
                                    <div class="p-0">
                                        <a href="#stats-widget-slider-3" class="btn btn-icon btn-light btn-sm mr-1" role="button" data-slide="prev">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#stats-widget-slider-3" class="btn btn-icon btn-light btn-sm" role="button" data-slide="next">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="carousel-inner pt-9">
                                    @foreach($coupons as $coupon)
                                        <div class="carousel-item {{ ($loop->index == 1) ? 'active' : '' }}">
                                            <div class="flex-grow-1">
                                                <h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold cursor-pointer">{{ $coupon->name }}</h3>
                                                <p class="text-primary font-size-h2 font-weight-bolder pt-3 mb-0">{{ $coupon->discount }}{{ ($coupon->type == 'value') ? ',- Kč' : '%' }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 d-flex align-items-center justify-content-between pt-0">
                            <span class="text-muted font-size-lg font-weight-bold pr-2">Aktivní</span>
                            <a href="{{ route('kupony.index') }}" class="btn btn-sm btn-primary font-weight-bolder px-6">Zobrazit kupóny</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bold font-size-h4 text-dark-75">Přehled objednávek</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Poslední rezervované vozy</span>
                    </h3>
                </div>
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-borderless table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                            <thead>
                                <tr class="text-left">
                                    <th class="p-0 w-50px"></th>
                                    <th class="p-0 min-w-200px"></th>
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-180px"></th>
                                    <th class="p-0 min-w-200px"></th>
                                    <th class="p-0 min-w-100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pr-0 py-4">
                                        <div class="symbol symbol-45 flex-shrink-0 mr-5 mt-1">
                                            <img alt="Pic" src="/keen/theme/demo1/dist/assets/media/users/150-5.jpg">
                                        </div>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Marcus Smart</a>
                                        <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$32,000</span>
                                        <span class="text-muted font-weight-bold">Paid</span>
                                    </td>
                                    <td class="text-right pr-lg-25 pr-15">
                                        <span class="text-muted font-weight-500">ReactJs, HTML</span>
                                    </td>
                                    <td class="">
                                        <div class="d-flex flex-column w-100 mr-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="text-muted mr-2 font-size-sm font-weight-bolder">79%</span>
                                                <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                            </div>
                                            <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 79%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pr-0 py-4">
                                        <div class="symbol symbol-45 symbol-light-info flex-shrink-0 mr-5">
                                            <span class="symbol-label font-weight-bolder font-size-lg">AH</span>
                                        </div>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Andreas Hawks</a>
                                        <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,000</span>
                                        <span class="text-muted font-weight-bold">Paid</span>
                                    </td>
                                    <td class="text-right pr-lg-25 pr-15">
                                        <span class="text-muted font-weight-500">Python, MySQL</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column w-100 mr-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="text-muted mr-2 font-size-sm font-weight-bolder">65%</span>
                                                <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                            </div>
                                            <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pr-0 py-5">
                                        <div class="symbol symbol-45 symbol-light-success flex-shrink-0 mr-5">
                                            <span class="symbol-label font-weight-bolder font-size-lg">SC</span>
                                        </div>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sarah Connor</a>
                                        <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$170,000</span>
                                        <span class="text-muted font-weight-bold">Paid</span>
                                    </td>
                                    <td class="text-right pr-lg-25 pr-15">
                                        <span class="text-muted font-weight-500">Python, MySQL</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column w-100 mr-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="text-muted mr-2 font-size-sm font-weight-bolder">84%</span>
                                                <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                            </div>
                                            <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  --}}
        </div>
    </div>
@endsection
