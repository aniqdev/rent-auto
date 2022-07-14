<!DOCTYPE html>
<html>
<head>
    <title>Rezervace č. {{ $reservation->id }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <style>
        @page {
            font-family: DejaVu Sans, sans-serif;
            letter-spacing: -1px;
            margin: 0;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        header {
            width: 100%;
        }

        header > div {
            font-size: 12px;
            font-style: bold;
            vertical-align: middle;
            width: 30%;
            padding: 0;
            margin: 0;
            display: inline-block;
        }

        article {
            padding: 22px 54px 22px;
        }

        h1 {
            text-align: center;
        }

        h3 {
            color: #f08115;
        }

        .col-2 {
            float: left;
            width: 50%;
        }

        .clearfix {
            clear: both;
        }

        table {
            width: 100%;
        }

        table .main {
            vertical-align: middle;
            color: #fff;
            background: #3d358a;
            padding: 10px 0;
        }

        table tr:nth-child(2n) {
            background: #f9f9ff;
        }

        table td {
            padding: 6px 16px;
        }
    </style>
</head>
<body>
    <header style="color: #fff; background-color: #3d358a; width: 100%; height: 10%; padding: 0 40px;">
        <div style="text-align: left; padding-top: 24px;">
            rezervace@topobytnevozy.cz
        </div>
        <div style="text-align: center; padding-top: 24px;">
            <img src="{{ $logo }}" alt="TopObytneVozy.cz" width="140">
        </div>
        <div style="text-align: right; padding-top: 24px;">
            č. {{ $reservation->id }}
        </div>
    </header>

    <article>
        <h1>Rezervační list</h1>

        <div class="main-info">
            <div class="col-2">
                <h3>Nájemce:</h3>
                @if(!empty($reservation->company))
                    <div class="d-block"><strong>{{ $reservation->company }}</strong></div>
                @endif
                <div class="d-block">{{ $reservation->name }} {{ $reservation->last_name }}</div>
                <div class="d-block">{{ $reservation->address }}</div>
                <div class="d-block">{{ $reservation->city }}, {{ $reservation->zip }}</div>
                @if(!empty($reservation->ico))
                    <div class="d-block">IČO: {{ $reservation->ico }}</div>
                @endif
                @if(!empty($reservation->dic))
                    <div class="d-block">DIČ: {{ $reservation->dic }}</div>
                @endif
                <div class="d-block">Tel.: {{ $reservation->phone }}</div>
                <div class="d-block">E-mail.: {{ $reservation->email }}</div>
                <div class="d-block">Datum nar.: {{ date('d.m.Y', strtotime($reservation->birthdate)) }}</div>
            </div>
            <div class="col-2">
                <h3>Pronajímatel:</h3>
                <div class="d-block"><strong>TopCars RENT s.r.o.</strong></div>
                <div class="d-block">Sokolovská 428/130</div>
                <div class="d-block">Praha 8, 18600</div>
                <div class="d-block">IČO: 06258875</div>
                <div class="d-block">DIČ: CZ06258875</div>
                <div class="d-block">Tel.: +420 734 757 756</div>
                <div class="d-block">E-mail.: rezervace@topobytnevozy.cz</div>
            </div>
        </div>
    </article>

    <div class="clearfix"></div>

    <article>
        <table>
            <thead>
                <tr>
                    <th colspan="2" class="main">Podrobnosti:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Datum vytvoření</td>
                    <td>{{ $reservation->created_at->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Datum splatnosti</td>
                    <td>{{ $reservation->created_at->addDays(3)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Způsob platby</td>
                    <td>{{ $reservation->payment }}</td>
                </tr>
                <tr>
                    <td>Vozidlo</td>
                    <td>{{ $reservation->caravan->name }}</td>
                </tr>
                <tr>
                    <td>Číslo vozidla / SPZ</td>
                    <td>{{ $reservation->caravan->spz }}</td>
                </tr>
                <tr>
                    <td>Datum od</td>
                    <td>{{ $reservation->start_date->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Datum do</td>
                    <td>{{ $reservation->end_date->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <td>Záloha za pronájem</td>
                    <td>{{ number_format($reservation->base_deposit, 0, ',', ' ') }} Kč</td>
                </tr>
                <tr>
                    <td>Celkem za příslušenství</td>
                    <td>{{ number_format($reservation->accessories_price, 0, ',', ' ') }} Kč</td>
                </tr>
                <tr>
                    <td style="font-style: bold;">Celkem</td>
                    <td><strong>{{ number_format($reservation->total_price, 0, ',', ' ') }} Kč</strong></td>
                </tr>
                <tr>
                    <td>Volitelné příslušenství</td>
                    <td>
                        @foreach($reservation->accessories as $accessory)
                            <span>{{ $accessory->pivot->count }}x {{ $accessory->name }}, </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Interní poznámka</td>
                    <td><strong>{{ $reservation->note }}</strong></td>
                </tr>
            </tbody>
        </table>
    </article>
</body>
</html>