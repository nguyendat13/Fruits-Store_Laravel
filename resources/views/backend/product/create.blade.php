<x-layout-admin>
    <x-slot:title>
        Thêm Sản Phẩm
    </x-slot:title>

    <div class="flex">
        <div class="flex-1 p-6 w-[1000px]">
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Thêm Sản Phẩm</h1>
                <a href="{{ route('product.index') }}" class="text-blue-500 hover:underline">← Quay lại danh sách sản phẩm</a>
            </div>

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-md shadow-md">
                @csrf

                <!-- Tên sản phẩm -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" required>
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập slug" value="{{ old('slug') }}" required>
                </div>

                <!-- Nội dung -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                    <textarea name="content" id="content" 
                              class="mt-1 block w-full border-gray-300 rounded-md" 
                              placeholder="Nhập nội dung sản phẩm" required>{{ old('content') }}</textarea>
                </div>

                <!-- Mô tả -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea name="description" id="description" 
                              class="mt-1 block w-full border-gray-300 rounded-md" 
                              placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
                </div>

                <!-- Giá nhập -->
                <div class="mb-4">
                    <label for="price_buy" class="block text-sm font-medium text-gray-700">Giá nhập</label>
                    <input type="number" name="price_buy" id="price_buy" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập giá nhập" value="{{ old('price_buy') }}" required>
                </div>

                <!-- Giá bán -->
                <div class="mb-4">
                    <label for="price_sale" class="block text-sm font-medium text-gray-700">Giá bán</label>
                    <input type="number" name="price_sale" id="price_sale" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập giá bán" value="{{ old('price_sale') }}" required>
                </div>

                <!-- Số lượng -->
                <div class="mb-4">
                    <label for="qty" class="block text-sm font-medium text-gray-700">Số lượng</label>
                    <input type="number" name="qty" id="qty" 
                           class="mt-1 block w-full border-gray-300 rounded-md" 
                           placeholder="Nhập số lượng" value="{{ old('qty') }}" required>
                </div>

                <!-- Hình ảnh -->
                <div class="mb-4">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full">
                </div>

                <!-- Danh mục -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select name="category_id" id="category_id" 
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Thương hiệu -->
                <div class="mb-4">
                    <label for="brand_id" class="block text-sm font-medium text-gray-700">Thương hiệu</label>
                    <select name="brand_id" id="brand_id" 
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                        <option value="">Chọn thương hiệu</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Trạng thái -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select name="status" id="status" 
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Công khai</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Thêm sản phẩm</button>
                <a href="{{ route('product.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
            </form>
        </div>
    </div>
</x-layout-admin>
