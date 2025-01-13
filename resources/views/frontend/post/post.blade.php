<x-layout-site>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-6xl font-bold mb-6">{{ $title }}</h1>

        <!-- Hiển thị danh sách các chủ đề -->
        <div class="mb-6 relative bottom-[50px] left-[1100px]">
            <h2 class="text-2xl font-semibold mb-4">Chủ đề</h2>
            <form action="{{ route('frontend.post.post') }}" method="GET" class="mb-4">
                <select name="topicSlug" class="px-4 py-2 border border-gray-300 rounded-md " onchange="this.form.submit()">
                    <option value="">Tất cả bài viết</option>
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->slug }}" {{ request('topicSlug') == $topic->slug ? 'selected' : '' }}>
                            {{ $topic->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <!-- Hiển thị bài viết -->
        @foreach ($posts as $postitem)
            <div class="post-item border-b border-gray-300 pb-5 mb-5">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                        <img src="{{ asset('images/post/' . $postitem->thumbnail) }}" alt="{{ $postitem->title }}" class="w-full h-auto border border-gray-300 rounded-md">
                    </div>
                    <div class="md:col-span-3">
                        <h2 class="text-2xl font-semibold mb-2">{{ $postitem->title }}</h2>
                        <p class="text-lg text-gray-700 mb-4">{{ $postitem->description }}</p>
                        <a href="{{ route('frontend.post.post-detail', ['slug' => $postitem->slug]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-200">
                            <strong>Đọc thêm</strong>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout-site>
