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
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                Add Product
            </button>
        </form>
        @endif

        <!-- Product Grid -->
        <div class="grid grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="border p-4 rounded shadow relative flex flex-col justify-between">
                    <!-- Product Image (click to open modal) -->
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}" 
                         class="w-full h-40 object-cover mb-2 cursor-pointer"
                         onclick="openModal({{ $product->id }})">

                    <h3 class="font-bold">{{ $product->name }}</h3>
                    <p>Rs. {{ number_format($product->price, 2) }}</p>

                    <!-- Add to Cart Button -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="mt-2 px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                            Add to Cart
                        </button>
                    </form>

                    @if($is_admin)
                    <form action="{{ route('products.destroy', $product) }}?admin=1234" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-2 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                            Remove
                        </button>
                    </form>
                    @endif
                </div>

                <!-- Modal -->
                <div id="modal-{{ $product->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white p-6 rounded shadow-lg w-1/2 relative">
                        <!-- Close Button -->
                        <button onclick="closeModal({{ $product->id }})" class="absolute top-2 right-2 text-gray-600">&times;</button>
                        
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400' }}" 
                             class="w-full h-80 object-cover mb-4 rounded">

                        <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                        <p class="text-lg font-semibold mb-4">Rs. {{ number_format($product->price, 2) }}</p>

                        <!-- Add to Cart in Modal -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'flex';
        }
        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }
    </script>
</x-app-layout>
