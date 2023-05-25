<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Ramsey\Uuid\Uuid;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(): int
    {
        $order = new Order([
            'user_id' => auth()->user()->id,
            'order_number' => Uuid::uuid4(),
            'paid' => false
        ]);
        $order->save();
        return $order->id;
    }

    public function addItem(Request $request, Product $id)
    {
        // Vérifier si une commande non payé est associé à l'utilisateur
        // Oui -> on ajoute le produit
        $products = Product::all();
        $product =  $products->find($id);
        
        // Non -> création d'une commande
        $order_id = $this->create();

        $order_product = new OrderProduct([
            'quantity' => 1,
            'unit_price' => $product->price,
            'order_id' => $order_id,
            'product_id' => $product->id
        ]);
        $order_product->save();

        $request->session()->put('cart_items', );

        return redirect('/')->with('success', "{$product->name} rajouté au panier");
    }
}
