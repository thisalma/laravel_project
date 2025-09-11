<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];

    protected $listeners = ['cartUpdated' => 'refreshCart'];

    public function mount()
    {
        $this->refreshCart();
    }

    public function refreshCart()
    {
        $this->cart = session()->get('cart', []);
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);
        unset($cart[$index]);
        $cart = array_values($cart);
        session()->put('cart', $cart);
        $this->refreshCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
