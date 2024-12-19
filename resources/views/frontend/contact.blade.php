
<x-layout-site>
    <x-slot:title>
        Trang chủ
    </x-slot:title>
    <div>
       <!-- Single Page Header start -->
       <div class="py-10">
        <div class="relative shadow-lg w-full h-40" style="bottom:40px;">
            <img
                class="w-full h-full object-cover"
                src="https://bizweb.dktcdn.net/100/350/980/themes/939145/assets/slider_1.jpg?1706077983929"
                alt="Header Image">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="container mx-auto">
            <h1 class="text-center text-white text-4xl font-bold relative" style="bottom:150px;">Liên hệ</h1>
            <!-- <nav class="flex justify-center mt-4">
        <ol class="flex space-x-2 text-sm text-gray-200">
            <li>
            <a href="#" class="hover:text-gray-100">Home</a>
            </li>
            <li>
            <span>/</span>
            </li>
            <li>
            <a href="#" class="hover:text-gray-100">Pages</a>
            </li>
            <li>
            <span>/</span>
            </li>
            <li class="text-white font-semibold">Shop</li>
        </ol>
        </nav> -->
        </div>

    </div>

    <div class="relative" style="bottom:100px;">
        <!-- Google Map -->
        <section class="my-8">
            <div class="container mx-auto">
                <h2 class="text-2xl font-bold mb-4 text-center">Địa chỉ của chúng tôi</h2>
                <div class="w-full h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509072!2d144.9556513154491!3d-37.817326442098734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf0727f2bbfdb6c18!2sYour%20Company%20Location!5e0!3m2!1sen!2s!4v1698765432109!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </section>

        <!-- Contact Info -->
        <section class="my-8">
            <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-center">Thông tin liên hệ</h2>
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-bold">Địa chỉ:</h3>
                        <p>123 Đường ABC, Thành phố XYZ, Việt Nam</p>
                    </div>
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-bold">Điện thoại:</h3>
                        <p>+84 123 456 789</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Email:</h3>
                        <p>info@yourcompany.com</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="my-8">
            <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4 text-center">Gửi tin nhắn cho chúng tôi</h2>
                <form action="#" method="POST" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium">Tên của bạn</label>
                            <input type="text" id="name" name="name" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <input type="email" id="email" name="email" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 font-medium">Tin nhắn</label>
                        <textarea id="message" name="message" rows="4" required class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Gửi tin nhắn</button>
                </form>
            </div>
        </section>

    </div>
    </div>
</x-layout-site>