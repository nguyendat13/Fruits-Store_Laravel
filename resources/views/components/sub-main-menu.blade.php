@if (count($menus) > 0)
    <li class="relative group">
        <a class=" text-white inline-block px-3 p-3 hover:text-lime-500 transition duration-300" href="{{ url($menu->link) }}">
            {{ $menu->name }}
        </a>
        <ul class="transition-all duration-700 ease-in-out absolute invisible opacity-0 group-hover:visible group-hover:opacity-100 mt-[25px] w-[150px]">
            @foreach ($menus as $item)
                <li class="group">
                    <a class="text-white bg-gray-400 block p-3 " href="{{ url($item->link) }}">
                        <i class="hover:text-lime-500 ">{{ $item->name }}</i>
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
@else
    <li class="relative group">
        <a class="text-white inline-block px-3 p-3 hover:text-lime-500 transition duration-300" href="{{ url($menu->link) }}">
            {{ $menu->name }}
        </a>
    </li>
@endif
