<x-layout-admin>
    <x-slot:title>
        Thùng rác Menu
    </x-slot:title>
  
        <!-- Main content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Thùng rác Menu</h1>
                <div>
                    <a href="{{ route('menu.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Quay lại
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên Menu</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Liên kết (URL)</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Vị trí</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Loại</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <a href="{{ $item->link }}" class="text-blue-500 hover:underline">{{ $item->link }}</a>
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $item->position }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $item->type }}</td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Khôi phục -->
                                <form action="{{ route('menu.restore', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                        <i class="fas fa-undo"></i> Khôi phục
                                    </button>
                                </form>
                                <!-- Xóa vĩnh viễn -->
                                <form action="{{ route('menu.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
</x-layout-admin>
