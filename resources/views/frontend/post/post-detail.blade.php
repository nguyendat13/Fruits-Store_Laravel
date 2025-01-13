<x-layout-site>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">{{ $post->title }}</h1>
        <div class="mb-6">
            <img src="{{ asset('images/post/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-[500px] h-auto border border-gray-300 rounded-md">
        </div>
        <div class="text-lg text-gray-700 mb-6">
            {!! $post->content !!}
        </div>

        <!-- Bài viết liên quan -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Bài viết liên quan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if($relatedPosts->isEmpty())
                <p>Không có bài viết liên quan</p>
            @else
                @foreach ($relatedPosts as $relatedPost)
                    <div class="border border-gray-300 rounded-lg p-4 shadow-md">
                        <a href="{{ route('frontend.post.post-detail', ['slug' => $relatedPost->slug]) }}">
                            <img src="{{ asset('images/post/' . $relatedPost->thumbnail) }}" alt="{{ $relatedPost->title }}" class="w-full h-40 object-cover rounded-lg mb-3">
                            <h3 class="text-lg font-bold">{{ $relatedPost->title }}</h3>
                        </a>
                        <p class="text-gray-600 mt-2 text-sm">
                            {{ Str::limit($relatedPost->description, 100) }}
                        </p>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</x-layout-site>
