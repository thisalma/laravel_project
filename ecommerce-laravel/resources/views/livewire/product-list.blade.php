<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-xl font-bold mb-4">All Products</h2>

    @if ($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="border rounded p-4 shadow">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-40 object-cover mb-2 rounded">
                    @endif
                    <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="font-bold mt-2">${{ $product->price }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No products found.</p>
    @endif
</div>
