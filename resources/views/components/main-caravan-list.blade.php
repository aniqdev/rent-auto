<div class="caravan-list">

    @foreach($categories as $category)
        <div class="caravan-item card-4">

            <a href="{{ route('karavany-kategorie.index') }}#kategorie-{{ $category->slug }}" class="caravan-item__link"></a>

            <div class="caravan-item__img">

                <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }}" />

            </div>

            <div class="caravan-item__content">
                <div class="caravan-item__num">
                    {{ $category->caravans->count() }}
                </div>

                <div class="caravan-item__text">
                    {{ $category->count_name }}
                </div>
            </div>

            <div class="caravan-item__icons">
                <div class="caravan-item__readmore">
                    <a href="{{ route('karavany-kategorie.index') }}#kategorie-{{ $category->slug }}">Více informací <i class="icofont-rounded-right"></i></a>
                </div>

                <div class="caravan-item__icon">
                    <div class="caravan-item__icon-img">
                        <license-icon></license-icon>
                    </div>

                    <div class="caravan-item__icon-text">
                        {{ $category->license }}
                    </div>
                </div>

                <div class="caravan-item__icon">
                    <div class="caravan-item__icon-img">
                        <person-icon></person-icon>
                    </div>

                    <div class="caravan-item__icon-text">
                        {{ $category->persons_range }}
                    </div>
                </div>

                <div class="caravan-item__icon">
                    <div class="caravan-item__icon-img">
                        <bicycle-icon />
                    </div>

                    <div class="caravan-item__icon-text">
                        {{ $category->bike_count }}
                    </div>
                </div>

                @if($category->shower)
                    <div class="caravan-item__icon">
                        <div class="caravan-item__icon-img">
                            <shower-icon></shower-icon>
                        </div>

                        <div class="caravan-item__icon-text">
                        </div>
                    </div>
                @endif

                @if($category->toilet)
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