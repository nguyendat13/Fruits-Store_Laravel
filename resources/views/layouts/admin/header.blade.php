{{-- <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
    <div class="flex items-center mb-8">
        <img src="https://themewagon.github.io/spike-nuxtjs-free/images/profile/user-3.jpg" alt="Logo" class="w-10 h-10 rounded-full">
        <span class="ml-2 text-xl font-semibold">Admin Dashboard</span>
    </div>
    <nav>
        <ul class="space-y-4">
            <!-- Dashboard -->
            <li><a href="/admin" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Dashboard</a></li>

            <!-- Thành viên -->
            <li><a href="/admin/user" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Thành viên</a></li>

            <!-- Sản phẩm -->
            <li>
                <button class="w-full text-white py-2 px-4 rounded block text-left hover:bg-gray-700" aria-expanded="false" id="product-menu">
                    Sản phẩm <span class="right ml-2">&lt;</span>
                </button>
                <ul class="space-y-2 pl-6 hidden" id="product-submenu">
                    <li><a href="/admin/product" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Tất cả sản phẩm</a></li>
                    <li><a href="/admin/category" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Danh mục sản phẩm</a></li>
                    <li><a href="/admin/brand" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Thương hiệu</a></li>
                </ul>
            </li>

            <!-- Bài viết -->
            <li>
                <button class="w-full text-white py-2 px-4 rounded block text-left hover:bg-gray-700" aria-expanded="false" id="post-menu">
                    Bài viết <span class="right ml-2">&lt;</span>
                </button>
                <ul class="space-y-2 pl-6 hidden" id="post-submenu">
                    <li><a href="/admin/post" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Tất cả bài viết</a></li>
                    <li><a href="/admin/topic" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Chủ đề</a></li>
                </ul>
            </li>

            <!-- Đơn hàng -->
            <li><a href="/admin/order" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Đơn hàng</a></li>

            <!-- Giao diện -->
            <li>
                <button class="w-full text-white py-2 px-4 rounded block text-left hover:bg-gray-700" aria-expanded="false" id="ui-menu">
                    Giao diện <span class="right ml-2">&lt;</span>
                </button>
                <ul class="space-y-2 pl-6 hidden" id="ui-submenu">
                    <li><a href="/admin/menu" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Menu</a></li>
                    <li><a href="/admin/banner" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Banner</a></li>

                </ul>
            </li>
            <li><a href="/admin/contact" class="text-white hover:bg-gray-700 py-2 px-4 rounded block">Liên hệ</a></li>

        </ul>
    </nav>
</aside>

<script>
    // Tạo sự kiện click cho tất cả các nút menu
    function toggleSubmenu(menuId, submenuId, iconElement) {
        document.getElementById(menuId).addEventListener("click", function() {
            var submenu = document.getElementById(submenuId);
            var icon = iconElement;

            // Thay đổi trạng thái mở/đóng của submenu
            submenu.classList.toggle("hidden");

            // Thay đổi biểu tượng < và >
            if (submenu.classList.contains("hidden")) {
                icon.innerHTML = "&lt;"; // Biểu tượng < khi đóng
            } else {
                icon.innerHTML = "&gt;"; // Biểu tượng > khi mở
            }
        });
    }

    // Áp dụng cho từng menu
    toggleSubmenu("product-menu", "product-submenu", document.querySelector("#product-menu span"));
    toggleSubmenu("post-menu", "post-submenu", document.querySelector("#post-menu span"));
    toggleSubmenu("ui-menu", "ui-submenu", document.querySelector("#ui-menu span"));
</script> --}}