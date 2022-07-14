<header class="header">
    {{-- class="header" --}}
    {{-- <div class="logo__wrapper">
        <a href="{{ $home_route }}" class="logo__link" title="www.topobytnevozy.cz">
            <x-logo-bright />
        </a>
    </div>

    <div class="nav__wrapper">
        <div class="top-nav">
            <x-top-menu />
        </div>
        <div class="bottom-nav">
            <x-main-menu :items="$main_menu_items" />
        </div>
    </div> --}}







        <div class=" logo__wrapper">
            <a href="{{ $home_route }}" class="logo__link" title="www.topobytnevozy.cz">
                <x-logo-bright />
            </a>
        </div>

        <div class=" nav__wrapper">
            <div class="top-nav">
                <x-top-menu />
            </div>
            <div class="bottom-nav">
                <x-main-menu :items="$main_menu_items" />
            </div>
        </div>


</header>
