@vite('resources/css/app.css')
<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" 
integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
';
?>
<div class="container mx-auto mt-4">
    <!-- Hình ảnh làm nền -->
    <div class="relative">
        <img
            class="w-full h-96 object-cover rounded-lg shadow-lg"
            src="https://bizweb.dktcdn.net/100/323/328/themes/673538/assets/slider_1.jpg?1705892596840"
            alt="Hero Image">
        <!-- Phần văn bản nằm trên ảnh -->
        <div class="absolute " style="top:100px;left: 100px;">
            <p class="text-yellow-400 font-bold " style="font-size: 25px;margin-bottom:25px;">100% Thực phẩm hữu cơ</p>
            <p class=" text-4xl font-bold text-lime-500" style="font-size: 50px;">Rau Hữu Cơ & <br> Trái Cây Thực Phẩm</p>
        </div>
    </div>

    <!-- Slider nằm bên phải -->
    <div class="relative bg-red-500 rounded-full " style="bottom:300px;left:750px;width: 450px;">
        <!-- Carousel Slides -->
        <div class="overflow-hidden relative">
            <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
                <!-- Slide 1 -->
                <div class="carousel-item w-full relative ">
                    <img src="https://bizweb.dktcdn.net/100/350/980/themes/939145/assets/slider_1.jpg?1706077983929" class="h-[200px] w-full " alt="Slide 1">
                
                </div>

            </div>
        </div>

        <!-- Carousel Controls -->
        <button onclick="prevSlide()" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white bg-green-600 bg-opacity-50 px-2 rounded-full">
            &#10094;
        </button>
        <button onclick="nextSlide()" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white bg-green-600 bg-opacity-50 px-2 rounded-full">
            &#10095;
        </button>

        <!-- Carousel Indicators -->
        <div class="absolute top-[150px] left-0 right-0 flex justify-center space-x-2 z-10">
            <button class="w-3 h-3 bg-white rounded-full" onclick="showSlide(0)"></button>
            <button class="w-3 h-3 bg-white rounded-full" onclick="showSlide(1)"></button>
        </div>
    </div>

</div>