<x-layout-admin>
    <x-slot:title>
        Sản phẩm
    </x-slot:title>
    <!-- Main content -->
    <div class="flex-1 p-6 relative left-[150px]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý sản phẩm</h1>
            <div>
                <a href="/admin/product/create" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm sản phẩm</a>
                <a href="/admin/product/trash" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Hình</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên sản phẩm</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Danh mục</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Thương hiệu</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <input type="checkbox" name="selected[]" value="{{ $item->id }}">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <img src="{{ $item->thumbnail }}" alt="{{ $item->name }}" class="rounded-md" width="50">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->category->name ?? 'Không có danh mục' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->brand->name ?? 'Không có thương hiệu' }}</td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Trạng thái -->
                                <a href="{{ route('product.status', $item->id) }}" class="bg-{{ $item->status ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status ? 'green' : 'red' }}-600 text-xs">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('product.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Xem (View) -->
                                <a href="{{ route('product.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- Xóa (Delete) -->
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="inline-block">
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
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout-admin>
