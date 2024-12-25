<x-layout-admin>
    <x-slot:title>
        Chỉnh sửa Liên hệ
    </x-slot:title>
    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6 relative left-[100px] w-[1000px]">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold">Chỉnh sửa Liên hệ</h1>
                <a href="{{ route('contact.index') }}" class="text-blue-500 hover:underline">
                    ← Quay lại danh sách
                </a>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-md rounded-md p-6">
                <form action="{{ route('contact.update', ['contact' => $contact->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Người dùng -->
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Người dùng</label>
                        <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ (old('user_id', $contact->user_id) == $user->id) ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <div class="text-red-500 text-sm">{{ $errors->first('user_id') }}</div>
                        @endif
                    </div>

                    <!-- Tên -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                        <input type="text" 
                               name="name" id="name" 
                               value="{{ old('name', $contact->name ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tên" 
                               required>
                        @if ($errors->has('name'))
                            <div class="text-red-500 text-sm">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" 
                               name="email" id="email" 
                               value="{{ old('email', $contact->email ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập email" 
                               required>
                        @if ($errors->has('email'))
                            <div class="text-red-500 text-sm">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    {{-- <!-- Hình ảnh -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if (isset($contact) && $contact->image)
                            <img src="{{ asset('storage/images/contact/' . $contact->image) }}" alt="{{$contact->image}}" class="mt-2" width="200">
                        @endif
                        @if ($errors->has('image'))
                            <div class="text-red-500 text-sm">{{ $errors->first('image') }}</div>
                        @endif
                    </div> --}}

                    <!-- Số điện thoại -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" 
                               value="{{ old('phone', $contact->phone ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập số điện thoại">
                        @if ($errors->has('phone'))
                            <div class="text-red-500 text-sm">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>

                    <!-- Tiêu đề -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $contact->title ?? '') }}" 
                               class="mt-1 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Nhập tiêu đề">
                        @if ($errors->has('title'))
                            <div class="text-red-500 text-sm">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <!-- Nội dung -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                        <textarea name="content" id="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Nhập nội dung">{{ old('content', $contact->content ?? '') }}</textarea>
                        @if ($errors->has('content'))
                            <div class="text-red-500 text-sm">{{ $errors->first('content') }}</div>
                        @endif
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                        <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="1" {{ (old('status', $contact->status ?? '') == 1) ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ (old('status', $contact->status ?? '') == 0) ? 'selected' : '' }}>Ẩn</option>
                        </select>
                        @if ($errors->has('status'))
                            <div class="text-red-500 text-sm">{{ $errors->first('status') }}</div>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cập nhật Liên hệ</button>
                        <a href="{{ route('contact.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
