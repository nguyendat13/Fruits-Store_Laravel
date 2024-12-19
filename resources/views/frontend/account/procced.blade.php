
<x-layout-site>
    <x-slot:title>
        Tiến hành thanh toán
    </x-slot:title>
    <div>
        <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Thông Tin Thanh Toán</h2>
    
            <!-- Thông Tin Người Mua -->
            <form action="#" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">Họ và Tên</label>
                        <input type="text" id="name" name="name" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="email" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>
    
                <div>
                    <label for="address" class="block text-gray-700 font-medium">Địa Chỉ</label>
                    <input type="text" id="address" name="address" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="block text-gray-700 font-medium">Số Điện Thoại</label>
                        <input type="text" id="phone" name="phone" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label for="paymentMethod" class="block text-gray-700 font-medium">Phương Thức Thanh Toán</label>
                        <select id="paymentMethod" name="paymentMethod" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                            <option value="creditCard">Thẻ Tín Dụng</option>
                            <option value="paypal">PayPal</option>
                            <option value="cash">Thanh Toán Khi Nhận Hàng</option>
                        </select>
                    </div>
                </div>
    
                <!-- Thông Tin Đơn Hàng -->
                <h3 class="text-xl font-semibold mb-4">Thông Tin Đơn Hàng</h3>
                <div class="flex justify-between items-center border-t pt-4">
                    <span class="text-lg font-semibold">Sản Phẩm</span>
                    <span class="text-lg font-semibold">1,500,000 VND</span>
                </div>
    
                <div class="flex justify-between items-center border-t pt-4">
                    <span class="text-lg font-semibold">Phí Vận Chuyển</span>
                    <span class="text-lg font-semibold">50,000 VND</span>
                </div>
    
                <div class="flex justify-between items-center border-t pt-4">
                    <span class="text-xl font-bold">Tổng Tiền</span>
                    <span class="text-xl font-bold text-blue-600">1,550,000 VND</span>
                </div>
    
                <!-- Nút Thanh Toán -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                        Thanh Toán
                    </button>
                </div>
            </form>
        </div>
    
    </div>
</x-layout-site>