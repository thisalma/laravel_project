<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderApiController extends Controller
{
    public function store(Request $request)
{
    try {
        $request->validate([
            'items' => 'required|array|min:1',
            'total' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $user = $request->user(); // or Auth::guard('sanctum')->user()

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => rand(1000, 9999),
            'total' => $request->total,
            'payment_method' => $request->payment_method,
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully',
            'order_id' => $order->id,
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to place order',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
