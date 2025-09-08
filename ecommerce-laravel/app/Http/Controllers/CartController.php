<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show cart items
    public function index() {
    $cart = session()->get('cart', []);
    return view('cart', compact('cart'));
}

public function add(Request $request) {
    $product = $request->only(['name','price','image']);
    $cart = session()->get('cart', []);
    $cart[] = $product;
    session(['cart' => $cart]);
    return redirect()->route('cart.index')->with('success', $product['name'].' added to cart!');
}

public function remove($index) {
    $cart = session()->get('cart', []);
    if(isset($cart[$index])) {
        unset($cart[$index]);
        session(['cart' => array_values($cart)]); // reindex
    }
    return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
}
}
