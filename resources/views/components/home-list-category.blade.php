

 <!-- Product Categories -->
 @foreach ($categorys as $categoryitem)
 <section class="py-12 my-6">
    <div class="container mx-auto px-2">
        <div class="flex flex-col md:flex-row md:justify-between items-center mb-8 mt-[30px]">
            <h1 class="text-4xl font-bold text-gray-500 relative right-[30px]">{{$categoryitem->name}}</h1>
            <ul class="flex space-x-4 relative " style="right:40px;">
                @php
                    $categoryid =$categoryitem->id;
                @endphp
            
                <x-sub-list-category :categoryid="$categoryid"/>
            </ul>
        </div>
        <div class="container mx-auto relative" style="left:5px;">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <x-home-product-category :categoryitem="$categoryitem" />
            </div>
        </div>
    </div>
</section>
 @endforeach
 