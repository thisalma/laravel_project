<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Shopping Cart</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">

        @if(session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if(empty($cart))
            <p>Your cart is empty.</p>
        @else
            <table class="w-full border-collapse border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Image</th>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Price</th>
                        <th class="border p-2">Quantity</th>
                        <th class="border p-2">Total</th>
                        <th class="border p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                        <tr>
                            <td class="border p-2">
                                <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://via.placeholder.com/100' }}" 
                                     class="w-20 h-20 object-cover">
                            </td>
                            <td class="border p-2">{{ $item['name'] }}</td>
                            <td class="border p-2">Rs. {{ number_format($item['price'], 2) }}</td>
                            <td class="border p-2 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Decrease Button -->
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="px-2 py-1 bg-pink-500 text-white rounded">−</button>
                                    </form>

                                    <!-- Quantity Display -->
                                    <span class="px-2">{{ $item['quantity'] }}</span>

                                    <!-- Increase Button -->
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="px-2 py-1 bg-pink-500 text-white rounded">+</button>
                                    </form>
                                </div>
                            </td>
                            <td class="border p-2">Rs. {{ number_format($total, 2) }}</td>
                            <td class="border p-2">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="px-2 py-1 bg-red-500 text-white rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-gray-100 font-bold">
                        <td colspan="4" class="border p-2 text-right">Grand Total</td>
                        <td class="border p-2">Rs. {{ number_format($grandTotal, 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
