<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Chủ đề
    </x-slot:title>
    <div class="flex">
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Chỉnh sửa Chủ đề</h1>
                <a href="{{ route('topic.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('topic.update', ['topic' => $topic->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Tên chủ đề -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên chủ đề</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name', $topic->name) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" 
                               name="slug" id="slug" 
                               value="{{ old('slug', $topic->slug) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Tự động tạo từ tên nếu để trống">
                    </div>

                    <!-- Mô tả -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                        <textarea name="description" id="description" rows="3" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                  placeholder="Nhập mô tả">{{ old('description', $topic->description) }}</textarea>
                    </div>

                    <!-- Thứ tự -->
                    <div class="mb-4">
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                        <input type="number" 
                               name="sort_order" id="sort_order" 
                               value="{{ old('sort_order', $topic->sort_order) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật Chủ đề</button>
                        <a href="{{ route('topic.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
