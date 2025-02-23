<x-layout-site>
    <form action="{{ route('site.checkout') }}" method="POST" class="space-y-8 bg-white shadow-lg p-8 rounded-lg max-w-4xl mx-auto">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Thông Tin Thanh Toán</h2>

         <!-- Lấy thông tin user đăng nhập -->
         @php
         $user = Auth::user();
     @endphp

     <!-- Thông Tin Khách Hàng -->
     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
         <div>
             <label for="fullname" class="block text-lg font-medium text-gray-700">Họ và Tên</label>
             <input type="text" id="fullname" name="fullname" required
                 value="{{ $user->fullname ?? '' }}"
                 class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
         </div>
         <div>
            <label for="name" class="block text-lg font-medium text-gray-700">Tên Đăng nhập</label>
            <input type="text" id="name" name="name" required
                value="{{ $user->name ?? '' }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
         <div>
             <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
             <input type="email" id="email" name="email" required
                 value="{{ $user->email ?? '' }}"
                 class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
         </div>
     </div>

     <div>
         <label for="address" class="block text-lg font-medium text-gray-700">Địa Chỉ</label>
         <input type="text" id="address" name="address" required
             value="{{ $user->address ?? '' }}"
             class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
     </div>

     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
         <div>
             <label for="phone" class="block text-lg font-medium text-gray-700">Số Điện Thoại</label>
             <input type="text" id="phone" name="phone" required
                 value="{{ $user->phone ?? '' }}"
                 class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
         </div>
         <div>
             <label for="paymentMethod" class="block text-lg font-medium text-gray-700">Phương Thức Thanh Toán</label>
             <select id="paymentMethod" name="paymentMethod" required class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                 <option value="creditCard">Thẻ Tín Dụng</option>
                 <option value="paypal">PayPal</option>
                 <option value="cash">Thanh Toán Khi Nhận Hàng</option>
             </select>
         </div>
     </div>


        <!-- Thông Tin Đơn Hàng -->
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Thông Tin Đơn Hàng</h3>
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-lg font-medium text-gray-600">Sản Phẩm</span>
                <span class="text-lg font-medium text-gray-600">{{ number_format($totalPrice=$total *1000, 0, ',', '.') }} VND</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-lg font-medium text-gray-600">Phí Vận Chuyển</span>
                <span class="text-lg font-medium text-gray-600">50,000 VND</span>
            </div>
            <div class="flex justify-between items-center border-t pt-4">
                <span class="text-xl font-bold text-gray-800">Tổng Tiền</span>
                <span class="text-xl font-bold text-blue-600">{{ number_format($totalPrice + 50000, 0, ',', '.') }} VND</span>
            </div>
        </div>

        <!-- Nút Thanh Toán -->
        <div class="mt-8 text-center">
            <button type="submit" class="bg-green-600 text-white py-3 px-8 rounded-lg hover:bg-green-700 transition duration-300">
                Thanh Toán
            </button>
        </div>
    </form>
</x-layout-site>
