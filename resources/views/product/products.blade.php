<x-layout>
    <x-categories :categories="$categories" />
    
    <div id="products" class="flex flex-wrap">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
</x-layout>