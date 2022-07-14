@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa tarifů</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                @can('Vytvořit tarify')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nová kategorie">
                        <a href="{{ route('tarify.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>Přidat tarif</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-body py-20">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="py-20 px-10 px-lg-20">
                                <div class="d-flex flex-center position-relative py-20">
                                    <span class="svg svg-fill-primary opacity-5 position-absolute">
                                        <svg width="175" height="200">
                                            <polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline>
                                        </svg>
                                    </span>
                                    <span class="svg-icon svg-icon-5x svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M1.4152146,4.84010415 C11.1782334,10.3362599 14.7076452,16.4493804 12.0034499,23.1794656 C5.02500006,22.0396582 1.4955883,15.9265377 1.4152146,4.84010415 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M22.5950046,4.84010415 C12.8319858,10.3362599 9.30257403,16.4493804 12.0067693,23.1794656 C18.9852192,22.0396582 22.5146309,15.9265377 22.5950046,4.84010415 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M12.0002081,2 C6.29326368,11.6413199 6.29326368,18.7001435 12.0002081,23.1764706 C17.4738192,18.7001435 17.4738192,11.6413199 12.0002081,2 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-center text-center pt-10">
                                    <div class="d-flex justify-content-center pb-5">
                                        <span class="font-weight-bolder display-4 text-dark-75 align-self-center">Enjoy</span>
                                    </div>
                                    <h4 class="font-size-h6 d-block d-block font-weight-bold text-dark-50 pb-5">Basic License</h4>
                                    <ul class="list-unstyled text-muted mb-10">
                                        <li>1-400 dnů</li>
                                        <li>100km / den</li>
                                        <li>6,- Kč / km</li>
                                    </ul>
                                    @can('Upravit tarify')
                                        <a href="#" class="btn btn-primary text-uppercase font-weight-bolder px-16 py-4">Upravit</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
