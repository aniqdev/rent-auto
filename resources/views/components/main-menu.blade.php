{{-- <button class="menuToggle d-md-none" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Zobrazit nabídku">
    <i class="icofont-navigation-menu"></i>
    <span>Nabídka</span>
</button> --}}
<ul class="menu" id="navbarMenu">

    @foreach($items as $item)
        <li class="menu-item">
            <a href="@if(empty($item->item)) {{ route($item->route) }} @else {{ route($item->route, $item->item) }} @endif" class="menu-link @if(!empty($item->class)) {{ $item->class }} @endif {{ $isRoute($item->active) }}" title="{{ $item->name }}">
                {{ $item->name }}
            </a>
        </li>
    @endforeach
</ul>
