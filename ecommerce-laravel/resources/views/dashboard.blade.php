<x-app-layout>
    <!-- Page Wrapper with Light Pink Background -->
    <div class="bg-pink-50 min-h-screen flex flex-col">

        <!-- Header Slot -->
        <x-slot name="header">
            <h2 class="font-bold text-2xl text-pink-600 leading-tight text-center">
                Welcome to <span class="text-yellow-400">Foodies</span>
            </h2>
        </x-slot>

        <!-- Main Content -->
        <div class="pt-6 pb-12 flex-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Text Box -->
                <div class="bg-gradient-to-r from-pink-300 via-pink-400 to-pink-500 overflow-hidden shadow-xl sm:rounded-lg p-12 flex items-center justify-center -mt-4">
                    <h1 class="text-5xl font-extrabold text-white text-center shadow-lg p-6 rounded-lg">
                        Discover the Best Food & Beverages!
                    </h1>
                </div>
            </div>

            <!-- Full-Width Image -->
            <div class="w-screen overflow-hidden mt-6">
                <img src="{{ asset('images/food-pictures.jpg') }}" 
                     alt="Food Image" 
                     class="w-full h-[250px] sm:h-[300px] md:h-[400px] object-cover">
            </div>

            <!-- Two Small Boxes -->
            <div class="mt-8 flex flex-col items-center max-w-7xl mx-auto sm:px-6 lg:px-8 gap-4">
                <div class="flex w-full gap-4">
                    <div class="w-1/2 bg-pink-400 text-white font-bold text-center py-12 rounded-lg shadow-lg">
                        FOOD
                    </div>
                    <div class="w-1/2 bg-blue-700 text-black font-bold text-center py-12 rounded-lg shadow-lg">
                        BEVERAGES
                    </div>
                </div>

                <!-- Go to Products Button -->
                <div class="mt-6">
                    <a href="{{ route('products.index') }}" 
                       class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded-lg shadow-lg transition">
                        Go to Products Page
                    </a>
                </div>
            </div>

            <!-- About Section: Text + Image -->
            <div class="mt-16 max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2 bg-white p-8 rounded-lg shadow-lg flex flex-col justify-center h-full">
                    <h2 class="text-3xl font-bold text-pink-600 mb-4 text-center md:text-left">
                        About Foodies
                    </h2>
                    <p class="text-gray-700 text-lg leading-relaxed text-center md:text-left">
                        Foodies is a unique platform bringing high-quality exported food and beverages to Sri Lankan customers.
                        We ensure authentic products and a seamless shopping experience, making it easier for people in Sri Lanka
                        to enjoy international flavors at their doorstep.
                    </p>
                </div>

                <div class="md:w-1/2 flex justify-center">
                    <img src="{{ asset('images/f75db914-3205-45d4-aa3c-aa9b03a5dd6c.jpg') }}" 
                         alt="About Foodies Image" 
                         class="rounded-lg shadow-lg w-full h-[350px] md:h-[450px] object-cover">
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-pink-700 text-white mt-auto">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Footer Left: Branding -->
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold text-yellow-400">Foodies</h3>
                    <p class="text-gray-200 mt-1">High-quality imported food & beverages delivered to your doorstep.</p>
                </div>

                <!-- Footer Right: Contact -->
                <div class="text-center md:text-right">
                    <h4 class="font-bold mb-2">Contact</h4>
                    <p>Email: <span class="text-yellow-400">info@foodies.com</span></p>
                    <p>Phone: <span class="text-yellow-400">+94 123 456 789</span></p>
                    <p>Address: <span class="text-yellow-400">Colombo, Sri Lanka</span></p>
                </div>
            </div>

            <!-- Bottom -->
            <div class="bg-pink-800 text-gray-300 text-center py-4">
                &copy; {{ date('Y') }} Foodies. All rights reserved.
            </div>
        </footer>

    </div>
</x-app-layout>
