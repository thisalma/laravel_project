<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display products
    public function index(Request $request)
    {
        $is_admin = $request->query('admin') === '1234';

        $categories = Product::select('category')->distinct()->pluck('category');
        $category_filter = $request->query('category', '');

        $products = Product::when($category_filter, function ($q, $category_filter) {
            $q->where('category', $category_filter);
        })->orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products', 'categories', 'category_filter', 'is_admin'));
    }

    // Store new product (admin)
    public function store(Request $request)
    {
        $is_admin = $request->query('admin') === '1234';

        if (!$is_admin) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index', ['admin' => '1234'])->with('success', 'Product added!');
    }

    // Delete product (admin)
    public function destroy(Request $request, Product $product)
    {
        $is_admin = $request->query('admin') === '1234';

        if (!$is_admin) {
            abort(403);
        }

        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index', ['admin' => '1234'])->with('success', 'Product deleted!');
    }
}
