@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Thương hiệu
    </x-slot:title>

    <div class="content-wrapper relative left-[50px] w-[1000px] top-[50px] ">
        <!-- Header -->
        <section class="content-header ">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="text-2xl font-bold">Chi tiết Thương hiệu</h1>
                    </div>
                   
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card shadow-lg">
                <div class="card-header flex justify-end space-x-2">
                
                    <a href="{{ route('brand.index') }}" class="btn btn-sm bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
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
                                <td class="px-6 py-3 border-b font-semibold">ID Thương hiệu</td>
                                <td class="px-6 py-3 border-b">{{ $brand->id }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Tên Thương hiệu</td>
                                <td class="px-6 py-3 border-b">{{ $brand->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Slug</td>
                                <td class="px-6 py-3 border-b">{{ $brand->slug }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Mô tả</td>
                                <td class="px-6 py-3 border-b">{{ $brand->description }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Hình ảnh</td>
                                <td class="px-6 py-3 border-b">
                                    <img src="{{ asset('storage/images/' . $brand->image) }}" alt="image" class="w-32 h-32 object-cover rounded">
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Thứ tự sắp xếp</td>
                                <td class="px-6 py-3 border-b">{{ $brand->sort_order }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>