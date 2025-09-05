<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // For now, we can send dummy products
        $products = [
            ['name' => 'Pasta', 'price' => 300, 'image' => 'images/3.PNG'],
            ['name' => 'Orange Juice', 'price' => 1000, 'image' => 'images/download_22.jpg'],
            ['name' => 'Sause', 'price' => 1000, 'image' => 'images/Gilleth Shave Gel (2).png'],
            ['name' => 'Oats', 'price' => 2.99, 'image' => 'images/Screenshot_20250319_185957_WhatsApp.jpg'],
        ];

        return view('products', compact('products'));
    }
}
