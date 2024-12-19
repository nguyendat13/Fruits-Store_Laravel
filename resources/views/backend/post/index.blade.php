

<x-layout-admin>
    <x-slot:title>
        Tất cả bài viết
    </x-slot:title>
      <!-- Main content -->
      <div class="flex-1 p-6 relative left-[100px]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý tất cả bài viết</h1>
            <div>
                <button href="" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Thêm bài viết</button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Thùng rác</button>
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
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tác giả</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-6 py-4 text-sm text-gray-900">1</td>
                        <td class="px-6 py-4 text-sm text-gray-900">Cách bảo quản trái cây tươi</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-xs">Công khai</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">01/12/2024</td>
                        <td class="px-6 py-4 text-sm text-gray-900">Nguyễn Văn A</td>
                        <td class="flex px-7 py-8 text-center">
                            <button class="bg-green-500 text-white px-4 py-2 m-1 rounded-md hover:bg-green-600 text-xs">
                                <i class="fa fa-toggle-on"></i>
                            </button>

                            <!-- Sửa (Edit) icon -->
                            <button class="bg-green-500 text-white px-4 py-2 m-1  rounded-md hover:bg-green-600 text-xs">
                                <i class="fas fa-edit "></i>
                            </button>
                            <!-- Xem (View) icon -->
                            <button class="bg-blue-500 text-white px-4 py-2 m-1  rounded-md hover:bg-blue-600 text-xs">
                                <i class="fas fa-eye"></i>
                            </button>
                            <!-- Xóa (Delete) icon -->
                            <button class="bg-red-500 text-white px-4 py-2 m-1 rounded-md hover:bg-red-600 text-xs">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

</x-layout-admin>