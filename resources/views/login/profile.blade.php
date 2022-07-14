@extends('layouts.app')
@section('title', 'Váš profil')
@section('class', 'profile space-top')

@section('content')

    <div class="page-intro">
        <div class="page-intro__content">
            <div class="page-header">
                <h1>Váš profil</h1>
            </div>
        </div>
    </div>

    <div class="page-overlay">
        <separator-bg-light></separator-bg-light>
    </div>

    <div class="main-wrapper__page">

        <div class="container">

            <div role="tabpanel">
                <nav class="nav nav-hover" role="tablist">
                    <a href="#historie-objednavek" class="nav-item active" data-toggle="tab" role="tab" aria-controls="historie-objednavek" aria-selected="true">
                        Historie rezervací
                    </a>
                    {{-- <a href="#osobni-udaje" class="nav-item" data-toggle="tab" role="tab" aria-controls="osobni-udaje" aria-selected="true">
                        Osobní údaje
                    </a> --}}
                </nav>

                <div class="tab-content mt-4">
                    <div role="tabpanel" class="tab-pane fade show active" id="historie-objednavek" aria-labelledby="historie-objednavek-tab">

                        @if($user->reservations_discount > 0)
                            <div class="mb-4">
                                Vaše věrnostní sleva: <span class="text-secondary font-weight-bold">{{ $user->reservations_discount }}%</span>
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <th>Číslo rezervace</th>
                                <th>Vozidlo</th>
                                <th>Datum vypujčení</th>
                                <th>Datum vrácení</th>
                                <th>Cena celkem</th>
                                <th>Stav</th>
                            </thead>
                            <tbody>
                                @if($user->reservations)
                                    @foreach($user->reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td>{{ $reservation->caravan->name }}</td>
                                            <td>{{ $reservation->start_date->format('d.m.Y') }}</td>
                                            <td>{{ $reservation->end_date->format('d.m.Y') }}</td>
                                            <td class="text-secondary font-weight-bold">{{ number_format($reservation->total_price, 0, ',', ' ') }} Kč</td>
                                            <td><span class="badge" style="background-color: {{ $reservation->status->color }};">{{ $reservation->status->name }}</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" align="center">V tuto chvíli neevidujeme žádné rezervace.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- <div role="tabpanel" class="tab-pane fade" id="osobni-udaje" aria-labelledby="osobni-udaje-tab">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 offset-md-9 text-right">
                    {!! Form::open(['route' => 'logout']) !!}
                        {!! Form::submit('Odhlásit se', ['type' => 'submit', 'class' => 'secondary-btn px-3 py-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

    <div class="cta__wrapper">
        <div class="cta-header">
            <h2>Nemůžete najít, co potřebujete?</h2>
        </div>

        <div class="cta-content">
            <p>Vyzkoušejte nás kontaktovat pomocí formuláře.</p>
            <a href="{{ route('stranky.show', 'kontakt') }}" class="primary-btn">Kontaktovat <i class="icofont-thin-right"></i></a>
        </div>
    </div>

    <the-map></the-map>

@endsection
