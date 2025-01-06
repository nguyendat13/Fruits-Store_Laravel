<ul class="flex space-x-4">
    @foreach ($categorys as $categoryitem)
        <li>
            <a href="{{ route('frontend.category', ['slug' => $categoryitem->slug]) }}"
               class="py-2 px-4 bg-gray-200 text-gray-700 rounded-full hover:bg-orange-500 hover:text-white transition">
                {{ $categoryitem->name }}
            </a>
        </li>
    @endforeach
</ul>
