<ul class="space-y-2">
    @foreach ($subMenus as $item)
        <li>
            <a href="{{ $item->link }}" class="hover:text-lime-500 transition duration-200">
                {{ $item->name }}
            </a>
        </li>
    @endforeach
</ul>
