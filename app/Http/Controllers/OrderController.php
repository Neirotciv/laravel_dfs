<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Ramsey\Uuid\Uuid;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create($user): int
    {
        $order = new Order([
            'user_id' => $user->id,
            'order_number' => Uuid::uuid4(),
            'paid' => false
        ]);

        $order->save();
        return $order;
    }

    public function getUnpaidOrder(User $user)
    {
        return $user->orders()->firstWhere('paid', false);
    }

    public function addItem(Request $request, int $id)
    {
        $user = auth()->user();
        $product =  Product::find($id);
        $order = $this->getUnpaidOrder($user);
    
        if (!$order) {
            $order = $this->create($user);
        }

        $order_product = new OrderProduct([
            'quantity' => 1,
            'unit_price' => $product->price,
            'order_id' => $order->id,
            'product_id' => $product->id
        ]);

        $order_product->save();
        $order_product_count = OrderProduct::where('order_id', $order->id)->count();

        $request->session()->put('product_count', $order_product_count);

        return redirect('/')->with('success', "{$product->name} rajouté au panier");
    }
}
