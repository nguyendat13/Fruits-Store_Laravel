        @foreach ($products as $productitem)
            <x-product-card :productitem="$productitem" />
        @endforeach
        