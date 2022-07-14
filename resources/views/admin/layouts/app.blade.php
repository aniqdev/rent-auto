<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name', 'TopObytneVozy.cz') }}</title>
        <meta name="keywords" content="@yield('keywords', 'půjčovna obytných vozů, půjčovna obytných aut, půjčovna obytných automobilů, půjčovna karavanů, pronájem obytných vozů, pronájem obytných aut, pronájem obytných automobilů, pronájem karavanů, obytné vozy, karavany')">
        <meta name="description" content="@yield('description', 'Pronájem obytných vozů - nové vozy pro 4 až 6 osob, neomezený počet ujetých km, kempingové vybavení a další volitelné příslušenství.')">
        <meta name="author" content="4WORKS Solutions s.r.o.">
        <meta name="copyright" content="4WORKS Solutions s.r.o.">
        <meta name="robots" content="noindex, nofollow">

        <link rel="canonical" href="{{ url()->current() }}">

        {{-- favicon --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">


        <link rel="stylesheet" href="{{asset('css/fancybox.css')}}">

        <!-- Scripts -->
        {{-- <script src="https://cdn.tiny.cloud/1/abcd1234/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
        <script src="https://cdn.tiny.cloud/1/6yhrwi1bod649xh5c5zsf2zfoo2cqfmtsgq6jd1gtn5tl4tx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script src="{{ asset('js/admin.js') }}" defer></script>


        {{-- <script src="/js/tinymce_new.min.js" referrerpolicy="origin"></script> --}}
        <script>
            function accMinus(button) {
            var input = button.closest('.accessory_item').querySelector('.accessory_count')
            var value = input.value
            if(value - 1 >= 0) input.value = value - 1

            }

            function accPlus(button) {
            var input = button.closest('.accessory_item').querySelector('.accessory_count')
            var value = +input.value
            if(value + 1 <= input.max) input.value = value + 1

            }
        </script>
    </head>
    <body class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable">
        <div id="app">
            <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
                <a href="{{ route('admin.dashboard') }}">
                    <img alt="Logo" src="{{ asset('images/logo-original.svg') }}">
                </a>
                <div class="d-flex align-items-center">
                    <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                        <span></span>
                    </button>
                    {{-- <button class="btn p-0 burger-icon ml-5" id="kt_header_mobile_toggle">
                        <span></span>
                    </button> --}}
                    <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                        <span class="svg-icon svg-icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>

            <div class="d-flex flex-column flex-root">
                <div class="d-flex flex-row flex-column-fluid page">

                    @include('admin.layouts.aside')

                    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                        @include('admin.layouts.header')

                        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                            <div class="container">
                                @include('flash::message')

                                @if ($errors->any())
                                    <div class="alert alert-danger mt-5">
                                        <ul style="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            @yield('content')
                        </div>

                        <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <div class="text-dark order-2 order-md-1">
                                    <span class="text-muted font-weight-bold mr-2">2021©</span>
                                    <a href="#" target="_blank" class="text-dark-75 text-hover-primary">TopObytneVozy.cz</a>
                                </div>
                                <div class="nav nav-dark">
                                    <a href="#" target="_blank" class="nav-link pl-0 pr-2">O nás</a>
                                    <a href="#" target="_blank" class="nav-link pr-0">Kontakt</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <script src="{{ asset('js/fancybox.umd.js') }}"></script>
    </body>
</html>
