
<ul class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-8">
    <!-- About Us Section -->
    @if (count($list_menu_sub) == 0)
        <li>
            <a href="{{ url($menu->link) }}" class="block text-black hover:text-black font-semibold">
                {{ $menu->name }}
            </a>
        </li>
    @else
        <li class="flex flex-col space-y-2">
            <h3 class="text-black font-bold text-lg">{{ $menu->name }}</h3>
            <ul class="space-y-1">
                @foreach ($list_menu_sub as $item)
                    <li>
                        <a href="{{ url($item->link) }}" class="block text-black hover:text-black">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endif
</ul>
{{-- <ul class="text-gray-400 text-sm mt-2 space-y-1">
    @foreach ($menus as $submenu)
        <li>
            <a href="{{ url($submenu->link) }}" class="hover:text-lime-500">
                {{ $submenu->name }}
            </a>
        </li>
    @endforeach
</ul> --}}