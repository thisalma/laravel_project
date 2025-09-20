<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Our Products</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        @if(session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <!-- Admin Form -->
        @if($is_admin)
        <h2 class="font-bold mb-2">Add New Product</h2>
        <form method="POST" action="{{ route('products.store', ['admin' => '1234']) }}" enctype="multipart/form-data" class="mb-6 space-y-2">
            @csrf
            <input type="text" name="name" placeholder="Name" class="border p-2 w-full" required>
            <textarea name="description" placeholder="Description" class="border p-2 w-full" required></textarea>
            <input type="number" step="0.01" name="price" placeholder="Price" class="border p-2 w-full" required>
            <input type="file" name="image" class="border p-2 w-full">
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded">Add Product</button>
        </form>
        @endif

        <!-- Product Grid -->
        <div class="grid grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="border p-4 rounded shadow relative flex flex-col justify-between">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}" class="w-full h-40 object-cover mb-2">
                    <h3 class="font-bold">{{ $product->name }}</h3>
                    <p>Rs. {{ number_format($product->price, 2) }}</p>

                    @if($is_admin)
                    <form action="{{ route('products.destroy', $product) }}?admin=1234" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-2 px-2 py-1 bg-red-500 text-white rounded">Remove</button>
                    </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
