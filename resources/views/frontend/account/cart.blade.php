
<x-layout-site>
    <x-slot:title>
        Giỏ hàng
    </x-slot:title>
    <div>
      <!-- Giỏ Hàng -->
      <div class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Sản Phẩm Trong Giỏ Hàng</h2>

        <div id="cartItems" class="flex flex-col space-y-4">
            <!-- Sản phẩm 1 -->
            <div class="cart-item flex justify-between items-center" data-id="1">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/100" alt="Product Image" class="w-24 h-24 object-cover rounded">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold">Sản phẩm 1</h3>
                        <p class="text-gray-600">Số lượng: <span class="quantity">1</span></p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-xl font-bold price">500,000 VND</div>
                    <button class="text-blue-500 hover:text-blue-700 change-quantity" data-action="decrease">-</button>

                    <!-- Thêm ô nhập số lượng chính giữa -->
                    <input type="number" class="quantity-input w-16 text-center border rounded-md mx-2" value="1" min="1">

                    <button class="text-blue-500 hover:text-blue-700 change-quantity" data-action="increase">+</button>
                </div>
            </div>

            <!-- Sản phẩm 2 -->
            <div class="cart-item flex justify-between items-center" data-id="2">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/100" alt="Product Image" class="w-24 h-24 object-cover rounded">
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold">Sản phẩm 2</h3>
                        <p class="text-gray-600">Số lượng: <span class="quantity">2</span></p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-xl font-bold price">1,000,000 VND</div>
                    <button class="text-blue-500 hover:text-blue-700 change-quantity" data-action="decrease">-</button>

                    <!-- Thêm ô nhập số lượng chính giữa -->
                    <input type="number" class="quantity-input w-16 text-center border rounded-md mx-2" value="2" min="1">

                    <button class="text-blue-500 hover:text-blue-700 change-quantity" data-action="increase">+</button>
                </div>
            </div>
        </div>

        <!-- Tổng cộng -->
        <div class="mt-6 flex justify-between items-center">
            <div class="text-lg font-bold">Tổng cộng:</div>
            <div id="totalPrice" class="text-xl font-bold text-blue-600">1,500,000 VND</div>
        </div>

        <!-- Nút Thanh toán -->
        <div class="mt-6 mb-5 text-center">
            <a href="/public/thanh-toan" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                Tiến Hành Thanh Toán
            </a>
        </div>
    </div>
    </div>
</x-layout-site>