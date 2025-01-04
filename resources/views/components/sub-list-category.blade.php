@if ($category_list != null)
    @foreach ($category_list as $item)
        <li>
            <a href="{{ route('frontend.product', ['slug' => $item->slug]) }}" 
               class="py-2 px-6 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">
                {{ $item->name }}
            </a>
        </li>
    @endforeach
@endif

{{-- <li>
    <a href="#tab-1" class="py-2 px-6 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">Tất cả sản phẩm</a>
</li>
<li>
    <a href="#tab-2" class="py-2 px-6 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">Rau</a>
</li>
<li>
    <a href="#tab-3" class="py-2 px-6 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">Trái cây</a>
</li>
<li>
    <a href="#tab-4" class="py-2 px-6 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">Bánh mì</a>
</li>
<li>
    <a href="#tab-5" class="py-2 px-6 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">Thịt</a>
</li> --}}