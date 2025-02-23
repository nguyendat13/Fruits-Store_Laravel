<head>
    <style>
        /* Đảm bảo menu dropdown ẩn mặc định */
        .hidden-dropdown {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex items-center space-x-4 relative right-[80px] text-xl text-gray-600">
        <div class="relative flex items-center">
            <button class="fa-solid fa-magnifying-glass cursor-pointer hover:text-black" id="searchIcon"></button>
        
            <form method="GET" action="{{ route('frontend.products.search') }}">
                <input
                    type="text"
                    name="q"
                    id="searchInput"
                    class="rounded-full w-[100px] text-[15px] border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                    placeholder="Tìm kiếm sản phẩm..."
                    value="{{ request('q') }}"
                />
            </form>
        </div>
        
        <!-- Hiển thị thông báo lỗi nếu có -->
        @if ($errors->has('q'))
            <div class="text-red-500 text-xs mb-4">
                {{ $errors->first('q') }}
            </div>
        @endif
        
        
        <!-- Icon User và Dropdown Menu -->
        <div class="relative inline-block text-left " id="userIcon">
            <!-- Avatar/User Icon -->
            <button type="button" class="inline-flex justify-center w-full rounded-md text-black" id="dropdownButton">
                <i class="fa-regular fa-user text-xl text-gray-600 hover:text-black"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="absolute left-[1px] right-[10px] mt-[10px] w-[100px] bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden-dropdown" id="dropdownMenu">
                <div class="py-1">
                    <a href="{{ route('site.profile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tài Khoản</a>
                    <a href="{{ route('site.order')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đơn Hàng</a>
                    <a href="{{ route('site.logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng Xuất</a>
                </div>
            </div>
        </div>

        <!-- Icon Heart -->
        <i class="fa-regular fa-heart hover:text-black"></i>

        <!-- Cart Button -->
        <button>
            <a href="{{ route('site.cart') }}" class="relative fa-solid fa-cart-shopping hover:text-black">
                <span class="absolute top-[-10px] right-[-10px] bg-red-500 text-white text-xs rounded-full px-1" id="cart-count">
                    {{ session('cart_count', 0) }}  
                </span>
            </a>
        </button>

        <!-- Icon Bell -->
        <i class="fa-regular fa-bell hover:text-black"></i>
    </div>

    <script>
           // Hàm cập nhật số lượng giỏ hàng trong biểu tượng giỏ hàng
    function updateCartCount() {
        fetch("{{ route('cart.count') }}")
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.querySelector('#cart-count');
                cartCountElement.textContent = data.count; // Cập nhật số lượng giỏ hàng
            })
            .catch(error => console.error("Error fetching cart count:", error));
    }

    // Gọi hàm để cập nhật số lượng giỏ hàng khi trang tải
    updateCartCount();

        document.getElementById('searchIcon').addEventListener('click', function() {
            const searchInput = document.getElementById('searchInput');
            // Kiểm tra xem ô tìm kiếm có đang ẩn hay không
            if (searchInput.classList.contains('hidden')) {
                searchInput.classList.remove('hidden'); // Hiện ô tìm kiếm
                searchInput.focus(); // Đặt con trỏ vào ô tìm kiếm
            } else {
                searchInput.classList.add('hidden'); // Ẩn ô tìm kiếm
            }
        });

        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle dropdown visibility
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden-dropdown');
        });

        // Close the dropdown menu if clicked outside
        document.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden-dropdown');
            }
        });
    </script>

</body>
