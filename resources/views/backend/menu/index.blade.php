
<x-layout-admin>
    <x-slot:title>
        Menu
    </x-slot:title>
  
        <!-- Main content -->
        <div class="flex-1 p-6 relative left-[100px]">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Quản lý Menu</h1>
                <div>
                    <a href="{{ route('menu.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm Mục Menu</a>
                    <a href="{{ route('menu.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
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
                            <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Trạng thái</th>
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

                            <td class="px-6 py-4 text-center text-sm text-gray-900">
                                @if($item->status === 1)
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">Hiển thị</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded">Ẩn</span>
                                @endif
                            </td>
                            <td class="flex px-7 py-8 text-center">
                                <a href="{{ route('menu.status', $item->id) }}" class="bg-{{ $item->status ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status ? 'green' : 'red' }}-600 text-xs">
                                    <i class="fa {{ $item->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <a href="{{ route('menu.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('menu.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('menu.delete', $item->id) }}" method="POST" class="inline-block">
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
                {{ $menus->links() }}

            </div>
        </div>
</x-layout-admin>