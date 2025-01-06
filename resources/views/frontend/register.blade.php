<form action="{{ route('site.doregister') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="Nhập tên" required>
    </div>

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="Nhập email" required>
    </div>

    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
        <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="Nhập mật khẩu" required>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="Xác nhận mật khẩu" required>
    </div>

    <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-md">Đăng Ký</button>
</form>

{{-- <x-layout-site>
    <x-slot:title>
        Đăng ký
    </x-slot:title>
    <div>
        <body class="bg-gray-100">

            <div class="min-h-screen flex items-center justify-center">
                <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold text-center mb-4">Đăng Ký</h2>
        
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập họ tên" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập email" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập mật khẩu" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Xác nhận mật khẩu" required>
                        </div>
        
                        <button type="submit" class="w-full py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Đăng Ký</button>
                    </form>
        
                    <p class="mt-4 text-center text-sm">Đã có tài khoản? <a href="/dang-nhap" class="text-blue-500 hover:underline">Đăng nhập ngay</a></p>
                </div>
            </div>
        
        </body>
        
    </div>
</x-layout-site> --}}