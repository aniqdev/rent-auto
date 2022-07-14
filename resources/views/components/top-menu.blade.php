<div class="top-menu">

    <ul class="top-menu__primary">

        @foreach($items as $item)
            <li class="top-menu__item">
                <a href="{{ $item->link }}" class="top-menu__link" title="{{ $item->name }}">
                    {{ $item->name }}
                </a>
            </li>
        @endforeach

    </ul>

    <ul class="top-menu__secondary">

        <li class="top-menu__item">
            <a href="mailto:rezervace@topobytnevozy.cz" class="icon-btn">
                <i class="icofont-envelope"></i>
            </a>
        </li>

        <li class="top-menu__item">
            <a href="tel:00420725285432" class="icon-btn">
                <i class="icofont-phone"></i>
            </a>
        </li>

        <li class="top-menu__item">
            @if(!Auth::check())
                <a href="{{ route('prihlaseni.login') }}" class="icon-btn">
                    <i class="icofont-user-alt-3"></i>
                </a>
            @else
                <a href="{{ route('prihlaseni.login') }}" class="icon-txt">
                    <i class="icofont-user-alt-3"></i>
                    <span>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                </a>
            @endif
        </li>

        <li class="top-menu__item top-menu__dropdown">

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>{{ $lang_active->name }}</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($langs as $lang)
                        <a class="dropdown-item" href="#">{{ $lang->name }}</a>
                    @endforeach
                </div>
            </div>

        </li>

    </ul>

</div>
