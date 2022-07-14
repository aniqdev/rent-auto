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
                @can('Vytvořit pojem')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nový pojem">
                        <a href="{{ route('admin.slovnik.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>Přidat nový pojem</a>
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
                                                <path d="M7.34,19 L7.34,4.8 L12.68,4.8 C15,4.8 16.9,6.7 16.9,9.02 C16.9,10.02 16.52,10.84 15.9,11.46 C17.1,12.1 17.9,13.26 17.9,14.78 C17.9,17.12 16,19 13.6,19 L7.34,19 Z M10.54,16.06 L13.3,16.06 C14.16,16.06 14.78,15.44 14.78,14.66 C14.78,13.88 14.16,13.24 13.3,13.24 L10.54,13.24 L10.54,16.06 Z M10.54,10.54 L12.32,10.54 C13.18,10.54 13.8,9.92 13.8,9.14 C13.8,8.36 13.18,7.72 12.32,7.72 L10.54,7.72 L10.54,10.54 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Seznam všech pojmů
                                </h3>
                            </div>						
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <table class="table no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Pojem</th>
                                            <th>Uživatel</th>
                                            <th>Stav</th>
                                            <th>Vytvořeno</th>
                                            <th>Upraveno</th>
                                            <th>Akce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dictionaries as $dictionary)
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-warning flex-shrink-0">
                                                            <img src="{{ asset('storage/' . $dictionary->thumbnail) }}" alt="{{ $dictionary->name }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ $dictionary->name }}</div>
                                                            <a href="#" class="text-muted font-weight-bold text-hover-primary">{{ $dictionary->slug }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">{{ $dictionary->user->name }}</td>
                                                <td class="align-middle">
                                                    @if($dictionary->trashed())
                                                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Neaktivní</span>
                                                    @else
                                                        <span class="label label-lg font-weight-bold label-light-success label-inline">Aktivní</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $dictionary->created_at->format('d.m.Y') }}</td>
                                                <td class="align-middle">{{ $dictionary->updated_at->format('d.m.Y, H:i') }}</td>
                                                <td class="align-middle" nowrap>
                                                    @can('Upravit příspěvek')
                                                        @if(!$dictionary->trashed())
                                                            <a href="{{ route('admin.slovnik.edit', $dictionary->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Upravit">
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
                                                    
                                                    @can('Smazat pojem')
                                                        @if($dictionary->trashed())
                                                            <a href="{{ route('admin.slovnik.restore', $dictionary) }}" class="btn btn-sm btn-clean btn-icon" title="Obnovit">
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
                                                            {!! Form::open(['method' => 'delete', 'route' => ['admin.slovnik.destroy', $dictionary], 'style'=>'display: inline']) !!}
                                                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Smazat" onclick="return confirm('Vážně si přejete odstranit tento pojem?')">
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

                                {{ $dictionaries->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
