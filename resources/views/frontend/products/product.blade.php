<x-layout-site>
    <x-slot:title>
        Sản phẩm
    </x-slot:title>

    <div>
        <div class="py-10">
            <!-- Header Section -->
            <div class="relative shadow-lg w-full h-40" style="bottom:40px;">
                <img class="w-full h-full object-cover" src="https://bizweb.dktcdn.net/100/350/980/themes/939145/assets/slider_1.jpg?1706077983929" alt="Header Image">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="container mx-auto">
                <h1 class="text-center text-white text-4xl font-bold relative" style="bottom:150px;">Cửa hàng</h1>
            </div>
        </div>

        <!-- Product Section -->
        <section class="container mx-auto my-6 px-4 relative" style="bottom: 100px;">
            <div class="flex items-center justify-between mb-8">
                <!-- Bộ lọc sản phẩm -->
                <form method="GET" action="{{ route('frontend.products.product') }}" class="flex space-x-4">
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Danh mục:</span>
                        <select name="category_id" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                            <option value="all">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                
              <!-- Sắp xếp -->
                <label class="flex items-center space-x-2">
                    <span class="font-semibold">Sắp xếp:</span>
                    <select name="sort_by" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                        <option value="price-asc" {{ request('sort_by') == 'price-asc' ? 'selected' : '' }}>Giá (Thấp đến Cao)</option>
                        <option value="price-desc" {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}>Giá (Cao đến Thấp)</option>
                        <option value="name-asc" {{ request('sort_by') == 'name-asc' ? 'selected' : '' }}>Tên (A-Z)</option>
                    </select>
                </label>

                <!-- Lọc theo giá -->
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
                
                <label class="flex items-center space-x-2">
                    <span class="font-semibold">Hiển thị:</span>
                    <select name="view_mode" class="border border-gray-300 rounded p-2" onchange="this.form.submit()">
                        <option value="grid" {{ request('view_mode') == 'grid' ? 'selected' : '' }}>Lưới</option>
                        <option value="list" {{ request('view_mode') == 'list' ? 'selected' : '' }}>Danh sách</option>
                    </select>
                </label>
                </form>
                
            </div>
            <!-- Danh sách sản phẩm -->

 <!-- Danh sách sản phẩm -->
 <div id="product-list">
    @if ($products->isEmpty())
        <!-- Thông báo không có sản phẩm -->
        <div class="text-center py-10">
            <h2 class="text-xl font-bold text-gray-700">Không có sản phẩm phù hợp với bộ lọc</h2>
            <p class="text-gray-500 mt-4">Hãy thử thay đổi bộ lọc để tìm sản phẩm bạn mong muốn.</p>
        </div>
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

        </section>
    </div>
</x-layout-site>


{{-- 
<x-layout-site>
    <x-slot:title>
        Sản phẩm
    </x-slot:title>
    <div>
        <body>
            <!-- Single Page Header start -->
            <div class="py-10">
                <div class="relative shadow-lg w-full h-40" style="bottom:40px;">
                    <img
                        class="w-full h-full object-cover"
                        src="https://bizweb.dktcdn.net/100/350/980/themes/939145/assets/slider_1.jpg?1706077983929"
                        alt="Header Image">
                    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                </div>
                <div class="container mx-auto">
                    <h1 class="text-center text-white text-4xl font-bold relative" style="bottom:150px;">Cửa hàng</h1>
        
                </div>
        
            </div>
        
            <!-- Product Section -->
            <!-- Product Section -->
            <section class="container mx-auto my-6 px-4 relative" style="bottom: 100px;">
                <div class="flex items-center justify-between mb-8">
                    <!-- Bộ lọc sản phẩm -->
                    <div class="flex space-x-4">
                        <label class="flex items-center space-x-2">
                            <span class="font-semibold">Danh mục:</span>
                            <select class="border border-gray-300 rounded p-2">
                                <option value="all">Tất cả</option>
                                <option value="">Rau hữu cơ</option>
                                <option value="">Trái cây</option>
                                <option value="">Bánh mì</option>
                                <option value="">Thịt</option>
                            </select>
                        </label>
                        <label class="flex items-center space-x-2">
                            <span class="font-semibold">Thương hiệu:</span>
                            <select class="border border-gray-300 rounded p-2">
                                <option value="all">Tất cả</option>
                                <option value="">Việt Nam</option>
                                <option value="">Mỹ</option>
                                <option value="">Pháp</option>
                                <option value="">Hàn Quốc</option>
                            </select>
                        </label>
                        <!-- Sắp xếp sản phẩm -->
                        <label class="flex items-center space-x-2">
                            <span class="font-semibold">Sắp xếp:</span>
                            <select class="border border-gray-300 rounded p-2">
                                <option value="price-asc">Giá (Thấp đến Cao)</option>
                                <option value="price-desc">Giá (Cao đến Thấp)</option>
                                <option value="name-asc">Tên (A-Z)</option>
                            </select>
                        </label>
                        <!-- Chọn giá theo khoảng cố định -->
                        <label class="flex items-center space-x-2">
                            <span class="font-semibold">Giá:</span>
                            <select class="border border-gray-300 rounded p-2">
                                <option value="all">Tất cả</option>
                                <option value="0-100000">Dưới 100,000 VND</option>
                                <option value="100000-500000">100,000 VND - 500,000 VND</option>
                                <option value="500000-1000000">500,000 VND - 1,000,000 VND</option>
                                <option value="1000000">Trên 1,000,000 VND</option>
                            </select>
                        </label>
                    </div>
        
                    <!-- Kiểu hiển thị (List / Grid) -->
                    <div class="space-x-2">
                        <button onclick="setView('list')" class="bg-gray-200 p-2 rounded hover:bg-lime-500 hover:text-white">List View</button>
                        <button onclick="setView('grid')" class="bg-gray-200 p-2 rounded hover:bg-lime-500 hover:text-white">Grid View</button>
                    </div>
                </div>
        
                <!-- Danh sách sản phẩm -->
                <div id="product-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                    <a href="san-pham/slug" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="./img/fruite-item-1.jpg" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                Fruits
                            </div>
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">Banana</h4>
                            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="./img/fruite-item-1.jpg" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                Fruits
                            </div>
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">Banana</h4>
                            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="./img/fruite-item-1.jpg" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                Fruits
                            </div>
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">Banana</h4>
                            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="./img/fruite-item-1.jpg" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                Fruits
                            </div>
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">Banana</h4>
                            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="./img/fruite-item-1.jpg" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                Fruits
                            </div>
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">Banana</h4>
                            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="./img/fruite-item-1.jpg" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                Fruits
                            </div>
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">Banana</h4>
                            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                    <!-- Thêm các product card khác -->
                </div>
                <div class="w-full">
                    <div class="pagination flex justify-center mt-5 space-x-2">
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">&laquo;</a>
                        <a href="#" class="px-3 py-1 text-white bg-lime-500 rounded hover:bg-orange-500 active">1</a>
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">2</a>
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">3</a>
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">4</a>
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">5</a>
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">6</a>
                        <a href="#" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">&raquo;</a>
                    </div>
                </div>
        
            </section>
        
            
        
        </body>
        <script>
            function setView(view) {
                const productList = document.getElementById('product-list');
                productList.className = view === 'list' ? 'grid grid-cols-2 gap-6' : 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6';
            }
        </script>
    </div>
</x-layout-site> --}}