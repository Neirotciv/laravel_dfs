<x-layout>
    <div class="container mx-auto flex flex-wrap">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
</x-layout>