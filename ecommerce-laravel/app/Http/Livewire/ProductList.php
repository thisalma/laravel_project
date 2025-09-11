<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductList extends Component
{
    public $products = [];

    public function mount()
    {
        // Example products — later you can load from DB
        $this->products = [
            ['name' => 'Pasta', 'price' => 300, 'image' => 'images/3.PNG'],
            ['name' => 'Orange Juice', 'price' => 1000, 'image' => 'images/download_22.jpg'],
            ['name' => 'Sauce', 'price' => 1000, 'image' => 'images/Gilleth Shave Gel (2).png'],
            ['name' => 'Oats', 'price' => 2000, 'image' => 'images/Screenshot_20250319_185957_WhatsApp.jpg'],
        ];
    }

    public function addToCart($index)
    {
        $cart = session()->get('cart', []);
        $cart[] = $this->products[$index];
        session()->put('cart', $cart);

        $this->emit('cartUpdated'); // notify Cart component
        session()->flash('success', $this->products[$index]['name'] . ' added to cart!');
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
