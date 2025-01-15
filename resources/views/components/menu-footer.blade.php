<div class="footer-menu grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 text-gray-300">
    @foreach ($menus as $menu)
        <div>
            <!-- Tiêu đề danh mục -->
            <h4 class="text-lg font-semibold text-white mb-4 border-b border-gray-600 pb-2">
                {{ $menu->name }}
            </h4>
            <!-- Submenu -->
            <x-sub-menu-footer :rowmenu="$menu->id" />
        </div>
    @endforeach
</div>
