
<x-layout-site>
    <x-slot:title>
        Đơn hàng
    </x-slot:title>
    <div>
        <div class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Danh Sách Đơn Hàng</h2>
    
            <div class="space-y-6">
                <!-- Đơn hàng 1 -->
                <div class="order-item flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4">
                        <div>
                            <h3 class="text-xl font-semibold">Đơn Hàng #12345</h3>
                            <p class="text-gray-600">Ngày: 2024-12-01</p>
                            <p class="text-gray-600">Trạng thái: <span class="text-green-600">Đã giao</span></p>
                        </div>
                    </div>
                    <div class="text-xl font-bold text-blue-600">
                        1,500,000 VND
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Xem chi tiết
                    </button>
                </div>
    
                <!-- Đơn hàng 2 -->
                <div class="order-item flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4">
                        <div>
                            <h3 class="text-xl font-semibold">Đơn Hàng #12346</h3>
                            <p class="text-gray-600">Ngày: 2024-12-05</p>
                            <p class="text-gray-600">Trạng thái: <span class="text-yellow-600">Đang xử lý</span></p>
                        </div>
                    </div>
                    <div class="text-xl font-bold text-blue-600">
                        800,000 VND
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Xem chi tiết
                    </button>
                </div>
    
                <!-- Đơn hàng 3 -->
                <div class="order-item flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4">
                        <div>
                            <h3 class="text-xl font-semibold">Đơn Hàng #12347</h3>
                            <p class="text-gray-600">Ngày: 2024-12-10</p>
                            <p class="text-gray-600">Trạng thái: <span class="text-red-600">Đã hủy</span></p>
                        </div>
                    </div>
                    <div class="text-xl font-bold text-blue-600">
                        1,200,000 VND
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Xem chi tiết
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout-site>