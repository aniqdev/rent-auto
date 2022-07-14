@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa aktualit</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                @can('Vytvořit příspěvek')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nová aktualita">
                        <a href="{{ route('admin.aktuality.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>Přidat novou aktualitu</a>
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
                                                <path d="M3,19 L5,19 L5,21 L3,21 L3,19 Z M8,19 L10,19 L10,21 L8,21 L8,19 Z M13,19 L15,19 L15,21 L13,21 L13,19 Z M18,19 L20,19 L20,21 L18,21 L18,19 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M10.504,3.256 L12.466,3.256 L17.956,16 L15.364,16 L14.176,13.084 L8.65000004,13.084 L7.49800004,16 L4.96000004,16 L10.504,3.256 Z M13.384,11.14 L11.422,5.956 L9.42400004,11.14 L13.384,11.14 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <h3 class="card-label">
                                    Seznam všech aktualit
                                </h3>
                            </div>						
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <table class="table no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Aktualita</th>
                                            <th>Kategorie</th>
                                            <th>Uživatel</th>
                                            <th>Stav</th>
                                            <th>Vytvořeno</th>
                                            <th>Upraveno</th>
                                            <th>Akce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-warning flex-shrink-0">
                                                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->name }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ $post->name }}</div>
                                                            <a href="#" class="text-muted font-weight-bold text-hover-primary">{{ $post->slug }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">{{ $post->category->name }}</td>
                                                <td class="align-middle">{{ $post->user->name }}</td>
                                                <td class="align-middle">
                                                    @if($post->trashed())
                                                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Neaktivní</span>
                                                    @else
                                                        <span class="label label-lg font-weight-bold label-light-success label-inline">Aktivní</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $post->created_at->format('d.m.Y') }}</td>
                                                <td class="align-middle">{{ $post->updated_at->format('d.m.Y, H:i') }}</td>
                                                <td class="align-middle" nowrap>
                                                    @can('Upravit příspěvek')
                                                        @if(!$post->trashed())
                                                            <a href="{{ route('admin.aktuality.edit', $post->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Upravit">
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
                                                    
                                                    @can('Smazat příspěvek')
                                                        @if($post->trashed())
                                                            <a href="{{ route('admin.aktuality.restore', $post) }}" class="btn btn-sm btn-clean btn-icon" title="Obnovit">
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
                                                            {!! Form::open(['method' => 'delete', 'route' => ['admin.aktuality.destroy', $post], 'style'=>'display: inline']) !!}
                                                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Smazat" onclick="return confirm('Vážně si přejete odstranit tuto aktualitu?')">
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

                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
