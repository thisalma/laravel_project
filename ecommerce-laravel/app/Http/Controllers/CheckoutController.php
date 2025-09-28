<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        $cart = session('cart', []);

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery_charge = 250.00;
        $grandTotal = $subtotal + $delivery_charge;

        return view('checkout.index', compact('cart', 'subtotal', 'delivery_charge', 'grandTotal'));
    }

    // Process order
    public function process(Request $request)
    {
        $user = Auth::user();
        $cart = session('cart', []);

        // ✅ Check if profile is complete
        if (empty($user->contact_number) || empty($user->address)) {
            return redirect()->back()->with('error', 'Please complete your profile (contact & address) before confirming order.');
        }

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // ✅ Calculate totals
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $delivery_charge = 250.00;
        $grandTotal = $subtotal + $delivery_charge;

        // ✅ Generate order number
        $lastOrder = Order::where('user_id', $user->id)->latest()->first();
        $orderNumber = $lastOrder ? $lastOrder->order_number + 1 : 1;

        // ✅ Save order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => $orderNumber,
            'total' => $grandTotal,
            'payment_method' => $request->payment_method,
        ]);

        // ✅ Save items
        foreach ($cart as $item) {
            $order->items()->create([
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        // ✅ Redirect to success page
        return redirect()->route('checkout.success', ['order' => $order->id]);
    }

    // Show order success page
    public function success(Order $order)
    {
        // ✅ Make sure the logged-in user owns the order
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('checkout.success', compact('order'));
    }
}
