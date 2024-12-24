<x-layout-admin>
    <x-slot:title>
        Thêm Chủ Đề
    </x-slot:title>

    <div class="flex">
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Thêm Chủ Đề</h1>
                <a href="{{ route('topic.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('topic.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên chủ đề</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập tên chủ đề">
                        @if ($errors->has('name'))
                            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập slug">
                        @if ($errors->has('slug'))
                            <div class="text-red-500 text-sm">{{ $errors->first('slug') }}</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="text-red-500 text-sm">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Thứ tự</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order') }}" class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if ($errors->has('sort_order'))
                            <div class="text-red-500 text-sm">{{ $errors->first('sort_order') }}</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                        @endif
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Thêm chủ đề</button>
                        <a href="{{ route('topic.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
