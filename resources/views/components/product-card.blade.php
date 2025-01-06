<a href="{{ route('frontend.product-detail',['slug' => $product_item->slug]) }}" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
    <div class="relative">
        <img src="{{ asset('images/product/' . $product_item->thumbnail) }}" alt="{{ $product_item->name }}" class="rounded-t-lg w-full h-48 object-cover">
        <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
            {{ $product_item->category->name }}
        </div>
    </div>
    <div class="p-4 border-t border-yellow-400">
        <h4 class="text-lg font-semibold mb-2">{{ $product_item->name }}</h4>
        <p class="text-gray-500 text-sm mb-4">{{ $product_item->description }}</p>
        <div class="flex justify-between items-center">
            <p class="text-lg font-bold text-gray-800">${{ number_format($product_item->price, 2) }} / kg</p>
            <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
            </button>
        </div>
    </div>
</a>

{{-- 
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
<a href="{{ route('frontend.product-detail',['slug' => $product->slug]) }}" 
    class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
     <div class="relative">
         <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" 
              alt="{{ $product->thumbnail }}" class="rounded-t-lg w-full h-48 object-cover">
         <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
             Trái cây
         </div>
     </div>
     <div class="p-4 border-t border-yellow-400">
         <h4 class="text-lg font-semibold mb-2">{{ $product->name }}</h4>
         <p class="text-gray-500 text-sm mb-4">{{ $product->description }}</p>
         <div class="flex justify-between items-center">
             <p class="text-gray-800 font-bold">{{ $product->price_buy }}</p>
             <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                 <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
             </button>
         </div>
     </div>
 </a>
</div> --}}

{{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <a href="/public/san-pham/slug" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
        <div class="relative">
            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                Fruits
            </div>
        </div>
        <div class="p-4 border-t border-yellow-400 ">
            <h4 class="text-lg font-semibold mb-2">Banana</h4>
            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="flex justify-between items-center">
                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </a>
    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
        <div class="relative">
            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                Fruits
            </div>
        </div>
        <div class="p-4 border-t border-yellow-400 ">
            <h4 class="text-lg font-semibold mb-2">Banana</h4>
            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="flex justify-between items-center">
                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </a>
    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
        <div class="relative">
            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                Fruits
            </div>
        </div>
        <div class="p-4 border-t border-yellow-400 ">
            <h4 class="text-lg font-semibold mb-2">Banana</h4>
            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="flex justify-between items-center">
                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </a>
    <a href="product_detail.html" class="bg-white rounded-lg shadow-md hover:shadow-2xl transition duration-300 font-semibold cursor-pointer">
        <div class="relative">
            <img src="https://bizweb.dktcdn.net/thumb/large/100/514/629/products/bo-booth.jpg?v=1713170772577" alt="Banana" class="rounded-t-lg w-full h-48 object-cover">
            <div class="absolute top-2 left-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded">
                Fruits
            </div>
        </div>
        <div class="p-4 border-t border-yellow-400 ">
            <h4 class="text-lg font-semibold mb-2">Banana</h4>
            <p class="text-gray-500 text-sm mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
            <div class="flex justify-between items-center">
                <p class="text-gray-800 font-bold">$4.99 / kg</p>
                <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                    <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </a>
</div> --}}
