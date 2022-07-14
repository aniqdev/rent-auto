<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Přihlášení') }}</title>
        <meta name="keywords" content="přihlášení, login, systém, rezervace">
        <meta name="description" content="Přihlášení do administrace systému TopObytneVozy.cz">
        <meta name="author" content="4WORKS Solutions s.r.o.">
        <meta name="copyright" content="4WORKS Solutions s.r.o.">
        <meta name="robots" content="noindex, nofollow">

        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <!-- Scripts -->
        <script src="{{ mix('js/admin.js') }}" defer></script>
    </head>
    <body id="loginBody" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<div class="d-flex flex-column flex-root">
			<div class="login login-2 login-signin-on d-flex flex-column flex-column-fluid position-relative overflow-hidden" id="kt_login">
				<div class="login-header py-10 flex-column-auto">
					<div class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
						<a href="#" class="flex-column-auto py-5 py-md-0">
							<img src="{{ asset('images/logo-admin.svg') }}" alt="logo" class="h-100px" />
						</a>
					</div>
				</div>
				<div class="login-body d-flex flex-column-fluid align-items-stretch justify-content-center">
					<div class="container row">
						<div class="col-lg-6 d-flex align-items-center">
							<div class="login-form login-signin">
                                {!! Form::open(['route' => 'login', 'class' => 'form w-xxl-550px bg-white rounded-lg p-20']) !!}
									<div class="pb-13 pt-lg-0 pt-5">
										<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Vítejte v administraci</h3>
									</div>
									<div class="form-group">
                                        {!! Form::label('email', 'E-mail', ['class' => 'font-size-h6 font-weight-bolder text-dark']) !!}
                                        {!! Form::email('email', null, ['class' => 'form-control form-control-solid h-auto p-6 rounded-lg', 'autocomplete' => 'off', 'autofocus', 'required']) !!}
									</div>
									<div class="form-group">
										<div class="d-flex justify-content-between mt-n5">
                                            {!! Form::label('password', 'Heslo', ['class' => 'font-size-h6 font-weight-bolder text-dark pt-5']) !!}
											<a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot" tabindex="-1">Zapomenuté heslo?</a>
										</div>
                                        {!! Form::password('password', ['class' => 'form-control form-control-solid h-auto p-6 rounded-lg', 'autocomplete' => 'off']) !!}
									</div>
									<div class="pb-lg-0 pb-5">
                                        {!! Form::button('Vstupit', ['type' => 'submit', 'class' => 'btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3']) !!}
									</div>
                                {!! Form::close() !!}
							</div>
						</div>
						<div class="col-lg-6 bgi-size-contain bgi-no-repeat bgi-position-y-center bgi-position-x-center min-h-150px mt-10 m-md-0" style="background-image: url()"></div>
					</div>
				</div>
				<div class="login-footer py-10 flex-column-auto">
					<div class="container d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
						<div class="font-size-h6 font-weight-bolder order-2 order-md-1 py-2 py-md-0">
							<span class="text-muted font-weight-bold mr-2">2021©</span>
							<a href="https://posunemevasvys.cz" target="_blank" class="text-dark-50 text-hover-primary">4WORKS Solutions s.r.o.</a>
						</div>
						<div class="font-size-h5 font-weight-bolder order-1 order-md-2 py-2 py-md-0">
							<a href="{{ route('home') }}" class="text-primary">Zpět na web</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>