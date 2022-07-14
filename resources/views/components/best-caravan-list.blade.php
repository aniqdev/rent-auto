<div class="mt-5">
    <div class="caravan-list_best">

        @foreach($caravans as $caravan)
            <div class="caravan-item card-4">

                <div class="caravan-item__img">
                    @if($caravan->photos()->exists())
                        <img src="{{ asset('storage/' . $caravan->photos()->first()->photography) }}" alt="{{ $caravan->name }}" />
                    @else
                        <img src="{{ asset('storage/images/no-image.png') }}" alt="{{ $caravan->name }}" />
                    @endif

                    <div class="caravan-item__name">
                        {{ $caravan->name }}
                    </div>
                </div>

                <div class="caravan-item__benefits key-benefits">
                    {!! $caravan->key_benefits !!}
                </div>

                <div class="caravan-item__icons">
                    <div class="caravan-item__readmore">
                        <a href="{{ route('karavany.show', $caravan->slug) }}">Více informací <i class="icofont-rounded-right"></i></a>
                    </div>

                    <div class="caravan-item__icon">
                        <div class="caravan-item__icon-img">
                            <license-icon />
                        </div>

                        <div class="caravan-item__icon-text">
                            {{ $caravan->driving_license }}
                        </div>
                    </div>

                    <div class="caravan-item__icon">
                        <div class="caravan-item__icon-img">
                            <person-icon />
                        </div>

                        <div class="caravan-item__icon-text">
                            {{ $caravan->seats }}
                        </div>
                    </div>

                    <div class="caravan-item__icon">
                        <div class="caravan-item__icon-img">
                            <bicycle-icon />
                        </div>

                        <div class="caravan-item__icon-text">
                            {{ $caravan->bike_carrier }}
                        </div>
                    </div>

                    @if(!empty($caravan->shower))
                        <div class="caravan-item__icon">
                            <div class="caravan-item__icon-img">
                                <shower-icon></shower-icon>
                            </div>

                            <div class="caravan-item__icon-text">
                            </div>
                        </div>
                    @endif

                    @if(!empty($caravan->toilet))
                        <div class="caravan-item__icon">
                            <div class="caravan-item__icon-img">
                                <toilet-icon></toilet-icon>
                            </div>

                            <div class="caravan-item__icon-text">
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        @endforeach

    </div>
</div>