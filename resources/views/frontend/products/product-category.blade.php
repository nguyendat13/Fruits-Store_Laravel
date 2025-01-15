<x-layout-site>
    <x-slot:title>
        Sản phẩm theo danh mục
    </x-slot:title>

    <div>
        <div class="py-10">
            <!-- Header -->
            <div class="relative shadow-lg w-full h-40" style="bottom:40px;">
                <img class="w-full h-full object-cover" src="https://bizweb.dktcdn.net/100/350/980/themes/939145/assets/slider_1.jpg?1706077983929" alt="Header Image">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="container mx-auto">
                <h1 class="text-center text-white text-4xl font-bold relative" style="bottom:150px;">Sản phẩm theo danh mục</h1>
            </div>
        </div>

        <div class="container mx-auto my-6 px-4">
            <div class="flex space-x-6">
                <!-- Sidebar -->
                <aside class="w-1/4 bg-gray-100 p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold mb-4">Danh mục</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('site.product-category', ['category_id' => 'all']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded {{ request('category_id') == 'all' ? 'bg-gray-300 font-bold' : '' }}">
                                Tất cả
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('site.product-category', ['category_id' => $category->id]) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded {{ request('category_id') == $category->id ? 'bg-gray-300 font-bold' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>

                <!-- Danh sách sản phẩm -->
                <div class="w-3/4">
                    <!-- Bộ lọc sản phẩm -->
                    <div class="flex items-center justify-between mb-8">
                        <form method="GET" action="{{ route('site.product-category') }}" class="flex space-x-4">
                            <!-- Sắp xếp -->
                            <label class="flex items-center space-x-2">
                                <span class="font-semibold">Sắp xếp:</span>
                                <select name="sort_by" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                                    <option value="price-asc" {{ request('sort_by') == 'price-asc' ? 'selected' : '' }}>Giá (Thấp đến Cao)</option>
                                    <option value="price-desc" {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}>Giá (Cao đến Thấp)</option>
                                    <option value="name-asc" {{ request('sort_by') == 'name-asc' ? 'selected' : '' }}>Tên (A-Z)</option>
                                </select>
                            </label>

                            <!-- Lọc giá -->
                            <label class="flex items-center space-x-2">
                                <span class="font-semibold">Giá:</span>
                                <select name="price_buy" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                                    <option value="all" {{ request('price_buy') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                    <option value="0-100" {{ request('price_buy') == '0-100' ? 'selected' : '' }}>Dưới 100,000 VND</option>
                                    <option value="100-500" {{ request('price_buy') == '100-500' ? 'selected' : '' }}>100,000 VND - 500,000 VND</option>
                                    <option value="500-1000" {{ request('price_buy') == '500-10000' ? 'selected' : '' }}>500,000 VND - 1,000,000 VND</option>
                                    <option value="1000" {{ request('price_buy') == '1000' ? 'selected' : '' }}>Trên 1,000,000 VND</option>
                                </select>
                            </label>
                        
                           <!-- Chế độ hiển thị -->
                            <label class="flex items-center space-x-2">
                                <span class="font-semibold">Hiển thị:</span>
                                <select name="view_mode" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                                    <option value="grid" {{ request('view_mode') == 'grid' ? 'selected' : '' }}>Lưới</option>
                                    <option value="list" {{ request('view_mode') == 'list' ? 'selected' : '' }}>Danh sách</option>
                                </select>
                            </label>
                        </form>
                    </div>

                    <!-- Hiển thị sản phẩm -->
                    <div id="product-list">
                        @if ($products->isEmpty())
                            <p class="text-center text-gray-500">Không có sản phẩm nào phù hợp.</p>
                        @else
                        @if (request('view_mode') == 'list')
                        <!-- Chế độ hiển thị danh sách -->
                        
                        <div class="space-y-6">
                            @foreach ($products as $productitem)
                                <div class="flex items-center space-x-4 p-4 border rounded-lg hover:shadow-md">
                                    <x-product-card :productitem="$productitem" />
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Chế độ hiển thị lưới -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($products as $productitem)
                                <div class="border rounded-lg p-4 hover:shadow-md">
                                    <x-product-card :productitem="$productitem" />
                                </div>
                            @endforeach
                        </div>
                    @endif
                        @endif
                    </div>
        
                    <!-- Pagination -->
                    <div class="w-full mt-6">
                        <div class="pagination flex justify-center space-x-2">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-site>
