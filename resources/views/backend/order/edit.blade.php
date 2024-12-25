<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Đơn hàng
    </x-slot:title>
    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Chỉnh sửa Đơn hàng</h1>
                <a href="{{ route('order.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- User ID -->
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">ID Người dùng</label>
                        <input type="number" 
                               name="user_id" id="user_id" 
                               value="{{ old('user_id', $order->user_id ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập ID người dùng" 
                               required>
                        @if ($errors->has('user_id'))
                            <div class="text-red-500 text-sm">{{ $errors->first('user_id') }}</div>
                        @endif
                    </div>

                    <!-- Tên -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name', $order->name ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tên khách hàng" 
                               required>
                        @if ($errors->has('name'))
                            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" 
                               name="email" id="email" 
                               value="{{ old('email', $order->email ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập email khách hàng">
                        @if ($errors->has('email'))
                            <div class="text-red-500 text-sm">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Số điện thoại -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="text" 
                               name="phone" id="phone" 
                               value="{{ old('phone', $order->phone ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập số điện thoại">
                        @if ($errors->has('phone'))
                            <div class="text-red-500 text-sm">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>

                    <!-- Địa chỉ -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                        <textarea name="address" id="address" rows="4" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                  placeholder="Nhập địa chỉ khách hàng">{{ old('address', $order->address ?? '') }}</textarea>
                        @if ($errors->has('address'))
                            <div class="text-red-500 text-sm">{{ $errors->first('address') }}</div>
                        @endif
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" {{ (old('status', $order->status ?? '') == 1) ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="0" {{ (old('status', $order->status ?? '') == 0) ? 'selected' : '' }}>Chưa hoàn thành</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật Đơn hàng</button>
                        <a href="{{ route('order.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
