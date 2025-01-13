<x-layout-site>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-4">{{ $topic->name }}</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="post-item border-b border-gray-300 pb-5 mb-5">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-2">
                            <img src="{{ asset('images/post/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-auto border border-gray-300 rounded-md">
                        </div>
                        <div class="md:col-span-3">
                            <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                            <p class="text-lg text-gray-700 mb-4">{{ $post->description }}</p>
                            <a href="{{ route('frontend.post.post-detail', ['slug' => $post->slug]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-200">
                                <strong>Đọc thêm</strong>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-site>