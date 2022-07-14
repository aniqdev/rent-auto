@foreach($caravans as $caravan)
    <div class="row cardbox-container">
        <div class="col-sm-12 cardbox">
            <div class="row align-items-center cardbox-header">
                <div class="col-md-3 cardbox__thumbnail">
                    <a href="{{ route('karavany.show', $caravan->slug) }}">
                        <img src="{{ asset('storage/' . $caravan->thumbnail) }}" alt="" style="width: 240px; height: auto;">
                    </a>

                    @isset($caravan->concern)
                        <div class="cardbox__flags">
                            <span class="flag">{{ $caravan->concern }}</span>
                        </div>
                    @endisset
                </div>
                <div class="col-md-6">
                    <h2>
                        <a href="{{ route('karavany.show', $caravan->slug) }}">
                            {{ $caravan->name }}
                        </a>
                    </h2>
                    <div class="cardbox__subtitle text-lowercase">
                        {{ $caravan->charasteristics }}
                    </div>
                    <div class="cardbox__tags">
                        <span class="badge badge-danger">neomezený nájezd km</span>
                    </div>
                </div>
                <div class="col-md-3 cardbox__actions text-right">
                    <div class="title">nájemné za den</div>
                    <div class="price mb-2">
                        <span class="text-muted">od</span>
                        {{ number_format($caravan->price_from, 0, ',', ' ') }} Kč
                        <span class="text-muted">vč. DPH</span>
                    </div>
                    <a href="{{ route('karavany.show', $caravan->slug) }}" class="secondary-btn">
                        Detail vozu
                        <i class="icofont-thin-right"></i>
                    </a>
                </div>
            </div>

            <div class="d-flex align-items-center cardbox-parameters">
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">v provozu od</div>
                        <div class="primary-value">{{ $caravan->year }}</div>
                    </div>
                </div>
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">počet sedadel</div>
                        <div class="primary-value">{{ $caravan->seats }}</div>
                    </div>
                </div>
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">počet lůžek</div>
                        <div class="primary-value">{{ $caravan->beds }}</div>
                    </div>
                </div>
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">délka</div>
                        <div class="primary-value">{{ number_format($caravan->length / 100, 2, ',', ' ') }} m</div>
                    </div>
                </div>
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">šířka</div>
                        <div class="primary-value">{{ number_format($caravan->width / 100, 2, ',', ' ') }} m</div>
                    </div>
                </div>
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">výška</div>
                        <div class="primary-value">{{ number_format($caravan->height / 100, 2, ',', ' ') }} m</div>
                    </div>
                </div>
                <div class="cardbox__parameter">
                    <div>
                        <div class="description">váha</div>
                        <div class="primary-value">{{ number_format($caravan->weight, 0, ',', ' ') }} kg</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
