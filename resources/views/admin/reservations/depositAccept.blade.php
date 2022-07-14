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

        .text-start{
            text-align: start
        }

        .p-5{
            padding: 25px
        }

        .table-item-cenetr{
            text-align: center
        }

        .mright{
            margin-right: 10px
        }

        .size{
            font-size: 12px
        }

        .line {
            line-height: 0.4
        }

        header > div {
            font-size: 20px;
            font-style: bold;
            vertical-align: middle;
            /* width: 50%; */
            display: inline-block;
        }

        article {
            padding: 5px 54px;
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
            font-size: 14px
        }

        main .sum {
            background: #f9f9ff;
            padding: 16px 54px;
            margin-bottom: 2px;
            font-size: 14px
        }

        table {
            width: 100%;
            border-collapse: collapse;
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

        .border-line{
            border: 1px solid;
        }

        .table-border{
            border: 1px solid;
        }

        .pay-day{
            background: #3d358a;
            color: white
        }

        .bill-sum{
            background: #3d358a;
            color: white;
            font-size: 16px;
        }
    </style>

</head>
<body>
    <header class="row" style="width: 100%; height: 10%; padding: 20px 54px 0px 54px;">
        <div style="padding-top: 24px; display:inline">
            <img src="{{ $logo }}" alt="TopObytneVozy.cz" width="140">
        </div>
        <div style="padding: 0px 0px 0px 150px;">
            <span style="display: block; font-size: 16px; color: #3d358a; font-weight:bold;">
                <span class="mright" style="font-size: 16px; color:black">
                    Daňový doklad k přijaté platbě:
                </span>
            </span>
            <span style="display: block; font-size: 16px; color: #3d358a; font-weight:bold;">
                <span class="mright" style="font-size: 12px; color:black">
                    Variabilní symbol:
                </span>
            </span>
        </div>
        <div style=" padding: 0px 0px 0px 34px;">
            <span style="display: block; font-size: 16px; color: #3d358a; font-weight:bold;">
            <span>
                VDD{{ $reservation->deposite_counter}}
            </span>
            </span>

            <span style="display: block; font-size: 16px; color: #3d358a; font-weight:bold;">
            <span>
                {{ $reservation->id }}
            </span>
            </span>

        </div>
</header>

    <main>
        <div class="row">
            <div style="margin-left: 5px;float: left; width: 60%; text-align:left;">
                <div class="d-block">Poskytovatel</div>
                <div class="d-block"><strong>TopCars RENT s.r.o.</strong></div>
                <div class="d-block">Sokolovská 428/130</div>
                <div class="d-block">Praha 8, 18600</div>
                <div class="d-block">IČO: <strong>06258875</strong></div>
                <div class="d-block">DIČ: <strong>CZ06258875</strong></div>
                <div class="d-block">Tel.: +420 734 757 756</div>
                <div class="d-block">E-mail.: rezervace@topobytnevozy.cz</div>
                <div class="d-block">Bankovní účet: <strong>410517002/5500</strong></div>
            </div>

            <div style="text-align: left;float: left; width: 40%;">
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

                {{-- <img src="http://api.paylibo.com/paylibo/generator/czech/image?accountNumber=410517002&bankCode=5500&amount={{ $price }}&currency=CZK&vs={{ $reservation->id }}&message=Pronajem&branding=false" alt="QR kód" width="66%"> --}}
        </div>
        <div class="clearfix"></div>
    </main>

    <main>
        <div class="row">
            <div class="col-2" style="width: 65%">
                <div class="d-block">
                    <table>
                        <tr>
                            <td>Způsob platby</td>
                            <td style="color:red;">UHRAZENO - NEHRADIT</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="col-2" style="float: right; width: 35%;" >
                <table>
                    <tr>
                        <td>Datum vystavení:</td>
                        <td>{{ $reservation->deposite_date->format('d.m.Y') }}</td>
                    </tr>
                    <tr>
                        <td>Datum splatnosti:</td>
                        <td class="pay-day">{{ $reservation->deposite_date->format('d.m.Y') }}</td>
                    </tr>
                    <tr>
                        <td>Datum zdan. plnění:</td>
                        <td>{{ $reservation->deposite_date->format('d.m.Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="clearfix"></div>
    </main>
    <article style="padding: 25px 54px;">
        <table>
            <thead>
                <tr>
                    <th colspan="2" class="text-start">Daňový doklad k přijaté platbě (záloha {{$reservation->id}})</th>
                </tr>
            </thead>
        </table>
    </article>

    <article>
        <table class="table-stripped line">
            <thead>
                <tr>
                    <th colspan="2" class="main size">Podrobnosti rezervace:</th>
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


    <main style="padding: 5px 54px;" class="row">
        <div style="padding-top: 50px; margin-top: 35px;">
            <table class="table-stripped line table-border" style="width: 65%;padding-right: 15px; float: left;">
                <tr>
                    <th class="main size">#</th>
                    <th class="main size">Sazba:</th>
                    <th class="main size">Základ:</th>
                    <th class="main size">DPH:</th>
                    <th class="main size">Celkem:</th>
                </tr>
                <tr>
                    <td class="table-item-cenetr"></td>
                    <td class="table-item-cenetr">21%</td>
                    <td class="table-item-cenetr">{{ number_format($zaklad , 2, ',', ' ') }}</td>
                    <td class="table-item-cenetr">{{ number_format($dph , 2, ',', ' ') }}</td>
                    <td class="table-item-cenetr">{{ number_format($deposite , 2, ',', ' ') }}</td>
                </tr>
            </table>

            <div style="float: left; width: 35%">
                <div class="d-block bill-sum">
                    <strong>Celkem k úhradě : </strong>{{ number_format($deposite , 2, ',', ' ') }} Kč
                </div>
            </div>
        </div>
    </main>


</body>
</html>

