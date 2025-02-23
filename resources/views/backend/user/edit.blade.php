<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Người dùng
    </x-slot:title>
    <div class="flex">
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Chỉnh sửa Người dùng</h1>
                <a href="{{ route('user.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Tên người dùng -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên người dùng</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name', $user->name) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" 
                               name="email" id="email" 
                               value="{{ old('email', $user->email) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Mật khẩu -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                        <input type="password" 
                               name="password" id="password" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Chỉ nhập mật khẩu nếu muốn thay đổi">
                    </div>

                    <!-- Hình ảnh người dùng -->
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                        <input type="file" name="thumbnail" id="thumbnail" 
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if ($user->thumbnail)
                            <img src="{{ asset('storage/images/user/' . $user->thumbnail) }}" alt="{{ $user->name }}" class="mt-2" width="200">
                        @endif
                    </div>

                    <!-- Họ và tên -->
                    <div class="mb-4">
                        <label for="fullname" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                        <input type="text" 
                               name="fullname" id="fullname" 
                               value="{{ old('fullname', $user->fullname) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Giới tính -->
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Giới tính</label>
                        <select name="gender" id="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="text" 
                               name="phone" id="phone" 
                               value="{{ old('phone', $user->phone) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Địa chỉ -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                        <input type="text" 
                               name="address" id="address" 
                               value="{{ old('address', $user->address) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Vai trò -->
                    <div class="mb-4">
                        <label for="roles" class="block text-sm font-medium text-gray-700">Vai trò</label>
                        <select name="roles" id="roles" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                            <option value="user" {{ $user->roles == 'customer' ? 'selected' : '' }}>Người dùng</option>
                        </select>
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1">Hoạt động</option>
                            <option value="2">Hoạt động(Customer)</option>
                            <option value="0">Không hoạt động</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật Người dùng</button>
                        <a href="{{ route('user.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
