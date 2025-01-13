<x-layout-admin>
    <x-slot:title>
        Thêm Mục Menu
    </x-slot:title>

    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Thêm Mục Menu</h1>
                <a href="{{ route('menu.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-md rounded-md p-6 py-7">
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tên Menu -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên Mục Menu</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tên mục menu" 
                               required>
                        @if ($errors->has('name'))
                            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Liên kết (URL) -->
                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium text-gray-700">Liên kết (URL)</label>
                        <input type="text" name="link" id="link" value="{{ old('link') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập liên kết" required>
                        @if ($errors->has('link'))
                            <div class="text-red-500 text-sm">{{ $errors->first('link') }}</div>
                        @endif
                    </div>

                    <!-- Vị trí -->
                    <div class="mb-4">
                        <label for="position" class="block text-sm font-medium text-gray-700">Vị trí</label>
                        <select name="position" id="position" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="mainmenu" {{ old('position') == 'mainmenu' ? 'selected' : '' }}>Main Menu</option>
                            <option value="footermenu" {{ old('position') == 'footermenu' ? 'selected' : '' }}>Footer Menu</option>
                        </select>
                        @if ($errors->has('position'))
                            <div class="text-red-500 text-sm">{{ $errors->first('position') }}</div>
                        @endif
                    </div>

                    <!-- Loại Menu -->
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Loại Menu</label>
                        <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="page" {{ old('type') == 'page' ? 'selected' : '' }}>Page</option>
                            <option value="category" {{ old('type') == 'category' ? 'selected' : '' }}>Category</option>
                            <option value="brand" {{ old('type') == 'brand' ? 'selected' : '' }}>Brand</option>

                        </select>
                        @if ($errors->has('type'))
                            <div class="text-red-500 text-sm">{{ $errors->first('type') }}</div>
                        @endif
                    </div>
                    <!-- Thứ tự -->
                    <div class="mb-4">
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @if ($errors->has('sort_order'))
                            <div class="text-red-500 text-sm">{{ $errors->first('sort_order') }}</div>
                        @endif
                    </div>
                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Thêm Mục Menu</button>
                        <a href="{{ route('menu.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
