<nav class="flex justify-between bg-gray-400 items-center px-4 py-2 shadow-lg relative left-[450px] bottom-[20px]">
    <ul class="flex space-x-4">
        @foreach ($menus as $menuitem)
            <x-sub-main-menu :menuitem="$menuitem" />
        @endforeach
    </ul>
    <div class="md:hidden visible text-white">
        <i class="fa-solid fa-bars-staggered"></i>
    </div>
</nav>
