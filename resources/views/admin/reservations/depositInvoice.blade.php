<!DOCTYPE html>
<html>
<head>
    <title>Zálohová faktura</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <style>
        @page {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            letter-spacing: -1px;
            margin: 0;
        }

        header > div {
            font-size: 20px;
            font-style: bold;
            vertical-align: middle;
            width: 50%;
            display: inline-block;
        }

        article {
            padding: 54px;
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

        .col-3 {
            float: left;
            width: 33.33333%;
        }

        .clearfix {
            clear: both;
        }

        main {
            background: #f9f9ff;
            padding: 16px 54px;
            margin-bottom: 2px;
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

        table.table-stripped tr:nth-child(2n) {
            background: #f9f9ff;
        }

        table.table-stripped td {
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    <header style="width: 100%; height: 10%; padding: 0 54px;">
        <div style="text-align: left; padding-top: 24px;">
            <img src="{{ $logo }}" alt="TopObytneVozy.cz" width="140">
        </div>
        <div style="text-align: right; padding-top: 24px; white-space: nowrap;">
            ZÁLOHOVÁ FAKTURA {{ $reservation->created_at->format('Y') }}-{{ $reservation->id }}
        </div>
    </header>

    <main>
        <div class="row">
            <div class="col-2">
                <div class="d-block">K úhradě</div>
                <div style="font-size: 30px; font-weight: bold;">{{ number_format($price, 2, ',', ' ') }} Kč</div>
            </div>
            <div class="col-2">
                <div class="d-block">
                    <table>
                        <tr>
                            <td style="width: 136px;">Bankovní účet</td>
                            <td><strong>410517002/5500</strong></td>
                        </tr>
                        <tr>
                            <td>Variabilní symbol</td>
                            <td>{{ $reservation->id }}</td>
                        </tr>
                        <tr>
                            <td>Způsob platby</td>
                            <td>{{ $reservation->payment }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </main>

    <main style="padding: 0 54px;">
        <div class="row">
            <div class="col-3" style="padding: 16px 0;">
                <div class="d-block">Datum vystavení</div>
                <div class="d-block">{{ $reservation->created_at->format('d.m.Y') }}</div>
            </div>
            <div class="col-3" style="width: 28.33333%; border-left: 2px solid #fff; padding: 16px 0 16px 30px;">
                <div class="d-block">Datum splatnosti</div>
                <div class="d-block"><strong>{{ $reservation->created_at->addDays(3)->format('d.m.Y') }}</strong></div>
            </div>
            <div class="col-3" style="border-left: 2px solid #fff; padding: 16px 0 16px 30px;">
                <div class="d-block">Datum zdan. plnění</div>
                <div class="d-block">{{ $reservation->created_at->format('d.m.Y') }}</div>
            </div>
        </div>

        <div class="clearfix"></div>
    </main>

    <main>
        <div class="row">
            <div class="col-3">
                <div class="d-block">Odběratel</div>
                @if(!empty($reservation->company))
                    <div class="d-block"><strong>{{ $reservation->company }}</strong></div>
                @endif
                <div class="d-block">{{ $reservation->name }} {{ $reservation->last_name }}</div>
                <div class="d-block">{{ $reservation->address }}</div>
                <div class="d-block">{{ $reservation->city }}, {{ $reservation->zip }}</div>
                @if(!empty($reservation->ico))
                    <div class="d-block">IČO: <strong>{{ $reservation->ico }}</strong></div>
                @endif
                @if(!empty($reservation->dic))
                    <div class="d-block">DIČ: <strong>{{ $reservation->dic }}</strong></div>
                @endif
                <div class="d-block">Tel.: {{ $reservation->phone }}</div>
                <div class="d-block">E-mail.: {{ $reservation->email }}</div>
            </div>
            <div class="col-3" style="text-align: center;">
                <img src="http://api.paylibo.com/paylibo/generator/czech/image?accountNumber=410517002&bankCode=5500&amount={{ $price }}&currency=CZK&vs={{ $reservation->id }}&message=Pronajem&branding=false" alt="QR kód" width="66%">
            </div>
            <div class="col-3" style="margin-left: 30px;">
                <div class="d-block">Poskytovatel</div>
                <div class="d-block"><strong>TopCars RENT s.r.o.</strong></div>
                <div class="d-block">Sokolovská 428/130</div>
                <div class="d-block">Praha 8, 18600</div>
                <div class="d-block">IČO: <strong>06258875</strong></div>
                <div class="d-block">DIČ: <strong>CZ06258875</strong></div>
                <div class="d-block">Tel.: +420 734 757 756</div>
                <div class="d-block">E-mail.: rezervace@topobytnevozy.cz</div>
            </div>
        </div>

        <div class="clearfix"></div>
    </main>

    <article>
        <table class="table-stripped">
            <thead>
                <tr>
                    <th colspan="2" class="main">Podrobnosti rezervace:</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </article>
</body>
</html>