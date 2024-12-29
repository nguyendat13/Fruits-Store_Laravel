@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Banner
    </x-slot:title>

    <div class="content-wrapper relative left-[50px] w-[1000px] top-[50px]">

        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="text-2xl font-bold">Chi tiết Banner</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card shadow-lg">
                <div class="card-header flex justify-end space-x-2">
                
                    <a href="{{ route('banner.index') }}" class="btn btn-sm bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>

                <div class="card-body">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="text-left text-gray-700">
                                <th class="px-6 py-3 border-b font-medium text-sm">Tên trường</th>
                                <th class="px-6 py-3 border-b font-medium text-sm">Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 border-b">Ảnh</td>
                                <td class="px-6 py-3 border-b">
                                    @if($banner->image)
                                        <img src="{{ asset('images/banners/' . $banner->image) }}" alt="{{ $banner->name }}" class="max-w-xs h-auto rounded-lg">
                                    @else
                                        <span class="text-gray-500 italic">Không có ảnh</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b">Tên banner</td>
                                <td class="px-6 py-3 border-b">{{ $banner->name ?? 'Chưa có tên' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b">Mô tả</td>
                                <td class="px-6 py-3 border-b">{{ $banner->description ?? 'Không có mô tả' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b">Vị trí</td>
                                <td class="px-6 py-3 border-b">{{ $banner->position ?? 'Không xác định' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b">Link</td>
                                <td class="px-6 py-3 border-b">{{ $banner->link ?? 'Không có liên kết' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b">Trạng thái</td>
                                <td class="px-6 py-3 border-b">
                                    <span class="py-1 px-3 rounded-md text-white {{ $banner->status == 1 ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ $banner->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                                    </span>
                                    <button class="ml-2 py-1 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded-md" onclick="updateStatus({{ $banner->id }}, {{ $banner->status }})">
                                        Thay đổi
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>