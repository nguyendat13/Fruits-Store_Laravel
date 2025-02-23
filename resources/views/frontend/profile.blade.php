<x-layout-site>
    <x-slot:title>
        Tài khoản
    </x-slot:title>
    <div class="bg-gray-800 min-h-screen py-12 px-6">
        <div class="container mx-auto flex flex-col md:flex-row p-8 bg-gradient-to-r from-purple-700 via-blue-700 to-indigo-700 rounded-2xl shadow-xl">
            
            <!-- Phần thông tin tài khoản -->
            <div class="w-full md:w-1/2 p-6 bg-white rounded-lg shadow-lg space-y-6">
                <h2 class="text-3xl font-extrabold text-gray-800">Thông Tin Tài Khoản</h2>

                <!-- Form thông tin tài khoản -->
                <form action="{{ route('site.updateProfile', $user->id) }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-lg font-semibold text-gray-700">Tên Đăng Nhập</label>
                            <input type="text" id="name" name="name" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" value="{{ old('name', $user->name) }}">
                        </div>
                
                        <div>
                            <label for="fullname" class="block text-lg font-semibold text-gray-700">Họ và Tên</label>
                            <input type="text" id="fullname" name="fullname" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" value="{{ old('fullname', $user->fullname) }}">
                        </div>
                
                        <div>
                            <label for="gender" class="block text-lg font-semibold text-gray-700">Giới Tính</label>
                            <select id="gender" name="gender" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500">
                                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                
                        <div>
                            <label for="thumbnail" class="block text-lg font-semibold text-gray-700">Ảnh đại diện</label>
                            <input type="text" id="thumbnail" name="thumbnail" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" value="{{ old('thumbnail', $user->thumbnail) }}">
                        </div>
                
                        <div>
                            <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" value="{{ old('email', $user->email) }}">
                        </div>
                
                        <div>
                            <label for="phone" class="block text-lg font-semibold text-gray-700">Số Điện Thoại</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" value="{{ old('phone', $user->phone) }}">
                        </div>
                
                        <div>
                            <label for="address" class="block text-lg font-semibold text-gray-700">Địa Chỉ</label>
                            <input type="text" id="address" name="address" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500" value="{{ old('address', $user->address) }}">
                        </div>
                
                        <div>
                            <label for="roles" class="block text-lg font-semibold text-gray-700">Vai Trò</label>
                            <select id="roles" name="roles" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500">
                                <option value="customer" {{ old('roles', $user->roles) == 'customer' ? 'selected' : '' }}>Customer</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="2">Hoạt động</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="text-right">
                        <button type="submit" class="px-8 py-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300">
                            Cập Nhật Thông Tin
                        </button>
                    </div>
                </form>
                
            </div>

            <!-- Phần thay đổi mật khẩu -->
            <div class="w-full md:w-1/2 p-6 mt-8 md:mt-0 bg-white rounded-lg shadow-lg space-y-6">
                <h3 class="text-3xl font-extrabold text-gray-800">Thay Đổi Mật Khẩu</h3>

                <!-- Form thay đổi mật khẩu -->
                <form action="{{ route('site.updatePassword', $user->id) }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="oldPassword" class="block text-lg font-semibold text-gray-700">Mật Khẩu Cũ</label>
                            <input type="password" id="oldPassword" name="oldPassword" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500">
                            @error('oldPassword')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="newPassword" class="block text-lg font-semibold text-gray-700">Mật Khẩu Mới</label>
                            <input type="password" id="newPassword" name="newPassword" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500">
                            @error('newPassword')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="confirmPassword" class="block text-lg font-semibold text-gray-700">Xác Nhận Mật Khẩu Mới</label>
                            <input type="password" id="confirmPassword" name="newPassword_confirmation" class="w-full px-5 py-3 border-2 border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="px-8 py-4 bg-green-600 text-white font-semibold rounded-lg shadow-lg hover:bg-green-700 transition duration-300">
                            Cập Nhật Mật Khẩu
                        </button>
                        @error('success')
                        <div class="text-green-500 text-sm">{{ $message }}</div>
                    @enderror
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-layout-site>
