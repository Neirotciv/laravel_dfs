<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Ramsey\Uuid\Uuid;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Creates a new order for the specified user.
     *
     * @param User $user The user for whom to create the order.
     * @return Order The newly created order.
     */
    public function create($user): Order
    {
        $order = new Order([
            'user_id' => $user->id,
            'order_number' => Uuid::uuid4(),
            'paid' => false
        ]);

        $order->save();
        return $order;
    }


    /**
     * Retrieves the first unpaid order for the specified user.
     *
     * @param User $user The user whose unpaid order is to be retrieved.
     * @return Order|null The unpaid order, or null if no unpaid order exists.
     */
    public function getUnpaidOrder(User $user): Order|null
    {
        return $user->orders()->firstWhere('paid', false);
    }


    /**
     * Adds an item to a user's order.
     *
     * @param Request $request The Request object containing the details of the HTTP request.
     * @param int $id The ID of the product to add to the order.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the homepage with a success message.
     */
    public function addItem(Request $request, int $id): RedirectResponse
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
