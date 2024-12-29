@vite('resources/css/app.css')

<x-layout-admin>
    <x-slot:title>
        Chi tiết Sản phẩm
    </x-slot:title>

    <div class="content-wrapper relative left-[50px] w-[1000px] top-[50px]">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="text-2xl font-bold">Chi tiết Sản phẩm</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nội dung chính -->
        <section class="content">
            <div class="card-header flex justify-end space-x-2">
                
                <a href="{{ route('product.index') }}" class="btn btn-sm bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
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
                                <td class="px-6 py-3 border-b font-semibold">Tên Sản phẩm</td>
                                <td class="px-6 py-3 border-b">{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Slug</td>
                                <td class="px-6 py-3 border-b">{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Nội dung</td>
                                <td class="px-6 py-3 border-b">{!! $product->content !!}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Mô tả</td>
                                <td class="px-6 py-3 border-b">{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Giá mua</td>
                                <td class="px-6 py-3 border-b">{{ number_format($product->price_buy, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Giá bán</td>
                                <td class="px-6 py-3 border-b">{{ number_format($product->price_sale, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Số lượng</td>
                                <td class="px-6 py-3 border-b">{{ $product->qty }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Chi tiết</td>
                                <td class="px-6 py-3 border-b">{{ $product->detail }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Ảnh sản phẩm</td>
                                <td class="px-6 py-3 border-b">
                                    <img src="{{ asset('images/products/' . $product->thumbnail) }}" alt="Thumbnail" class="w-32 h-32 object-cover">
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Danh mục</td>
                                <td class="px-6 py-3 border-b">{{ $product->category->name ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 border-b font-semibold">Thương hiệu</td>
                                <td class="px-6 py-3 border-b">{{ $product->brand->name ?? 'Không có' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layout-admin>