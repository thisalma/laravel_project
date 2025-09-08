<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-pink-600 leading-tight">
            My Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success message --}}
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Check if cart has items --}}
            @if(count($cart) > 0)
                <div class="flex flex-col gap-6">

                    {{-- Cart items grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($cart as $index => $item)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden p-4 text-center">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="h-40 w-full object-cover">
                                <h3 class="text-lg font-semibold text-pink-600 mt-2">{{ $item['name'] }}</h3>
                                <p class="text-gray-700 mt-1">Rs. {{ number_format($item['price'], 2) }}</p>

                                {{-- Remove from cart form --}}
                                <form action="{{ route('cart.remove', $index) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    {{-- Total price --}}
                    <div class="text-right mt-4 text-lg font-bold text-pink-600">
                        Total: Rs. {{ number_format(array_sum(array_column($cart, 'price')), 2) }}
                    </div>
                </div>
            @else
                <p class="text-center text-gray-700 text-lg">Your cart is empty.</p>
            @endif

            {{-- Link back to products --}}
            <div class="mt-6 text-center">
                <a href="{{ route('products') }}" class="px-6 py-3 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                    Continue Shopping
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
