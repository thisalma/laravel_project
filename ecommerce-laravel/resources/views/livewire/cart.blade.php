<div>
    @if(session()->has('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($cart as $index => $item)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden p-4 text-center">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="h-40 w-full object-cover">
                    <h3 class="text-lg font-semibold text-pink-600 mt-2">{{ $item['name'] }}</h3>
                    <p class="text-gray-700 mt-1">Rs. {{ number_format($item['price'], 2) }}</p>

                    <button wire:click="remove({{ $index }})" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition mt-2">
                        Remove
                    </button>
                </div>
            @endforeach
        </div>

        <div class="text-right mt-4 text-lg font-bold text-pink-600">
            Total: Rs. {{ number_format(array_sum(array_column($cart, 'price')), 2) }}
        </div>
    @else
        <p class="text-center text-gray-700 text-lg">Your cart is empty.</p>
    @endif
</div>
