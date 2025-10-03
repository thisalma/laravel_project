<x-app-layout>
    <div class="bg-pink-50 min-h-screen">

        <x-slot name="header">
            <h2 class="text-xl font-semibold text-pink-600 text-center">Our Products</h2>
        </x-slot>

        <div class="py-6 max-w-7xl mx-auto">
            @if(session('success'))
                <div class="bg-green-200 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <!-- Search Bar with Button -->
            <div class="mb-6 relative">
                <div class="flex">
                    <input type="text" id="searchInput" placeholder="Search products..."
                           class="border p-3 w-full rounded-l shadow focus:ring focus:ring-pink-200">
                    <button id="searchButton" class="bg-pink-500 text-white px-4 rounded-r hover:bg-pink-600 transition">
                        Search
                    </button>
                </div>
                <ul id="suggestions" class="absolute top-full left-0 w-full bg-white border rounded shadow mt-1 hidden z-50"></ul>
            </div>

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
            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="product-card border p-4 rounded shadow relative flex flex-col justify-between bg-white" data-name="{{ strtolower($product->name) }}">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}" 
                             class="w-full h-40 object-cover mb-2 cursor-pointer rounded"
                             onclick="openModal({{ $product->id }})">
                        <h3 class="font-bold text-pink-600">{{ $product->name }}</h3>
                        <p class="text-gray-700">Rs. {{ number_format($product->price, 2) }}</p>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-600 transition">
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
                    <div id="modal-{{ $product->id }}" 
                         class="fixed inset-0 bg-black bg-opacity-50 hidden overflow-y-auto z-50">
                        <div class="min-h-screen flex items-center justify-center p-6">
                            <div class="bg-white rounded shadow-lg w-3/4 max-w-3xl relative p-6">
                                <button onclick="closeModal({{ $product->id }})" 
                                        class="absolute top-2 right-2 text-gray-600 text-2xl">&times;</button>
                                <div class="w-full flex items-center justify-center mb-4">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400' }}" 
                                         class="max-h-[500px] max-w-full object-contain rounded">
                                </div>
                                <h2 class="text-2xl font-bold text-pink-600">{{ $product->name }}</h2>
                                <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                                <p class="text-lg font-semibold mb-4">Rs. {{ number_format($product->price, 2) }}</p>

                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-600 transition">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Script -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const suggestions = document.getElementById('suggestions');
        const productCards = document.querySelectorAll('.product-card');

        // --- Search Functionality ---
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.toLowerCase();
            suggestions.innerHTML = '';

            if (query) {
                let matches = [];
                productCards.forEach(card => {
                    const name = card.dataset.name;
                    if (name.includes(query)) matches.push(name);
                    card.style.display = 'none';
                });

                const uniqueMatches = [...new Set(matches)];
                if (uniqueMatches.length > 0) {
                    suggestions.classList.remove('hidden');
                    uniqueMatches.forEach(match => {
                        const li = document.createElement('li');
                        li.textContent = match;
                        li.className = 'px-4 py-2 cursor-pointer hover:bg-pink-100';
                        li.onclick = () => {
                            searchInput.value = match;
                            suggestions.classList.add('hidden');
                            performSearch(match);
                        };
                        suggestions.appendChild(li);
                    });
                } else {
                    suggestions.classList.add('hidden');
                }
            } else {
                suggestions.classList.add('hidden');
                productCards.forEach(card => card.style.display = 'block');
            }
        });

        searchButton.addEventListener('click', () => {
            performSearch(searchInput.value.toLowerCase());
        });

        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch(searchInput.value.toLowerCase());
            }
        });

        function performSearch(query) {
            suggestions.classList.add('hidden');
            productCards.forEach(card => {
                card.style.display = card.dataset.name.includes(query) ? 'block' : 'none';
            });
        }

        // --- Modal Functions ---
        function openModal(id) {
            const modal = document.getElementById(`modal-${id}`);
            if (modal) modal.classList.remove('hidden');
        }

        function closeModal(id) {
            const modal = document.getElementById(`modal-${id}`);
            if (modal) modal.classList.add('hidden');
        }

        // Close modal when clicking outside content
        document.querySelectorAll('[id^="modal-"]').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) modal.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>
