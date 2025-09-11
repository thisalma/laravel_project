<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $index => $product)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="h-40 w-full object-cover">
            <div class="p-4 text-center">
                <h3 class="text-lg font-semibold text-pink-600">{{ $product['name'] }}</h3>
                <p class="text-gray-700 mt-2">Rs. {{ number_format($product['price'], 2) }}</p>

                <button wire:click="addToCart({{ $index }})"
                        class="mt-4 px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                    Add to Cart
                </button>
            </div>
        </div>
    @endforeach
</div>
