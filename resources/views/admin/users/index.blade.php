@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa uživatelů</h5>
                </div>
            </div>

            
            <div class="d-flex align-items-center flex-wrap">

                @can('Zobrazit uživatelské skupiny')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Uživatelské skupiny">
                        <a href="{{ route('skupiny.index') }}" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1 mr-3">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 L7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>Skupiny</a>
                    </div>
                @endcan

                @can('Vytvořit uživatele')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nový uživatel">
                        <a href="{{ route('uzivatele.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>Přidat nového uživatele</a>
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
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Seznam všech uživatelů
                                    <span class="d-block text-muted pt-2 font-size-sm">seznam všech uživatelů uložených v databázi</span>
                                </h3>
                            </div>						
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>Uživatel</th>
                                                <th>Kontakt</th>
                                                <th>Adresa</th>
                                                <th>Datum narození</th>
                                                <th>Sleva</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Akce</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40 symbol-light-warning flex-shrink-0">
                                                                <span class="symbol-label font-size-h4 font-weight-bold">{{ $user->initials }}</span>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                    {{ $user->name }} {{ $user->last_name }}
                                                                </div>
                                                                <span class="text-muted font-weight-bold" data-toggle="tooltip" data-title="{{ $user->ico }} | {{ $user->dic }}">
                                                                    {{ $user->company }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div><a href="tel:{{ $user->phone }}" class="text-muted font-weight-bold text-hover-primary">{{ $user->phone }}</a></div>
                                                        <div><a href="mailto:{{ $user->email }}" class="text-muted font-weight-bold text-hover-primary">{{ $user->email }}</a></div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="text-muted">{{ $user->address }}</div>
                                                        <div class="text-muted">{{ $user->zip }}, {{ $user->city }}</div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span class="text-muted">{{ $user->birthdate->format('d.m.Y') }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div>{{ $user->discount }}%</div>
                                                        <div class="text-muted small">({{ $user->reservations_discount }}%)</div>
                                                    </td>
                                                    <td class="align-middle">
                                                        @foreach($user->getRoleNames() as $role)
                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">{{ $role }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="align-middle">
                                                        @if($user->trashed())
                                                            <span class="label label-lg font-weight-bold label-light-danger label-inline">Neaktivní</span>
                                                        @else
                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">Aktivní</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle" nowrap>
                                                        @can('Upravit uživatele')
                                                            @if(!$user->trashed())
                                                                <a href="{{ route('uzivatele.edit', $user->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Upravit">
                                                                    <span class="svg-icon svg-icon-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        @endcan
                                                        
                                                        @can('Smazat uživatele')
                                                            @if($user->trashed())
                                                                <a href="{{ route('uzivatele.restore', $user) }}" class="btn btn-sm btn-clean btn-icon" title="Obnovit">
                                                                    <span class="svg-icon svg-icon-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                <polygon fill="#000000" opacity="0.3" points="10.0888887 24 14.5333331 18 12.3111109 18 12.3111109 14 7.86666648 20 10.0888887 20"/>
                                                                                <path d="M5.74714567,14.0425758 C4.09410362,12.9740356 3,11.1147886 3,9 C3,5.6862915 5.6862915,3 9,3 C11.7957591,3 14.1449096,4.91215918 14.8109738,7.5 L17.25,7.5 C19.3210678,7.5 21,9.17893219 21,11.25 C21,13.3210678 19.3210678,15 17.25,15 L8.25,15 C7.28817895,15 6.41093178,14.6378962 5.74714567,14.0425758 Z" fill="#000000"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            @else
                                                                {!! Form::open(['method' => 'delete', 'route' => ['uzivatele.destroy', $user], 'style'=>'display: inline']) !!}
                                                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Smazat" onclick="return confirm('Vážně si přejete odstranit tohoto uživatele?')">
                                                                        <span class="svg-icon svg-icon-md">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                {!! Form::close() !!}
                                                            @endif
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
