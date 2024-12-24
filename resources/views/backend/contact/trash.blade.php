<x-layout-admin>
    <x-slot:title>
        Thùng rác Liên hệ
    </x-slot:title>
    <div class="flex relative left-[50px] w-[1000px]">

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">Thùng rác Liên hệ</h1>
                <div>
                    <a href="{{ route('contact.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
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
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên người gửi</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Số điện thoại</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tiêu đề</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->title }}</td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Khôi phục -->
                                <form action="{{ route('contact.restore', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                        <i class="fas fa-undo"></i> Khôi phục
                                    </button>
                                </form>
                                <!-- Xóa vĩnh viễn -->
                                <form action="{{ route('contact.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-admin>
