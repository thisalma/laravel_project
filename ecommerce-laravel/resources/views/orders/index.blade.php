<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">My Orders</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">
        @if($orders->isEmpty())
            <p class="text-center text-gray-600">You have no orders yet.</p>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="border p-4 rounded shadow bg-white">
                        <h3 class="font-bold text-lg mb-2">
                            Order #{{ $order->id }} 
                            <span class="text-sm text-gray-500">({{ $order->created_at->format('d M Y') }})</span>
                        </h3>
                        <p><strong>Total:</strong> Rs. {{ number_format($order->total, 2) }}</p>
                        <p><strong>Payment:</strong> {{ $order->payment_method }}</p>

                        <h4 class="mt-3 font-semibold">Items:</h4>
                        <ul class="list-disc pl-6">
                            @foreach($order->items as $item)
                                <li>
                                    {{ $item->name }} (x{{ $item->quantity }}) - 
                                    Rs. {{ number_format($item->price * $item->quantity, 2) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
