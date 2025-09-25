<x-app-layout>
    <div class="py-12 flex justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md text-center w-full max-w-lg">
            <h2 class="text-2xl font-bold text-green-600 mb-4">🎉 Order Confirmed!</h2>
            <p class="mb-2">Thank you, <strong>{{ $order->user->name }}</strong>!</p>
            <p class="mb-2">Your order number is:</p>
            <p class="text-3xl font-bold text-pink-500">#{{ $order->order_number }}</p>
            <p class="mt-4 text-gray-600">We’ll send a confirmation email to <strong>{{ $order->user->email }}</strong>.</p>

            <div class="mt-6">
                <a href="{{ route('products.index') }}" 
                   class="px-6 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
