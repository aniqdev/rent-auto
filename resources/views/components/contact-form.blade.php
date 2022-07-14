<div class="contact-form">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <h3 class="mb-4">Kontaktujte nás</h3>
    {!! Form::open(['route' => 'stranky.contact']) !!}
    <div id="contact_us_id"></div>
        <div class="row form-group material-control">
            <div class="col-md-6">
                <label for="email" class="col-sm-8">
                    <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Váš e-mail</span>
                </label>
                {!! Form::email('email', null, ['class' => 'form-control mt-n3 '.($errors->has('email') ? 'is-invalid':'')]) !!}
                @if($errors->has('email'))
                    <div class="invalid-feedback">Vyplňte prosím e-mail.</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="name" class="col-sm-8">
                    <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Vaše jméno</span>
                </label>
                {!! Form::text('name', null, ['class' => 'form-control mt-n3 '.($errors->has('name') ? 'is-invalid':'')]) !!}
                @if($errors->has('name'))
                    <div class="invalid-feedback">Vyplňte prosím jméno.</div>
                @endif
            </div>
        </div>

        <div class="row form-group material-control">
            <div class="col-md-12">
                <label for="text" class="col-sm-8">
                    <span class="h6 small bg-white text-muted pt-1 pl-2 pr-2">Vaše zpráva</span>
                </label>
                {!! Form::textarea('text', null, ['class' => 'form-control mt-n3 '.($errors->has('text') ? 'is-invalid':'')]) !!}
                @if($errors->has('text'))
                    <div class="invalid-feedback">Vyplňte prosím zprávu.</div>
                @endif
            </div>
        </div>

        <div class="row form-group material-control">
            <div class="col-md-6 text-left">
                {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        {{-- <div class="invalid-feedback">Vyplňte prosím zprávu.</div> --}}
                        <p class="text-danger">{{ $errors->first('g-recaptcha-response') }}</p>
                    </span>
                @else
                @endif



            </div>
            <div class="col-md-6 text-right">
                {!! Form::button('Odeslat <i class="icofont-send-mail"></i>', ['id' => 'contact_capture', 'type' => 'submit', 'class' => 'primary-btn']) !!}

            </div>
        </div>


    {!! Form::close() !!}
</div>





