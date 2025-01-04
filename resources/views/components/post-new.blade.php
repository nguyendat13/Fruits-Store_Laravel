<div>
    <section class="content py-3">
        <div class="container ">
            <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center relative left-[120px]">Bài viết mới nhất</h1>
            <div class="product-list mb-3">
                <div class="product_list-s py-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative left-[100px]">
                        @foreach ($post_list as $postitem)
                            <x-post-item :postitem="$postitem" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>