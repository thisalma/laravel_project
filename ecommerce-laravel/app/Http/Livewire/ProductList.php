<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ProductForm extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $image;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable',
        'price' => 'required|numeric',
        'image' => 'nullable|image|max:2048', // 2MB max
    ];

    public function save()
    {
        $this->validate();

        $path = null;
        if ($this->image) {
            $path = $this->image->store('products', 'public'); 
        }

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $path,
        ]);

        session()->flash('message', 'Product added successfully!');

        $this->reset(); // reset form
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
