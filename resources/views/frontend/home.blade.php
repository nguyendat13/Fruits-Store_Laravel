
<x-layout-site>
    <x-slot:title>
        Trang chủ
    </x-slot:title>
    <div>
        @include('frontend.slide')
        <div class="container mx-auto relative bottom-[100px]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <!-- Free Shipping -->
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-truck text-blue-500 text-4xl"></i>
    
                    <p class="text-xl font-semibold mt-4">Giao hàng miễn phí</p>
                    <p class="text-sm text-gray-500">Miễn phí cho đơn đặt hàng trên $300</p>
                </div>
                <!-- Security Payment -->
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-lock text-green-500 text-4xl"></i>
                    <p class="text-xl font-semibold mt-4">Thanh toán bảo đảm</p>
                    <p class="text-sm text-gray-500">Thanh toán bảo mật 100%</p>
                </div>
                <!-- 30 Day Return -->
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-undo text-red-500 text-4xl"></i>
                    <p class="text-xl font-semibold mt-4">Trả hàng trong 30 ngày</p>
                    <p class="text-sm text-gray-500">Đảm bảo hoàn tiền trong 30 ngày</p>
                </div>
                <!-- 24/7 Support -->
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-headset text-yellow-500 text-4xl"></i>
                    <p class="text-xl font-semibold mt-4">Hỗ trợ 24/7</p>
                    <p class="text-sm text-gray-500">Hỗ trợ mọi lúc</p>
                </div>
            </div>
        </div>
    
        <!-- Product Categories -->
        <section class="py-12 my-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row md:justify-between items-center mb-8 mt-[30px]">
                    <h1 class="text-4xl font-bold text-gray-500 relative" style="left:40px;">Sản Phẩm Hữu Cơ<br> Của Chúng Tôi</h1>
                    <ul class="flex space-x-4 relative " style="right:40px;">
                        <li>
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
                        </li>
                    </ul>
                </div>
                <div class="container mx-auto relative" style="left:5px;">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <a href="/public/san-pham/slug" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
                            <div class="relative">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
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
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
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
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
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
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
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
                    </div>
    
                </div>
    
            </div>
        </section>
        <!-- Sale Products -->
    
        <div class="container mx-auto py-10 relative" style="width:80%;">
            <h2 class="text-3xl font-bold text-center text-gray-500 mb-8">Sản phẩm giảm giá</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 justify-center">
                <!-- Card 1 -->
                <div class="max-w-sm">
                    <a href="#">
                        <div class="bg-orange-500 rounded-lg border border-orange-500 overflow-hidden">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/12817-851501657688267-1657688267.jpg?v=1713175181177" class="w-full rounded-t-lg" alt="">
                            <div class="px-4 py-4 ">
                                <div class="bg-lime-500 text-center p-4 rounded-lg relative" style="bottom:50px;">
                                    <h5 class="text-white text-lg font-bold">Fresh Apples</h5>
                                    <h3 class="text-white text-2xl font-extrabold">20% OFF</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
    
                <!-- Card 2 -->
                <div class="max-w-sm">
                    <a href="#">
                        <div class="bg-gray-900 rounded-lg border border-gray-800 overflow-hidden">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/chuoi-xiem-huu-co.jpg?v=1713169903643" class="w-full rounded-t-lg" alt="">
                            <div class="px-4 py-4">
                                <div class="bg-gray-100 text-center p-4 rounded-lg relative" style="bottom:50px;">
                                    <h5 class="text-lime-500 text-lg font-bold">Tasty Fruits</h5>
                                    <h3 class="text-gray-900 text-2xl ">Free delivery</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
    
                <!-- Card 3 -->
                <div class="max-w-sm">
                    <a href="#">
                        <div class="bg-lime-500 rounded-lg border border-lime-500 overflow-hidden">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/ngo-ri.jpg?v=1712912315410" class="w-full rounded-t-lg" alt="">
                            <div class="px-4 py-4 ">
                                <div class="bg-orange-500 text-center p-4 rounded-lg relative" style="bottom:50px;">
                                    <h5 class="text-white text-lg font-bold">Exotic Vegitable</h5>
                                    <h3 class="text-white text-2xl font-extrabold">Discount 30$</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 py-10">
            <div class="container mx-auto py-10 ">
                <h1 class="text-center text-4xl text-gray-500 font-bold mb-8 mt-[100px]">Rau hữu cơ tươi</h1>
                <div class="flex gap-6 overflow-x-auto justify-center">
                    <!-- Vegetable Card Start -->
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-6.jpg" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Vegetable Card End -->
    
                    <!-- Repeat for other cards -->
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-1.jpg" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Add more cards as needed -->
                </div>
            </div>
        </div>
    
        <!-- New Products -->
        <section class="my-12">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-500 mb-8">Sản phẩm mới</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>
    
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
    
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>
    
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
    
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>
    
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
    
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                        <div class="overflow-hidden rounded-t">
                            <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                        </div>
                        <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                        <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>
    
                        <div class="p-4 bg-white rounded-b">
                            <h4 class="text-lg font-semibold">Parsely</h4>
    
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </section>
    
        <!-- Latest Posts -->
        <div class="bg-gray-50 py-10">
            <div class="container mx-auto">
                <h1 class="text-center text-4xl font-bold mb-10">Bài viết mới nhất</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Article Card -->
                    <div class="border border-gray-200 rounded shadow-md overflow-hidden">
                        <img src="https://bizweb.dktcdn.net/100/514/629/articles/cong-dung-gao-lut.jpg?v=1713603020620" class="w-full h-48 object-cover" alt="Article Image">
                        <div class="p-4 bg-white">
                            <h4 class="text-xl font-semibold">Lợi ích của rau hữu cơ</h4>
                            <p class="text-gray-600 text-sm mt-2">Khám phá cách rau hữu cơ có thể cải thiện sức khỏe và lối sống của bạn ...
                            </p>
                            <a href="#" class="text-blue-500 mt-4 inline-block hover:underline">Đọc thêm</a>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded shadow-md overflow-hidden">
                        <img src="https://bizweb.dktcdn.net/100/514/629/articles/lam-salad-tu-dua-chuot-new.jpg?v=1713602707877" class="w-full h-48 object-cover" alt="Article Image">
                        <div class="p-4 bg-white">
                            <h4 class="text-xl font-semibold">Lợi ích của rau hữu cơ</h4>
                            <p class="text-gray-600 text-sm mt-2">Khám phá cách rau hữu cơ có thể cải thiện sức khỏe và lối sống của bạn ...
                            </p>
                            <a href="#" class="text-blue-500 mt-4 inline-block hover:underline">Đọc thêm</a>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded shadow-md overflow-hidden">
                        <img src="https://bizweb.dktcdn.net/100/514/629/articles/cong-dung-cua-toi-mat-ong.jpg?v=1713601627563" class="w-full h-48 object-cover" alt="Article Image">
                        <div class="p-4 bg-white">
                            <h4 class="text-xl font-semibold">Lợi ích của rau hữu cơ</h4>
                            <p class="text-gray-600 text-sm mt-2">Khám phá cách rau hữu cơ có thể cải thiện sức khỏe và lối sống của bạn ...
                            </p>
                            <a href="#" class="text-blue-500 mt-4 inline-block hover:underline">Đọc thêm</a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
        <div class="fixed bottom-0 left-0 w-full bg-green-600 text-white text-center py-3 shadow-lg z-50">
            <p class="text-lg">Thông báo: Chúng tôi đang có chương trình khuyến mãi! Hãy kiểm tra ngay!</p>
            <button onclick="closeNotification()" class="absolute top-0 right-0 m-4 text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
    
        <script>
            function closeNotification() {
                document.querySelector('.fixed').style.display = 'none';
            }
        </script>
    
    </div>
</x-layout-site>