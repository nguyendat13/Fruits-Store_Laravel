
<section class="my-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-500 mb-8">Sản phẩm mới</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                <div class="overflow-hidden rounded-t">
                    <img src="{{ asset('images/product/' . $product->thumbnail) }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">
                </div>
                <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">{{ $product->category->name }}</div>
                <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute" style="left:270px;bottom:90px">Mới</div>

                <div class="p-4 bg-white rounded-b">
                    <h4 class="text-lg font-semibold">{{ $product->name }}</h4>

                    <p class="text-gray-600 text-sm">{{ $product->description }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-lg font-bold text-gray-800">${{ number_format($product->price, 2) }} / kg</p>
                        <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                            <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- <section class="my-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-500 mb-8">Sản phẩm mới</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                <div class="overflow-hidden rounded-t">
                    <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                </div>
                <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>

                <div class="p-4 bg-white rounded-b">
                    <h4 class="text-lg font-semibold">Parsely</h4>

                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                        <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                            <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
            <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                <div class="overflow-hidden rounded-t">
                    <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                </div>
                <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>

                <div class="p-4 bg-white rounded-b">
                    <h4 class="text-lg font-semibold">Parsely</h4>

                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                        <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                            <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
            <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                <div class="overflow-hidden rounded-t">
                    <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                </div>
                <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>

                <div class="p-4 bg-white rounded-b">
                    <h4 class="text-lg font-semibold">Parsely</h4>

                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                        <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                            <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
            <div class="border border-lime-500 rounded shadow-md hover:shadow-2xl relative shadow-lg w-80 flex-none">
                <div class="overflow-hidden rounded-t">
                    <img src="img/vegetable-item-3.png" class="w-full h-48 object-cover" alt="Vegetable">
                </div>
                <div class="text-white bg-lime-500 px-3 py-1 rounded absolute top-2 right-2">Vegetable</div>
                <div class="text-white bg-red-500 text-xs px-3 py-1 rounded absolute " style="left:80px;bottom:100px">Mới</div>

                <div class="p-4 bg-white rounded-b">
                    <h4 class="text-lg font-semibold">Parsely</h4>

                    <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-lg font-bold text-gray-800">$4.99 / kg</p>
                        <button class="flex items-center bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full border border-green-700 hover:bg-green-200 transition">
                            <i class="fa fa-shopping-bag mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}