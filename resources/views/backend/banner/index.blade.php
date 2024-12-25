

<x-layout-admin>
    <x-slot:title>
        Banner
    </x-slot:title>
    <div class="flex ">
        <!-- Main content -->
        <div class="flex-1 p-6 relative left-[100px]">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Quản lý Banner</h1>
                <div>
                    <a href="{{ route('banner.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm Banner</a>
                    <a href="{{ route('banner.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tiêu đề</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Liên kết (URL)</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Trạng thái</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <img src="{{ asset('storage/images/banner/' . $item->image) }}" alt="{{ $item->image }}" class="rounded-md" width="100">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <a href="{{ $item->link }}" target="_blank" class="text-blue-500 hover:underline">{{ $item->link }}</a>
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                                </span>
                            </td>
                            <td class="flex px-7 py-8 text-center">
                                <a href="{{ route('banner.status', $item->id) }}" class="bg-{{ $item->status ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status ? 'green' : 'red' }}-600 text-xs">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <a href="{{ route('banner.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('banner.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('banner.delete', $item->id) }}" method="POST" onsubmit="
                                    return confirm('Bạn có chắc chắn muốn xóa banner này không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 m-1 rounded-md hover:bg-red-600 text-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                
                                
                            </td>
                        </tr>
                    @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                  <!-- Pagination -->
                  <div class="mt-4">
                    {{ $banners->links() }}
                </div>
            </div>
        </div>

    </div>
</x-layout-admin>