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
                        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Chính Sách Vận Chuyển</h2>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8 text-center">
                            Chúng tôi cam kết giao hàng đúng thời gian và chất lượng như đã thỏa thuận. 
                            Vận chuyển nhanh chóng và đáng tin cậy là ưu tiên hàng đầu của chúng tôi.
                        </p>
                
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">1. Thời gian giao hàng</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Thời gian giao hàng từ 2-5 ngày làm việc tùy thuộc vào địa điểm.
                                </p>
                            </div>
                
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">2. Phí vận chuyển</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Phí vận chuyển sẽ được tính dựa trên địa chỉ nhận hàng.
                                </p>
                            </div>
                
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">3. Giao hàng cho các khu vực ngoại thành</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Đối với các khu vực ngoại thành hoặc vùng sâu, giá cước vận chuyển sẽ cao hơn tùy theo khoảng cách.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout-site>
