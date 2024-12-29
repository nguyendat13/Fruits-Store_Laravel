@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Người dùng
    </x-slot:title>

    <div class="content-wrapper relative left-[50px] w-[1000px] top-[50px]  ">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="text-2xl font-bold">Chi tiết Người dùng</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card shadow-lg">
                <div class="card-header flex justify-end space-x-2">
                
                    <a href="{{ route('user.index') }}" class="btn btn-sm bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>

                <div class="card-body">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="text-left text-gray-700">
                                <th class="px-6 py-3 border-b">Tên trường</th>
                                <th class="px-6 py-3 border-b">Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">ID Người dùng</td>
                                <td class="px-6 py-3 border-b">{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Tên đăng nhập</td>
                                <td class="px-6 py-3 border-b">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Họ và tên</td>
                                <td class="px-6 py-3 border-b">{{ $user->fullname }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Giới tính</td>
                                <td class="px-6 py-3 border-b">{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Email</td>
                                <td class="px-6 py-3 border-b">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Số điện thoại</td>
                                <td class="px-6 py-3 border-b">{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Địa chỉ</td>
                                <td class="px-6 py-3 border-b">{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Vai trò</td>
                                <td class="px-6 py-3 border-b">{{ $user->roles }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Hình ảnh đại diện</td>
                                <td class="px-6 py-3 border-b">
                                    <img src="{{ asset('storage/images/' . $user->thumbnail) }}" alt="thumbnail" class="w-32 h-32 object-cover rounded">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>