<x-layout-admin>
    <x-slot:title>
        Thùng Rác Thành Viên
    </x-slot:title>

    <div class="flex-1 p-6 relative left-[50px] w-[1000px]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Thùng Rác Thành Viên</h1>
            <div>
                <a href="{{ route('user.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Quay lại</a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Số Điện Thoại</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Vai Trò</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Ngày Tham Gia</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->fullname }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->roles }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $item->created_at ? $item->created_at->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Khôi phục -->
                                <form action="{{ route('user.restore', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                        <i class="fas fa-undo"></i> Khôi phục
                                    </button>
                                </form>
                                <!-- Xóa vĩnh viễn -->
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-layout-admin>
