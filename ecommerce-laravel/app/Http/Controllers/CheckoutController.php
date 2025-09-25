<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order; // create this model if not already

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery_charge = 250.00;
        $grandTotal = $subtotal + $delivery_charge;

        return view('checkout.index', compact('cart', 'subtotal', 'delivery_charge', 'grandTotal'));
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        $cart = session('cart', []);

        // ✅ Check profile completeness
        if (empty($user->contact_number) || empty($user->address)) {
            return redirect()->back()->with('error', 'Please complete your profile (contact & address) before confirming order.');
        }

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // ✅ Generate order number (increment per user)
        $lastOrder = Order::where('user_id', $user->id)->latest()->first();
        $orderNumber = $lastOrder ? $lastOrder->order_number + 1 : 1;

        // ✅ Save order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => $orderNumber,
            'total' => $request->grandTotal ?? 0,
            'payment_method' => $request->payment_method,
        ]);

        // Optionally save items
        foreach ($cart as $item) {
            $order->items()->create([
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('checkout.success', ['order' => $order->id]);
    }

    // ✅ Success page
    public function success($orderId)
    {
        $order = Order::with('user')->findOrFail($orderId);
        return view('checkout.success', compact('order'));
    }
}
