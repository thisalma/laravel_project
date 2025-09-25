<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('cart.index') }}" 
               class="flex items-center px-3 py-1 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                <span class="text-lg mr-1">&larr;</span> Back
            </a>
            <h2 class="text-xl font-semibold text-gray-800">Checkout</h2>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        @if(empty($cart))
            <p class="text-center text-gray-600">Your cart is empty.</p>
        @else
            <!-- CUSTOMER INFO -->
            <h3 class="text-lg font-bold mb-2">Customer Information</h3>
            <div class="border p-4 rounded mb-6 bg-gray-50">
                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Contact Number:</strong> {{ Auth::user()->contact_number ?? '-' }}</p>
                <p><strong>Address:</strong> {{ Auth::user()->address ?? '-' }}</p>
            </div>

            <!-- ITEMS SECTION -->
            <h3 class="text-lg font-bold mb-4">Order Items</h3>
            <div class="space-y-4 mb-6">
                @foreach($cart as $item)
                    <div class="flex items-center border-b pb-4">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded mr-4">
                        <div class="flex-1">
                            <p class="font-semibold">{{ $item['name'] }}</p>
                            <p>Price: Rs. {{ number_format($item['price'], 2) }}</p>
                            <p>Quantity: {{ $item['quantity'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAYMENT SECTION -->
            <h3 class="text-lg font-bold mb-2">Payment Method</h3>
            <form method="POST" action="{{ route('checkout.process') }}">
                @csrf
                <div class="flex space-x-4 mb-4">
                    <label class="flex-1 border p-4 rounded cursor-pointer">
                        <input type="radio" name="payment_method" value="Card Payment" class="mr-2" id="card" onclick="toggleCardDetails()" required>
                        Card Payment
                    </label>
                    <label class="flex-1 border p-4 rounded cursor-pointer">
                        <input type="radio" name="payment_method" value="Cash on Delivery" class="mr-2" id="cod" onclick="toggleCardDetails()">
                        Cash on Delivery
                    </label>
                </div>

                <!-- Card Details -->
                <div id="card-details" class="hidden space-y-2 mb-4">
                    <input type="text" name="card_name" placeholder="Cardholder Name" class="w-full border p-2 rounded">
                    <input type="text" name="card_number" placeholder="Card Number" class="w-full border p-2 rounded">
                    <input type="text" name="expiry" placeholder="MM/YY" class="w-full border p-2 rounded">
                    <input type="text" name="cvv" placeholder="CVV" class="w-full border p-2 rounded">
                </div>

                <p class="text-red-600 text-sm mb-4">
                    *If you selected Cash on Delivery, please prepare the exact amount.
                </p>

                <!-- TOTALS -->
                <div class="text-right font-bold text-lg mb-4">
                    <p>Subtotal: Rs. {{ number_format($subtotal, 2) }}</p>
                    <p>Delivery Charge: Rs. {{ number_format($delivery_charge, 2) }}</p>
                    <p>Total: Rs. {{ number_format($grandTotal, 2) }}</p>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                        Confirm Order
                    </button>
                </div>
            </form>
        @endif
    </div>

    <script>
        function toggleCardDetails() {
            const cardBox = document.getElementById('card-details');
            const cardRadio = document.getElementById('card');
            cardBox.classList.toggle('hidden', !cardRadio.checked);
        }
    </script>
</x-app-layout>
