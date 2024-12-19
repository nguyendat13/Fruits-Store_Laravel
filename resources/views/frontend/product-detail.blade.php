

<x-layout-site>
    <x-slot:title>
        Chi tiết sản phẩm
    </x-slot:title>
    <div>
    <!-- Product Info -->
    <section class="my-8">
        <div class="container mx-auto flex flex-col md:flex-row items-start px-4">
            <!-- Product Image -->
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg">
                <img src="./img/fruite-item-1.jpg" alt="Product Image" class="rounded-lg object-cover">
            </div>
            <!-- Product Details -->
            <div class="w-full md:w-1/2 md:ml-8 mt-6 md:mt-0">
                <h2 class="text-3xl text-gray-600 font-bold mb-4">Tên Sản Phẩm</h2>
                <p class="text-2xl font-semibold mb-4">Giá: 1,000,000₫</p>
                <p class="text-gray-600 mb-6">Mô tả ngắn gọn về sản phẩm. Giới thiệu sơ qua về các tính năng nổi bật và các thông tin cần thiết.</p>
                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="my-8">
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold mb-4">Chi tiết sản phẩm</h3>
            <p class="text-gray-700">Đây là phần chi tiết của sản phẩm. Bao gồm thông tin đầy đủ về sản phẩm như kích thước, chất liệu, bảo hành, và hướng dẫn sử dụng.</p>
        </div>
    </section>

    <!-- Product Same Category -->
    <section class="my-12">
        <div class="container mx-auto">
            <h3 class="text-2xl font-bold text-center text-gray-600 mb-6">Sản phẩm khác</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Product Card -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 text-center">
                    <img src="./img/fruite-item-1.jpg" alt="Product 1" class="h-40 w-full object-cover rounded-md mb-4">
                    <h4 class="font-semibold text-lg mb-2">Sản phẩm 1</h4>
                    <p class="text-blue-600 font-bold mb-2">500,000₫</p>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Xem chi tiết</button>
                </div>
                <!-- Repeat Product Card for each item -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 text-center">
                    <img src="./img/fruite-item-1.jpg" alt="Product 2" class="h-40 w-full object-cover rounded-md mb-4">
                    <h4 class="font-semibold text-lg mb-2">Sản phẩm 2</h4>
                    <p class="text-blue-600 font-bold mb-2">600,000₫</p>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Xem chi tiết</button>
                </div>
                <!-- Add more product cards as needed -->
            </div>
        </div>
    </section>
    </div>
</x-layout-site>