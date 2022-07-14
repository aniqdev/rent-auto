@extends('admin.layouts.app')

@section('content')
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Rezervace č. <span class="font-weight-bold text-primary">{{ $reservation->id }}</span> z <strong>{{ $reservation->created_at->format('d.m.Y') }}</strong></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="d-flex">
                <div class="flex-row-fluid ml-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Upravit rezervaci</h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="{{ url()->previous() }}" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-5 my-1">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                                                    </g>
                                                </svg>
                                            </span>Zpět</a>
                                    </div>
                                </div>

                                {!! Form::model($reservation, ['route' => ['admin.rezervace.update', $reservation->id], 'method' => 'PUT']) !!}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <input type="hidden" name="start_date_" value="{{ $reservation->start_date->format('Y-m-d') }}">
                                                <input type="hidden" name="end_date_" value="{{ $reservation->end_date->format('Y-m-d') }}"> --}}
                                                <admin-reservation-calendar
                                                    :data="{{ $reservations }}"
                                                    :caravan="{{ $reservation->caravan->id }}"
                                                    :min-days="3"
                                                    start-date="{{ $reservation->start_date->format('Y-m-d') }}"
                                                    end-date="{{ $reservation->end_date->format('Y-m-d') }}">
                                                </admin-reservation-calendar>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Jméno zákazníka', []) !!}
                                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Adresa zákazníka', []) !!}
                                                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('zip', 'PSČ', []) !!}
                                                    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('email', 'E-mail zákazníka', []) !!}
                                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('company', 'Společnost', []) !!}
                                                    {!! Form::text('company', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('ico', 'IČO', []) !!}
                                                    {!! Form::text('ico', null, ['class' => 'form-control']) !!}
                                                </div>

                                                    <div class="accordion" id="accordionExample">
                                                        <div class="card">
                                                          <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                <h3 class="d-block text-center">Volitelné příslušenství</h3>
                                                              </button>
                                                            </h2>
                                                          </div>

                                                          <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <ul style="padding: 0" class="pb-5">
                                                                    @foreach ($accessories as $acc_id => $accessorie)
                                                                    <?php
                                                                    $max = isset($free_accessories[$acc_id]) ? $free_accessories[$acc_id]['max_count'] : 0;

                                                                    if (isset($reservation_accessories[$acc_id])) {
                                                                        $current =  $reservation_accessories[$acc_id]->pivot->count;
                                                                    }else{
                                                                        $current = 0;
                                                                    }
                                                                    $max = $max + $current;
                                                                    if ($max > $free_accessories[$acc_id]['real_max_count']) {
                                                                        $max = $free_accessories[$acc_id]['real_max_count'];
                                                                    }
                                                                    // + $current
                                                                    ?>
                                                                        <li class="accessory_item row p-2">
                                                                            {{-- [{{$acc_id}}] --}}
                                                                            <div class="col-5">
                                                                                {{ $accessorie }}
                                                                            </div>

                                                                            <div class="col-1" style="top: -3px;">
                                                                                <button class="btn reserv-edit-btn" type="button" onclick="accMinus(this)">-</button>
                                                                            </div>


                                                                            <div class="col-2" >
                                                                                <input type="hidden" name="accessories[{{$acc_id}}][id]" value="{{$acc_id}}">
                                                                                <input name="accessories[{{$acc_id}}][count]" value="{{$current}}" class="accessory_count" type="number" min="0" max={{$max }}>
                                                                            </div>
                                                                            <div class="col-1" style="top: -3px;">
                                                                                <button class="btn reserv-edit-btn" type="button" onclick="accPlus(this)">+</button>
                                                                            </div>

                                                                            <div class="col-3" style="
                                                                            display: grid; top: -7px;">
                                                                                {{-- maximalni moznost: {{$max }} --}}
                                                                                {{-- max: {{ $free_accessories[$acc_id]['max_count'] }}
                                                                                price: {{$free_accessories[$acc_id]['price_per_day']}}
                                                                                stock: {{ $free_accessories[$acc_id]['stock'] }}
                                                                                free: {{ $free_accessories[$acc_id]['real_stock'] }}
                                                                                real_max_count: {{ $free_accessories[$acc_id]['real_max_count'] }} --}}
                                                                                <span>maximalně: {{ $free_accessories[$acc_id]['max_count'] }}</span>
                                                                                <span>skladem: {{ $free_accessories[$acc_id]['stock'] }}</span>
                                                                                <span>volno: {{ $free_accessories[$acc_id]['real_stock'] }}</span>


                                                                                {{-- price: {{$free_accessories[$acc_id]['price_per_day']}} --}}


                                                                                {{-- real_max_count: {{ $free_accessories[$acc_id]['real_max_count'] }} --}}


                                                                                {{-- <span class="d-block">maximalni moznost: {{$max }}</span>
                                                                                <span class="d-block">skladem: {{ $free_accessories[$acc_id]['stock'] }}</span>
                                                                                <span class="d-block">volných: {{ $free_accessories[$acc_id]['real'] }}</span> --}}


                                                                                 {{-- real_max_count: {{ $free_accessories[$acc_id]['real_max_count'] }}
                                                                                  max: {{ $free_accessories[$acc_id]['real_max_count'] }} --}}

                                                                            </div>

                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>

                                                {{-- <ul>
                                                    @foreach($reservation->accessories as $accessory)
                                                        <li>{{ $accessory->name }} - {{ $accessory->pivot->count }}x</li>
                                                    @endforeach
                                                </ul> --}}


                                                {{-- <script>
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
                                                </script> --}}

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('last_name', 'Příjmení zákazníka', []) !!}
                                                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('city', 'Město', []) !!}
                                                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('phone', 'Telefón na zákazníka', []) !!}
                                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('birthdate', 'Datum narození', []) !!}
                                                    {!! Form::date('birthdate', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('dic', 'DIČ', []) !!}
                                                    {!! Form::text('dic', null, ['class' => 'form-control']) !!}
                                                </div>

                                                @can('Přijaté platby')
                                                <div class="form-group">
                                                    {!! Form::label('deposite_date', 'Přijetí zálohové platby', []) !!}
                                                    {!! Form::datetimelocal('deposite_date', $reservation->deposite_date, ['class' => 'form-control', 'readonly' => !is_null($reservation->deposite_date) ]) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('rest_pay_date', 'Přijetí celkové platby', []) !!}
                                                    {!! Form::datetimelocal('rest_pay_date', $reservation->rest_pay_date, ['class' => 'form-control', 'readonly' => !is_null($reservation->rest_pay_date)]) !!}
                                                </div>
                                                @endcan
                                            </div>
                                        </div>







                                            <div class="form-group row pt-5">
                                                <div class="col-md-3">
                                                    {!! Form::label('review_block', 'Neposílat maily') !!}
                                                    <span class="switch">
                                                        <label>
                                                            {!! Form::checkbox('review_block', true, null, ['id' => 'change_review_block_chbx', 'data-reservation' => $reservation->id]) !!}
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                    <span class="form-text text-muted">Neposílat maily?</span>
                                                </div>
                                                @if($reservation->caravan->tenerife)
                                                <div class="col-md-3">
                                                    {!! Form::label('contract', 'Smlouva') !!}
                                                    <span class="switch">
                                                        <label>
                                                            {!! Form::checkbox('contract', true, null, ['id' => 'change_contract_chbx', 'data-reservation' => $reservation->id]) !!}
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                    <span class="form-text text-muted">Smlouva?</span>
                                                </div>
                                                <div class="col-md-3">
                                                    {!! Form::label('bail', 'Kauce') !!}
                                                    <span class="switch">
                                                        <label>
                                                            {!! Form::checkbox('bail', true, null, ['id' => 'change_bail_chbx', 'data-reservation' => $reservation->id]) !!}
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                    <span class="form-text text-muted">Kauce?</span>
                                                </div>
                                            </div>
                                            {{-- <script>
                                                  document.addEventListener("DOMContentLoaded", function(event) {
                                                        $('#change_contract_chbx').on('change', function(){
                                                            // console.log('test contarct', $(this).is(":checked"));
                                                            var checked = $(this).is(":checked")
                                                            var res_id = $(this).data('reservation')
                                                            sendButtonAjax('contract', checked, res_id)
                                                        })
                                                        $('#change_bail_chbx').on('change', function(){
                                                            // console.log('test bail', $(this).is(":checked"));
                                                            var checked = $(this).is(":checked")
                                                            var res_id = $(this).data('reservation')
                                                            sendButtonAjax('bail', checked, res_id)

                                                        })

                                                        function sendButtonAjax(action, checked, res_id, ) {
                                                            $.post('testCheck',
                                                                {
                                                                    action: action,
                                                                    checked: checked,
                                                                    res_id: res_id,
                                                                    _token: $('meta[name="csrf-token"]').attr('content')
                                                                },
                                                                function(data) {

                                                                }, 'json'
                                                            )
                                                        }

                                                    });
                                            </script> --}}
                                        @endif
                                    </div>



                                    <div class="card-footer">
                                        {!! Form::button('<i class="fas fa-pen"></i>Upravit', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                                    </div>
                                {!! Form::close() !!}

                                <div class="col-md-12">
                                    <form  action="{{ route('notes.store', $reservation->id) }}" method="POST" class="form-group col-md-12" >
                                        @csrf
                                        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                        <label class="font-weight-bold" for="note">Interní poznámka:</label>
                                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                                        <button type="submit" class="btn btn-success mt-5">Přidat poznámku</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


                                        {{-- {!! Form::textarea('note', null, ['class' => 'form-control']) !!} --}}
