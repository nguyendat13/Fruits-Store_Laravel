@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Bài viết
    </x-slot:title>

    <div class="content-wrapper relative left-[50px] w-[1000px] top-[50px]">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="text-2xl font-bold">Chi tiết Bài viết</h1>
                    </div>
                   
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card shadow-lg">
                <div class="card-header flex justify-end space-x-2">
                
                    <a href="{{ route('post.index') }}" class="btn btn-sm bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>

                <div class="card-body">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="text-left text-gray-700">
                                <th class="px-6 py-3 border-b">Tên trường</th>
                                <th class="px-6 py-3 border-b">Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">ID Bài viết</td>
                                <td class="px-6 py-3 border-b">{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Tên Bài viết</td>
                                <td class="px-6 py-3 border-b">{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Slug</td>
                                <td class="px-6 py-3 border-b">{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Mô tả</td>
                                <td class="px-6 py-3 border-b">{{ $post->description }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Nội dung</td>
                                <td class="px-6 py-3 border-b">{!! $post->content !!}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Hình thu nhỏ</td>
                                <td class="px-6 py-3 border-b">
                                    <img src="{{ asset('storage/images/' . $post->thumbnail) }}" alt="thumbnail" class="w-32 h-32 object-cover rounded">
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Loại</td>
                                <td class="px-6 py-3 border-b">{{ ucfirst($post->type) }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Chuyên mục</td>
                                <td class="px-6 py-3 border-b">{{ $post->topic->name ?? 'Không có' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>