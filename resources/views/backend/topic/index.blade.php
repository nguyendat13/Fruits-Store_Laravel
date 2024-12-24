<x-layout-admin>
    <x-slot:title>
        Chủ đề
    </x-slot:title>
  
    <!-- Main content -->
    <div class="flex-1 relative left-[100px] p-6 w-[1000px]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý chủ đề</h1>
            <div>
                <a href="{{ route('topic.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm chủ đề</a>
                <a href="{{ route('topic.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tên chủ đề</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Mô tả</th>
                        {{-- <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Bài viết liên quan</th> --}}
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->description }}</td>
                            {{-- <td class="px-6 py-4 text-center text-sm text-gray-900">
                                {{ $item->posts_count }} <!-- Giả sử bạn có số bài viết liên quan -->
                            </td> --}}
                            <td class="flex  py-6 text-center">
                                <a href="{{ route('topic.status', $item->id) }}" class="bg-{{ $item->status == 1 ? 'green' : 'red' }}-500 text-white px-4 py-2 m-1 rounded-md hover:bg-{{ $item->status == 1 ? 'green' : 'red' }}-600 text-xs">
                                    <i class="fa {{ $item->status == 1 ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                                <a href="{{ route('topic.edit', $item->id) }}" class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('topic.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('topic.delete', $item->id) }}" method="POST" class="inline-block">
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
            <div class="mt-4">
                {{ $topics->links() }}
            </div>
        </div>
    </div>
</x-layout-admin>
