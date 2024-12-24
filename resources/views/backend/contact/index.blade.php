<x-layout-admin>
    <x-slot:title>
        Quản lý liên hệ
    </x-slot:title>
    <div class="flex relative left-[50px]">

        <!-- Main content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">Quản lý liên hệ</h1>
                <div>
                    <a href="{{ route('contact.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
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
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Trạng thái</th>
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
                            <td class="px-6 py-4 text-center">
                                @if($item->status == '0')
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-md text-xs">Chờ xử lý</span>
                                @elseif($item->status == '1')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-xs">Đã xử lý</span>
                                @else
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded-md text-xs">Bỏ qua</span>
                                @endif
                            </td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Trạng thái -->
                                <a href="{{ route('contact.status', $item->id) }}" class="bg-{{ $item->status ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status ? 'green' : 'red' }}-600 text-xs">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <!-- Sửa (Edit) -->
                                <a href="{{ route('contact.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Xem (View) -->
                                <a href="{{ route('contact.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Xóa (Delete) -->
                                <form action="{{ route('contact.delete', $item->id) }}" method="POST" class="inline-block">
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
                {{ $contacts->links() }}
            </div>
            </div>
        </div>
    </div>
</x-layout-admin>
