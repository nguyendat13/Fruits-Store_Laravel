@if(session('success'))
    <div class="bg-green-500 text-white py-3 rounded-md mb-6">
        {{ session('success') }}
    </div>
@endif
<x-layout-site>
    <div class="max-w-4xl mx-auto text-center py-12">
        <h1 class="text-3xl font-semibold text-green-600 mb-6">Cảm Ơn Bạn Đã Mua Hàng!</h1>
        <p class="text-lg text-gray-700 mb-8">Đơn hàng của bạn đã được đặt thành công. Chúng tôi sẽ xử lý và gửi thông tin cho bạn trong thời gian sớm nhất.</p>
        
        <div class="m-5">
            <a href="{{ route('frontend.home') }}" class="m-[10px] bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition duration-300">
                Quay lại Trang Chủ
            </a>
            <a href="{{ route('site.order') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition duration-300">
                Đến đơn hàng
            </a>
        </div>
        <p class="text-sm text-gray-500">Cảm ơn bạn đã tin tưởng và mua sắm tại cửa hàng của chúng tôi!</p>
    </div>
</x-layout-site>
