@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Správa atributů pro karavany</h5>
                </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                @can('Vytvořit kategorií vozidel')
                    <div data-toggle="tooltip" title="" data-placement="top" data-original-title="Nová kategorie">
                        <a href="{{ route('admin.karavany-vlasnosti.create') }}" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>Přidat kategorií atributů</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            @foreach($categories as $category)
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="{{ route('admin.karavany-vlasnosti.show', $category->id) }}" class="text-dark text-hover-primary font-size-h5 font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                {{ $category->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="my-lg-0 my-1">
                                        {{--  <span class="mr-4 sort-handler">
                                            <span class="svg-icon svg-icon-2x">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M10.4289322,12.3786797 L5.30761184,7.25735931 C4.91708755,6.86683502 4.91708755,6.23367004 5.30761184,5.84314575 C5.69813614,5.45262146 6.33130112,5.45262146 6.72182541,5.84314575 L11.8431458,10.9644661 L18.0355339,4.77207794 C18.4260582,4.38155365 19.0592232,4.38155365 19.4497475,4.77207794 C19.8402718,5.16260223 19.8402718,5.79576721 19.4497475,6.1862915 L13.2573593,12.3786797 L19.4497475,18.5710678 C19.8402718,18.9615921 19.8402718,19.5947571 19.4497475,19.9852814 C19.0592232,20.3758057 18.4260582,20.3758057 18.0355339,19.9852814 L11.8431458,13.7928932 L6.72182541,18.9142136 C6.33130112,19.3047379 5.69813614,19.3047379 5.30761184,18.9142136 C4.91708755,18.5236893 4.91708755,17.8905243 5.30761184,17.5 L10.4289322,12.3786797 Z" fill="#000000" opacity="0.3" transform="translate(12.378680, 12.378680) rotate(-315.000000) translate(-12.378680, -12.378680) "/>
                                                        <path d="M3.51471863,12 L5.63603897,14.1213203 C6.02656326,14.6736051 6.02656326,15.1450096 5.63603897,15.5355339 C5.24551468,15.9260582 4.77411016,15.9260582 4.22182541,15.5355339 L0.686291501,12 L4.22182541,8.46446609 C4.69322993,7.99306157 5.16463445,7.99306157 5.63603897,8.46446609 C6.10744349,8.93587061 6.10744349,9.40727514 5.63603897,9.87867966 L3.51471863,12 Z M12,20.4852814 L14.1213203,18.363961 C14.6736051,17.9734367 15.1450096,17.9734367 15.5355339,18.363961 C15.9260582,18.7544853 15.9260582,19.2258898 15.5355339,19.7781746 L12,23.3137085 L8.46446609,19.7781746 C7.99306157,19.3067701 7.99306157,18.8353656 8.46446609,18.363961 C8.93587061,17.8925565 9.40727514,17.8925565 9.87867966,18.363961 L12,20.4852814 Z M20.4852814,12 L18.363961,9.87867966 C17.9734367,9.32639491 17.9734367,8.85499039 18.363961,8.46446609 C18.7544853,8.0739418 19.2258898,8.0739418 19.7781746,8.46446609 L23.3137085,12 L19.7781746,15.5355339 C19.3067701,16.0069384 18.8353656,16.0069384 18.363961,15.5355339 C17.8925565,15.0641294 17.8925565,14.5927249 18.363961,14.1213203 L20.4852814,12 Z M12,3.51471863 L9.87867966,5.63603897 C9.32639491,6.02656326 8.85499039,6.02656326 8.46446609,5.63603897 C8.0739418,5.24551468 8.0739418,4.77411016 8.46446609,4.22182541 L12,0.686291501 L15.5355339,4.22182541 C16.0069384,4.69322993 16.0069384,5.16463445 15.5355339,5.63603897 C15.0641294,6.10744349 14.5927249,6.10744349 14.1213203,5.63603897 L12,3.51471863 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>  --}}
                                        <a href="{{ route('admin.karavany-vlasnosti.edit', $category->id) }}" class="btn btn-sm btn-light-primary font-weight-bolder mr-2">Upravit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
