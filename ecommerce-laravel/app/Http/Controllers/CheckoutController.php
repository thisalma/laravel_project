<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Save order logic here
        // Example: loop through cart and create Order models
        // $request->payment_method will have 'Card Payment' or 'Cash on Delivery'

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Order confirmed!');
    }
}
