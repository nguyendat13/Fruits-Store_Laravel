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