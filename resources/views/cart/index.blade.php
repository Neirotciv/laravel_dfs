<x-layout>
    <pre>
    @foreach ($orders_products as $order_products)
        {{ print_r($order_products['products']) }}      
    @endforeach
    </pre>
</x-layout>