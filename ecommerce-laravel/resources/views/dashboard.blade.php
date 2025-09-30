<x-app-layout>
    <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-pink-600 leading-tight text-center">
            Welcome to <span class="text-yellow-400">Foodies</span>
        </h2>
    </x-slot>

    <!-- Main Content -->
    <div class="pt-6 pb-12">
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
        <div class="mt-8 flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 gap-4">
            <!-- Left Box: FOOD -->
            <div class="w-1/2 bg-pink-400 text-white font-bold text-center py-12 rounded-lg shadow-lg">
                FOOD
            </div>

            <!-- Right Box: BEVERAGES -->
            <div class="w-1/2 bg-blue-700 text-black font-bold text-center py-12 rounded-lg shadow-lg">
                BEVERAGES
            </div>
        </div>

      <!-- About Section: Text + Image -->
<div class="mt-16 max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
    <!-- Left: Text Box -->
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

    <!-- Right: Image -->
    <div class="md:w-1/2 flex justify-center">
        <img src="{{ asset('images/f75db914-3205-45d4-aa3c-aa9b03a5dd6c.jpg') }}" 
             alt="About Foodies Image" 
             class="rounded-lg shadow-lg w-full h-[350px] md:h-[450px] object-cover">
    </div>
</div>

    </div>
</x-app-layout>
