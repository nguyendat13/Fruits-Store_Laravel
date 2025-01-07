<x-layout-admin>
    <div class="min-h-screen flex items-center justify-center bg-green-100">
        <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">
            {{-- @if(Auth::check())
            <a href="{{ route('dashboard.index')}}" class="text-center mb-4">Chào, {{ Auth::user()->name }}! Bạn đã đăng nhập.</a>

        @else --}}
            <h2 class="text-2xl font-semibold text-center mb-4 ">Đăng Nhập</h2>

            {{-- Form đăng nhập --}}
            <form action="{{ route('admin.dologin') }}" method="POST">
                @csrf
                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                        placeholder="Nhập email"
                        required>
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Mật khẩu --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password"
                        name="password"
                        id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                        placeholder="Nhập mật khẩu"
                        required>
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Ghi nhớ & Quên mật khẩu --}}
                <div class="flex justify-between items-center mb-4">
                    <label for="remember" class="flex items-center text-sm">
                        <input type="checkbox" name="remember" id="remember" class="mr-2" aria-label="Ghi nhớ tôi">
                        Ghi nhớ tôi
                    </label>
                    <a href="#" class="text-blue-500 text-sm hover:underline">Quên mật khẩu?</a>
                </div>

                {{-- Nút Đăng nhập --}}
                <button type="submit"
                    class="w-full py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                    aria-label="Đăng Nhập">
                    Đăng Nhập
                </button>
            </form>
            {{-- @endif --}}
            @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mt-4">
                <ul class="list-disc pl-5">
                    <li>{{ session('error') }}</li>
                </ul>
            </div>
        @endif
        
        </div>
    </div>
</x-layout-admin>
