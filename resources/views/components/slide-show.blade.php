<div class="container mx-auto mt-4 h-[500px]">
    <div class="container mx-auto mt-4">
        <!-- Hình ảnh làm nền cho banner -->
        @foreach ($bannerBanners as $banner)
            <div class="relative">
                <img class="w-full h-96 object-cover rounded-lg shadow-lg" src="{{ asset('images/banner/' . $banner->image) }}" alt="Hero Image">
                
                <!-- Phần văn bản nằm trên ảnh -->
                <div class="absolute" style="top:100px;left: 100px;">
                    <p class="text-yellow-400 font-bold" style="font-size: 25px;margin-bottom:25px;">
                        {{ $banner->description }}
                    </p>
                    <p class="text-4xl font-bold text-lime-500 relative" style="font-size: 50px;">
                        Rau Hữu Cơ & <br/>Trái Cây Thực Phẩm
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Slider nằm bên phải -->
    <div class="relative bg-red-500 rounded-full shadow-lg" style="bottom:350px;left:750px;width: 450px;">
        <!-- Carousel Slides -->
        <div class="overflow-hidden relative">
            <div id="carousel" class="flex transition-transform duration-500 ease-in-out" style="width: 100%; position: relative;">
                @foreach ($slideshowBanners as $index => $banner)
                    <div class="carousel-item w-full {{ $index === 0 ? 'active' : '' }}" style="{{ $index === 0 ? '' : 'display: none;' }}">
                        <img src="{{ asset('images/banner/' . $banner->image) }}" class="h-[250px] w-full rounded-full" alt="Slide {{ $index }}">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Carousel Controls -->
        <button onclick="prevSlide()" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white bg-green-600 bg-opacity-50 px-2 rounded-full">
            &#10094;
        </button>
        <button onclick="nextSlide()" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white bg-green-600 bg-opacity-50 px-2 rounded-full">
            &#10095;
        </button>
    </div>
</div>

<!-- Script để điều khiển Slider -->
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-item');

    function showSlide(index) {
        // Ẩn tất cả các slide
        slides.forEach((slide, i) => {
            slide.style.display = i === index ? 'block' : 'none';
        });
        currentSlide = index;
    }

    function nextSlide() {
        const nextIndex = (currentSlide + 1) % slides.length;
        showSlide(nextIndex);
    }

    function prevSlide() {
        const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prevIndex);
    }

    // Hiển thị slide đầu tiên khi tải trang
    showSlide(currentSlide);
</script
