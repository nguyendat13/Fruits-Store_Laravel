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
                <form method="GET" action="{{ route('frontend.product') }}" class="flex space-x-4">
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Danh mục:</span>
                        <select name="category_id" class="border border-gray-300 rounded p-2">
                            <option value="all">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Thương hiệu:</span>
                        <select name="brand" class="border border-gray-300 rounded p-2">
                            <option value="all">Tất cả</option>
                            <option value="Việt Nam">Việt Nam</option>
                            <option value="Mỹ">Mỹ</option>
                            <option value="Pháp">Pháp</option>
                            <option value="Hàn Quốc">Hàn Quốc</option>
                        </select>
                    </label>

                    <!-- Sắp xếp sản phẩm -->
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Sắp xếp:</span>
                        <select name="sort_by" class="border border-gray-300 rounded p-2">
                            <option value="price-asc">Giá (Thấp đến Cao)</option>
                            <option value="price-desc">Giá (Cao đến Thấp)</option>
                            <option value="name-asc">Tên (A-Z)</option>
                        </select>
                    </label>

                    <!-- Chọn giá theo khoảng cố định -->
                    <label class="flex items-center space-x-2">
                        <span class="font-semibold">Giá:</span>
                        <select name="price" class="border border-gray-300 rounded p-2">
                            <option value="all">Tất cả</option>
                            <option value="0-100000">Dưới 100,000 VND</option>
                            <option value="100000-500000">100,000 VND - 500,000 VND</option>
                            <option value="500000-1000000">500,000 VND - 1,000,000 VND</option>
                            <option value="1000000">Trên 1,000,000 VND</option>
                        </select>
                    </label>

                    <button type="submit" class="bg-gray-200 px-4 py-2 rounded">Lọc</button>
                </form>
            </div>

            <!-- Danh sách sản phẩm -->
            <div id="product-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach ($products as $product)
                    <a href="{{ route('frontend.product-detail', $product->slug) }}" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                        <div class="relative">
                            <img src="{{ asset('images/product/' . $product->thumbnail) }}" alt="{{ $product->name }}" class="rounded-t-lg w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @else
                                    Không có danh mục
                                @endif
                            </div>
                            
                        </div>
                        <div class="p-4 border-t border-yellow-400 ">
                            <h4 class="text-lg font-semibold mb-2">{{ $product->name }}</h4>
                            <p class="text-gray-500 text-sm mb-4">{{ $product->description }}</p>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-800 font-bold">{{ number_format($product->price) }} VND</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="w-full">
                <div class="pagination flex justify-center mt-5 space-x-2">
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