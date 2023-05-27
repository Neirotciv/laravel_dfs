<x-layout>
    @foreach ($orders as $order)
    <h2 class="mb-4 text-xl font-bold">Commande {{ $order->order_number }}</h2>
        <table class="mb-12">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td class="px-4">{{ $product->name }}</td>
                        <td class="px-4">{{ $product->price }}</td>
                        <td class="px-4">{{ $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</x-layout>