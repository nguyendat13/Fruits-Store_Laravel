<x-layout-admin>
    <x-slot:title>
        Danh mục sản phẩm
    </x-slot:title>
    <div class="flex ">
        <!-- Main content -->
        <div class="flex-1 p-6 relative left-[100px]">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Quản lý danh mục sản phẩm</h1>
                <div>
                    <a href="{{ route('category.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm danh mục</a>
                    <a href="{{ route('category.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Slug</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Trạng thái</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $category->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="rounded-md" width="100">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $category->slug }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">
                                <span class="bg-{{ $category->status ? 'green' : 'gray' }}-100 text-{{ $category->status ? 'green' : 'gray' }}-700 px-2 py-1 rounded">
                                    {{ $category->status ? 'Hiển thị' : 'Ẩn' }}
                                </span>
                            </td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Trạng thái -->
                                <a href="{{ route('category.status', $category->id) }}" class="bg-{{ $category->status ? 'green' : 'gray' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $category->status ? 'green' : 'gray' }}-600 text-xs">
                                    <i class="fa {{ $category->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('category.edit', $category->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Xem (View) -->
                                <a href="{{ route('category.show', $category->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Xóa (Delete) -->
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline-block">
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
                 <!-- Pagination -->
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
            </div>
        </div>
    </div>
</x-layout-admin>
