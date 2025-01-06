
<x-layout-site>
    <x-slot:title>
        Trang chủ
    </x-slot:title>
    <div>
        <x-slide-show/>
        <div class="container ">
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
            <x-home-list-category/>
        <!-- Sale Products -->
        <x-product-sale :products="$products" />
        
            {{-- <div class="bg-gray-50 py-10">
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
            </div> --}}
    
        <!-- New Products -->
        <x-product-new/>
        <!-- Latest Posts -->
        <x-post-new/>
    
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