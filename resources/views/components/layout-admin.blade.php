<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
        integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include("components.alert")
    @vite('resources/css/app.css')
    <title>{{$title ?? 'Admin'}}</title>
    {{$header ?? ""}}
</head>
<div class="flex">
    <header >
        <aside class="w-64 h-full bg-gray-800 text-white min-h-screen p-4">
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
        </script>
    </header>
    <main>{{$slot}}</main>
    {{$footer ?? ""}}
</div>
</html>