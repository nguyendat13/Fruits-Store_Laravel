<x-layout-admin>
    <x-slot:title>
        Thùng rác Thương hiệu
    </x-slot:title>
    <div class="flex ">
        <!-- Main content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Thùng rác Thương hiệu</h1>
                <a href="{{ route('brand.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Quay lại
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Hình ảnh</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="rounded-md" width="100">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="flex px-7 py-8 text-center relative left-[50px]">
                                <!-- Khôi phục -->
                                <form action="{{ route('brand.restore', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                        <i class="fas fa-undo"></i> Khôi phục
                                    </button>
                                </form>
                                <!-- Xóa vĩnh viễn -->
                                <form action="{{ route('brand.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-4 py-2 m-1 rounded-md hover:bg-red-600 text-xs">
                                        <i class="fas fa-trash-alt"></i> Xóa vĩnh viễn
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 <!-- Pagination -->
                <div class="mt-4">
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
