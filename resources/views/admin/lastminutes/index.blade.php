@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa zlevněných pronájmů</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                @can('Vytvořit kupón')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nový lastminute">
                        <a href="{{ route('admin.lastminute.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>Přidat slevu na pronájdem</a>
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
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <g transform="translate(12.500000, 12.000000) rotate(-315.000000) translate(-12.500000, -12.000000) translate(6.000000, 1.000000)" fill="#000000" opacity="0.3">
                                                    <path d="M0.353553391,7.14644661 L3.35355339,7.14644661 C3.4100716,7.14644661 3.46549471,7.14175791 3.51945496,7.13274826 C3.92739876,8.3050906 5.04222146,9.14644661 6.35355339,9.14644661 C8.01040764,9.14644661 9.35355339,7.80330086 9.35355339,6.14644661 C9.35355339,4.48959236 8.01040764,3.14644661 6.35355339,3.14644661 C5.04222146,3.14644661 3.92739876,3.98780262 3.51945496,5.16014496 C3.46549471,5.15113531 3.4100716,5.14644661 3.35355339,5.14644661 L0.436511831,5.14644661 C0.912589923,2.30873327 3.3805571,0.146446609 6.35355339,0.146446609 C9.66726189,0.146446609 12.3535534,2.83273811 12.3535534,6.14644661 L12.3535534,19.1464466 C12.3535534,20.2510161 11.4581229,21.1464466 10.3535534,21.1464466 L2.35355339,21.1464466 C1.24898389,21.1464466 0.353553391,20.2510161 0.353553391,19.1464466 L0.353553391,7.14644661 Z" transform="translate(6.353553, 10.646447) rotate(-360.000000) translate(-6.353553, -10.646447) "/>
                                                    <rect x="2.35355339" y="13.1464466" width="8" height="2" rx="1"/>
                                                    <rect x="3.35355339" y="17.1464466" width="6" height="2" rx="1"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Seznam slevněných termínů
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                @if(!$lastminutes->isEmpty())
                                    <div class="table-responsive">
                                        <table class="table no-footer dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>Vozidlo</th>
                                                    <th>Název</th>
                                                    <th>Sleva</th>
                                                    <th>Termín od</th>
                                                    <th>Termín do</th>
                                                    <th>Akce od</th>
                                                    <th>Akce do</th>
                                                    <th>Uživatel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lastminutes as $lastminute)
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $lastminute->caravan->name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->discount }}%
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->start_date->format('d.m.Y') }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->end_date->format('d.m.Y') }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->started_at->format('d.m.Y') }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->ended_at->format('d.m.Y') }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $lastminute->user->name }} {{ $lastminute->user->last_name }}
                                                        </td>
                                                        <td class="align-middle" nowrap>
                                                            @can('Upravit lastminute')
                                                                @if(!$lastminute->trashed())
                                                                    <a href="{{ route('admin.lastminute.edit', $lastminute->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Upravit">
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



                                                            @can('Smazat lastminute')
                                                                @if($lastminute->trashed())
                                                                    <a href="{{ route('admin.lastminute.restore', $lastminute) }}" class="btn btn-sm btn-clean btn-icon" title="Obnovit">
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
                                                                    {!! Form::open(['method' => 'delete', 'route' => ['admin.lastminute.destroy', $lastminute], 'style'=>'display: inline']) !!}
                                                                        <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Smazat" onclick="return confirm('Vážně si přejete odstranit tento lastminute?')">
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

                                    {{-- {{ $lastminutes->links() }} --}}
                                @else
                                    <h6 class="text-center">Zatím není k dipozici žádný záznam</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
