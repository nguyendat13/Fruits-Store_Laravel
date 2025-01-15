<x-layout-site>
    <x-slot:title>
        Chính sách vận chuyển
    </x-slot:title>

    <div>
        <div class="py-10">
            <!-- Header -->
            <div class="relative shadow-lg w-full h-40" style="bottom:40px;">
                <img class="w-full h-full object-cover" src="https://bizweb.dktcdn.net/100/350/980/themes/939145/assets/slider_1.jpg?1706077983929" alt="Header Image">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="container mx-auto">
                <h1 class="text-center text-white text-4xl font-bold relative" style="bottom:150px;">Chính sách vận chuyển</h1>
            </div>
        </div>

        <div class="container mx-auto my-6 px-4">
            <div class="flex space-x-6">
                <x-list-policies/>
                <!-- Nội dung chính sách -->
                <div class="container mx-auto py-12 px-4 md:px-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Chính Sách Hỗ Trợ</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Chính sách hỗ trợ 1 -->
                        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <i class="fa-solid fa-headset text-indigo-500 text-4xl mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Hỗ trợ 24/7</h3>
                            <p class="text-sm text-gray-600">Chúng tôi luôn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi.</p>
                        </div>
                
                        <!-- Chính sách hỗ trợ 2 -->
                        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <i class="fa-solid fa-phone-alt text-teal-500 text-4xl mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Hỗ trợ qua điện thoại</h3>
                            <p class="text-sm text-gray-600">Liên hệ với chúng tôi qua điện thoại trong giờ hành chính.</p>
                        </div>
                
                        <!-- Chính sách hỗ trợ 3 -->
                        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <i class="fa-solid fa-envelope text-blue-500 text-4xl mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Hỗ trợ qua email</h3>
                            <p class="text-sm text-gray-600">Gửi email cho chúng tôi và chúng tôi sẽ trả lời trong vòng 24 giờ.</p>
                        </div>
                
                        <!-- Chính sách hỗ trợ 4 -->
                        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                            <i class="fa-solid fa-comment-dots text-orange-500 text-4xl mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Hỗ trợ chat trực tuyến</h3>
                            <p class="text-sm text-gray-600">Chúng tôi cung cấp dịch vụ chat trực tuyến để giải đáp thắc mắc của bạn ngay lập tức.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout-site>
