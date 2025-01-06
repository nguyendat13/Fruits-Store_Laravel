<x-layout-site>
    <x-slot:title>
        Tài khoản
    </x-slot:title>
    <div>
        <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Thông Tin Tài Khoản</h2>

            <form action="" method="POST">
                @csrf
                <div class="space-y-6">
                    <!-- Tên người dùng -->
                    <div>
                        <label for="name" class="block text-lg font-medium text-gray-700">Họ và Tên</label>
                        <input type="text" id="name" name="name" 
                            class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="{{ old('name', $user->name) }}">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" 
                            class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="{{ old('email', $user->email) }}">
                    </div>

                    <!-- Số điện thoại -->
                    <div>
                        <label for="phone" class="block text-lg font-medium text-gray-700">Số Điện Thoại</label>
                        <input type="tel" id="phone" name="phone" 
                            class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="{{ old('phone', $user->phone) }}">
                    </div>

                    <!-- Địa chỉ -->
                    <div>
                        <label for="address" class="block text-lg font-medium text-gray-700">Địa Chỉ</label>
                        <input type="text" id="address" name="address" 
                            class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            value="{{ old('address', $user->address) }}">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                        Cập Nhật Thông Tin
                    </button>
                </div>
            </form>

            <!-- Thay đổi mật khẩu -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4">Thay Đổi Mật Khẩu</h3>
                <form action="" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <!-- Mật khẩu cũ -->
                        <div>
                            <label for="oldPassword" class="block text-lg font-medium text-gray-700">Mật Khẩu Cũ</label>
                            <input type="password" id="oldPassword" name="oldPassword" 
                                class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                required>
                        </div>

                        <!-- Mật khẩu mới -->
                        <div>
                            <label for="newPassword" class="block text-lg font-medium text-gray-700">Mật Khẩu Mới</label>
                            <input type="password" id="newPassword" name="newPassword" 
                                class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                required>
                        </div>

                        <!-- Xác nhận mật khẩu mới -->
                        <div>
                            <label for="confirmPassword" class="block text-lg font-medium text-gray-700">Xác Nhận Mật Khẩu Mới</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" 
                                class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                required>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" 
                            class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                            Cập Nhật Mật Khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-site>



{{-- 
<x-layout-site>
    <x-slot:title>
        Trang chủ
    </x-slot:title>
    <div>
        <!-- Nội dung trang tài khoản -->
        <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Thông Tin Tài Khoản</h2>
    
            <form action="/update-profile" method="POST">
                <div class="space-y-6">
                    <!-- Tên người dùng -->
                    <div>
                        <label for="name" class="block text-lg font-medium text-gray-700">Họ và Tên</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="Nguyễn Văn A">
                    </div>
    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="nguyenvana@example.com">
                    </div>
    
                    <!-- Số điện thoại -->
                    <div>
                        <label for="phone" class="block text-lg font-medium text-gray-700">Số Điện Thoại</label>
                        <input type="tel" id="phone" name="phone" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="0123456789">
                    </div>
    
                    <!-- Địa chỉ -->
                    <div>
                        <label for="address" class="block text-lg font-medium text-gray-700">Địa Chỉ</label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="Số 10, Đường ABC, Hà Nội">
                    </div>
                </div>
    
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                        Cập Nhật Thông Tin
                    </button>
                </div>
            </form>
    
            <!-- Thay đổi mật khẩu -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4">Thay Đổi Mật Khẩu</h3>
                <form action="/update-password" method="POST">
                    <div class="space-y-6">
                        <!-- Mật khẩu cũ -->
                        <div>
                            <label for="oldPassword" class="block text-lg font-medium text-gray-700">Mật Khẩu Cũ</label>
                            <input type="password" id="oldPassword" name="oldPassword" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
    
                        <!-- Mật khẩu mới -->
                        <div>
                            <label for="newPassword" class="block text-lg font-medium text-gray-700">Mật Khẩu Mới</label>
                            <input type="password" id="newPassword" name="newPassword" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
    
                        <!-- Xác nhận mật khẩu mới -->
                        <div>
                            <label for="confirmPassword" class="block text-lg font-medium text-gray-700">Xác Nhận Mật Khẩu Mới</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
    
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                            Cập Nhật Mật Khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-site> --}}