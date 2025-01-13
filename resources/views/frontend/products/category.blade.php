<x-layout-site>
    <x-slot:title>
        {{ $category->name }}
    </x-slot:title>

    <section class="container mx-auto my-6 px-4">
        <!-- Tiêu đề danh mục -->
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            {{ $category->name }}
        </h1>

        <!-- Danh mục con -->
        @if ($subcategories->count())
            <div class="mb-6">
                <ul class="flex flex-wrap gap-4">
                    @foreach ($subcategories as $subcategory)
                        <a href="{{ route('site-category', $subcategory->slug) }}"
                           class="py-2 px-4 bg-gray-200 rounded-full text-gray-700 hover:text-white hover:bg-orange-500 transition">
                            {{ $subcategory->name }}
                        </a>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Bộ lọc và điều khiển -->
        <div class="mb-6 flex justify-between items-center">
            <!-- Bộ lọc sắp xếp -->
            <div>
                <label for="sort" class="mr-2 font-semibold">Sắp xếp theo:</label>
                <select id="sort" name="sort" class="border border-gray-300 rounded p-2"
                        onchange="window.location = this.value">
                    <option value="{{ route('site-category', ['slug' => $category->slug, 'sort' => 'newest']) }}"
                        {{ $sort === 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="{{ route('site-category', ['slug' => $category->slug, 'sort' => 'price_asc']) }}"
                        {{ $sort === 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="{{ route('site-category', ['slug' => $category->slug, 'sort' => 'price_desc']) }}"
                        {{ $sort === 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                </select>
            </div>
        </div>

        <!-- Hiển thị sản phẩm -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <x-product-card :productitem="$product" />
            @empty
                <p class="col-span-full text-center text-gray-500">
                    Không có sản phẩm nào trong danh mục này.
                </p>
            @endforelse
        </div>

        <!-- Phân trang -->
        @if ($products->hasPages())
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        @endif
    </section>
</x-layout-site>
