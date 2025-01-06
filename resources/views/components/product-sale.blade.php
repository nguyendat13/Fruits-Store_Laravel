<!-- resources/views/components/product-sale.blade.php -->
<div class="container mx-auto py-10 relative" style="width:80%;">
    <h2 class="text-3xl font-bold text-center text-gray-500 mb-8">Sản phẩm giảm giá</h2>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 justify-center">
        @foreach ($products as $product)
            <div class="max-w-sm">
                <a href="{{ route('frontend.product-detail', ['slug' => $product->slug]) }}">
                    <div class="bg-orange-500 rounded-lg border border-orange-500 overflow-hidden">
                        <img src="{{ asset('images/product/' . $product->thumbnail) }}" class="w-full rounded-t-lg" alt="{{ $product->name }}">
                        <div class="px-4 py-4">
                            <div class="bg-lime-500 text-center p-4 rounded-lg relative" style="bottom:50px;">
                                <h5 class="text-white text-lg font-bold">{{ $product->name }}</h5>
                                <h3 class="text-white text-2xl font-extrabold">{{ $product->price_sale }}% OFF</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>



{{-- 
<div class="container mx-auto py-10 relative" style="width:80%;">
    <h2 class="text-3xl font-bold text-center text-gray-500 mb-8">Sản phẩm giảm giá</h2>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 justify-center">
        <!-- Card 1 -->
        <div class="max-w-sm">
            <a href="#">
                <div class="bg-orange-500 rounded-lg border border-orange-500 overflow-hidden">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/12817-851501657688267-1657688267.jpg?v=1713175181177" class="w-full rounded-t-lg" alt="">
                    <div class="px-4 py-4 ">
                        <div class="bg-lime-500 text-center p-4 rounded-lg relative" style="bottom:50px;">
                            <h5 class="text-white text-lg font-bold">Fresh Apples</h5>
                            <h3 class="text-white text-2xl font-extrabold">20% OFF</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card 2 -->
        <div class="max-w-sm">
            <a href="#">
                <div class="bg-gray-900 rounded-lg border border-gray-800 overflow-hidden">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/chuoi-xiem-huu-co.jpg?v=1713169903643" class="w-full rounded-t-lg" alt="">
                    <div class="px-4 py-4">
                        <div class="bg-gray-100 text-center p-4 rounded-lg relative" style="bottom:50px;">
                            <h5 class="text-lime-500 text-lg font-bold">Tasty Fruits</h5>
                            <h3 class="text-gray-900 text-2xl ">Free delivery</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card 3 -->
        <div class="max-w-sm">
            <a href="#">
                <div class="bg-lime-500 rounded-lg border border-lime-500 overflow-hidden">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/ngo-ri.jpg?v=1712912315410" class="w-full rounded-t-lg" alt="">
                    <div class="px-4 py-4 ">
                        <div class="bg-orange-500 text-center p-4 rounded-lg relative" style="bottom:50px;">
                            <h5 class="text-white text-lg font-bold">Exotic Vegitable</h5>
                            <h3 class="text-white text-2xl font-extrabold">Discount 30$</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div> --}}