<x-layout-admin>
    <x-slot:title>
        Tất cả bài viết
    </x-slot:title>

    <!-- Main content -->
    <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý tất cả bài viết</h1>
            <div>
                <a href="{{ route('post.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm bài viết</a>
                <a href="{{ route('post.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tiêu đề</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Trạng thái</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Ngày đăng</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <span class="bg-{{ $item->status == 1 ? 'green' : 'gray' }}-100 text-{{ $item->status == 1 ? 'green' : 'gray' }}-700 px-2 py-1 rounded-md text-xs">
                                    {{ $item->status == 1 ? 'Công khai' : 'Ẩn' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{-- Kiểm tra nếu created_at có giá trị và format nó --}}
                                {{ $item->created_at ? $item->created_at->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td class="flex px-7 py-8 text-center">
                                <a href="{{ route('post.status', $item->id) }}" class="bg-{{ $item->status == 1 ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status == 1 ? 'green' : 'red' }}-600 text-xs">
                                    <i class="fa {{ $item->status == 1 ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <a href="{{ route('post.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('post.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('post.delete', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')   
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 m-1 rounded-md hover:bg-red-600 text-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout-admin>
