<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Bài viết
    </x-slot:title>
    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Chỉnh sửa Bài viết</h1>
                <a href="{{ route('post.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Topic -->
                    <div class="mb-4">
                        <label for="topic_id" class="block text-sm font-medium text-gray-700">Chủ đề</label>
                        <select name="topic_id" id="topic_id" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" {{ $post->topic_id == $topic->id ? 'selected' : '' }}>
                                    {{ $topic->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tiêu đề -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                        <input type="text" 
                               name="title" id="title" 
                               value="{{ old('title', $post->title) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tiêu đề" 
                               required>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="mt-1">
                        @if ($post->thumbnail)
                            <div class="mt-2">
                                <img src="{{ asset('storage/images/post/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-32">
                            </div>
                        @endif
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" 
                               name="slug" id="slug" 
                               value="{{ old('slug', $post->slug) }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập slug">
                    </div>

                    <!-- Mô tả -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                        <textarea name="description" id="description" rows="3" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                  placeholder="Nhập mô tả">{{ old('description', $post->description) }}</textarea>
                    </div>

                    <!-- Nội dung -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                        <textarea name="content" id="content" rows="5" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                  placeholder="Nhập nội dung">{{ old('content', $post->content) }}</textarea>
                    </div>
                            <!-- Loại bài viết -->
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Loại bài viết</label>
                            <select name="type" id="type" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @foreach($types as $type)
                                    <option value="{{ $type }}" {{ $post->type == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Tạm ngưng</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật</button>
                        <a href="{{ route('post.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
