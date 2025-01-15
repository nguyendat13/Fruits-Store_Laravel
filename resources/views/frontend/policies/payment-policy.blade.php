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
                <div class="container mx-auto py-12 px-6 md:px-12">
                    <div class="w-full bg-white p-8 rounded-lg shadow-lg">
                        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Chính Sách Thanh Toán</h1>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8 text-center">
                            Chúng tôi hỗ trợ các phương thức thanh toán đa dạng và an toàn, bao gồm thanh toán trực tuyến và thanh toán khi nhận hàng.
                        </p>
                
                        <div class="space-y-6">
                            <!-- Thanh toán trực tuyến -->
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-800 mb-3">1. Thanh toán trực tuyến</h2>
                                <p class="text-gray-600 leading-relaxed">
                                    Hỗ trợ thẻ tín dụng, thẻ ghi nợ và ví điện tử.
                                </p>
                            </div>
                
                            <!-- Thanh toán khi nhận hàng -->
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-800 mb-3">2. Thanh toán khi nhận hàng</h2>
                                <p class="text-gray-600 leading-relaxed">
                                    Chỉ áp dụng tại một số khu vực nhất định.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout-site>
