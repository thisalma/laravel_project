<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <!-- Back Button -->
            <a href="{{ route('cart.index') }}" 
               class="flex items-center px-3 py-1 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                <span class="text-lg mr-1">&larr;</span> Back
            </a>
            <h2 class="text-xl font-semibold text-gray-800">Checkout</h2>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">

        @if(empty($cart))
            <p>Your cart is empty.</p>
        @else
            <h3 class="text-lg font-bold mb-4">Order Summary</h3>
            <ul class="mb-6">
                @foreach($cart as $item)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                        <span>Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="font-bold text-lg mb-4">
                Total: Rs. {{ number_format($grandTotal, 2) }}
            </div>

            <form method="POST" action="#">
                @csrf
                <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                    Confirm Order
                </button>
            </form>
        @endif
    </div>
</x-app-layout>
