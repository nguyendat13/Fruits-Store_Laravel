<x-layout-site>
    <x-slot:title>
        Tìm kiếm sản phẩm
    </x-slot:title>

    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-4">Kết quả tìm kiếm cho: "{{ $keyword }}"</h1>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <div class="border rounded-lg shadow-lg p-4">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md">
                        <h2 class="text-lg font-bold mt-2">{{ $product->name }}</h2>
                        <p class="text-gray-600 mt-1">{{ Str::limit($product->description, 100) }}</p>
                        <p class="text-blue-500 font-bold mt-2">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <a href="{{ route('frontend.products.product-detail', $product->id) }}" class="block text-center bg-blue-600 text-white py-2 mt-3 rounded-lg hover:bg-blue-700 transition duration-300">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $products->links() }} <!-- Hiển thị phân trang -->
            </div>
        @else
            <p class="text-gray-600">Không tìm thấy sản phẩm nào phù hợp.</p>
        @endif
    </div>
</x-layout-site>
