<div>
    <div class="navbar" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @foreach ($list_menu as $row_menu)
                <li class="nav-item">
                    <x-sub-menu-footer :rowmenu="$row_menu" />
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- <div class="footer-menu">
    @foreach ($menus as $menu)
        <div>
            <h4 class="text-white font-bold text-lg">{{ $menu->name }}</h4>
            @if ($menu->children && $menu->children->count())
                <x-sub-menu-footer :menuitem="$menu" />
            @endif
        </div>
    @endforeach
</div> --}}
