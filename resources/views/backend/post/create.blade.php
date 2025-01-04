<x-layout-admin>
    <x-slot:title>
        Thêm Bài Viết
    </x-slot:title>

    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Thêm Bài Viết</h1>
                <a href="{{ route('post.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách bài viết
                </a>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-md rounded-md p-6 ">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tiêu đề bài viết -->
                    <div class="mb-4 ">
                        <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề bài viết</label>
                        <input type="text" 
                               name="title" id="title" 
                               value="{{ old('title') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tiêu đề bài viết" 
                               required>
                        @if ($errors->has('title'))
                            <div class="text-red-500 text-sm">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                <!-- Slug -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập slug" required>
                    @if ($errors->has('slug'))
                        <div class="text-red-500 text-sm">{{ $errors->first('slug') }}</div>
                    @endif
                </div>
                    <!-- Mô tả bài viết -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                        <textarea name="description" id="description" 
                                  class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                  placeholder="Nhập mô tả bài viết" required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="text-red-500 text-sm">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <!-- Nội dung bài viết -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Nội dung bài viết</label>
                        <textarea name="content" id="content" 
                                  class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                  placeholder="Nhập nội dung bài viết" required>{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <div class="text-red-500 text-sm">{{ $errors->first('content') }}</div>
                        @endif
                    </div>

                    <!-- Hình ảnh đại diện -->
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh đại diện</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full">
                        @if ($errors->has('thumbnail'))
                            <div class="text-red-500 text-sm">{{ $errors->first('thumbnail') }}</div>
                        @endif
                    </div>

                    <!-- Chủ đề bài viết -->
                    <select name="topic_id" id="topic_id" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-[10px]" required>
                <option value="">Chọn chủ đề</option>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : '' }}>
                        {{ $topic->name }}
                    </option>
                @endforeach
            </select>
                <!-- Loại bài viết -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Loại bài viết</label>
                    <select name="type" id="type" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">Chọn loại bài viết</option>
                        <option value="post" {{ old('type') == 'post' ? 'selected' : '' }}>Post</option>
                        <option value="page" {{ old('type') == 'page' ? 'selected' : '' }}>Page</option>
                    </select>
                    @if ($errors->has('type'))
                        <div class="text-red-500 text-sm">{{ $errors->first('type') }}</div>
                    @endif
                </div>
                    <!-- Trạng thái bài viết -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Công khai</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Thêm Bài Viết</button>
                        <a href="{{ route('post.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
