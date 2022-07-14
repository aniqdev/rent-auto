{{--  <div class="seasons__wrapper">

    <div class="season-box__wrapper">
        <div class="box">
            <h3>Nové obytné vozy</h3>
            <p>Všechny naše vozy byly uvedeny do provozu v letech 2020 a 2021</p>
        </div>
        <div class="box">
            <h3>Bohatá výbava</h3>
            <p>Všechny naše vozy byly uvedeny do provozu v letech 2020 a 2021</p>
        </div>
        <div class="box">
            <h3>Nízké nájemné</h3>
            <p>Všechny naše vozy byly uvedeny do provozu v letech 2020 a 2021</p>
        </div>
        <div class="box">
            <h3>Nízké nájemné</h3>
            <p>Všechny naše vozy byly uvedeny do provozu v letech 2020 a 2021</p>
        </div>
    </div>

</div>  --}}

<div class="seasons__wrapper">

    <div class="season-item card-3">
        <div class="season-item__img">
            <img src="{{ asset('images/seasons/season-a.jpg') }}" alt="Sezóna A" />

            <div class="season-item__name">
                <div class="season-name">
                    Sezóna A
                </div>
                <div class="season-dates">
                    @foreach($caravan->seasons()->where('name', 'Sezóna A')->get() as $season_date)
                        <span class="d-block">{{ $season_date->date_range_string }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="season-item__description">
            <p class="font-weight-bolder title">Nájemné jen</p>
            <p class="font-weight-bolder value">od {{ number_format($caravan->getSeasonPriceFrom('Sezóna A'), 0, ',', ' ') }} Kč</p>
            <p class="text-muted">za den vč. DPH</p>
        </div>
    </div>

    <div class="season-item card-3">
        <div class="season-item__img">
            <img src="{{ asset('images/seasons/season-b.jpg') }}" alt="Sezóna B" />

            <div class="season-item__name">
                <div class="season-name">
                    Sezóna B
                </div>
                <div class="season-dates">
                    @foreach($caravan->seasons()->where('name', 'Sezóna B')->get() as $season_date)
                        <span class="d-block">{{ $season_date->date_range_string }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="season-item__description">
            <p class="font-weight-bolder title">Nájemné jen</p>
            <p class="font-weight-bolder value">od {{ number_format($caravan->getSeasonPriceFrom('Sezóna B'), 0, ',', ' ') }} Kč</p>
            <p class="text-muted">za den vč. DPH</p>
        </div>
    </div>

    <div class="season-item card-3">
        <div class="season-item__img">
            <img src="{{ asset('images/seasons/season-c.jpg') }}" alt="Sezóna C" />

            <div class="season-item__name">
                <div class="season-name">
                    Sezóna C
                </div>
                <div class="season-dates">
                    @foreach($caravan->seasons()->where('name', 'Sezóna C')->get() as $season_date)
                        <span class="d-block">{{ $season_date->date_range_string }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="season-item__description">
            <p class="font-weight-bolder title">Nájemné jen</p>
            <p class="font-weight-bolder value">od {{ number_format($caravan->getSeasonPriceFrom('Sezóna C'), 0, ',', ' ') }} Kč</p>
            <p class="text-muted">za den vč. DPH</p>
        </div>
    </div>

</div>