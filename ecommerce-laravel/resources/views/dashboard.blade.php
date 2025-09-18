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

        <!-- Full-Width Image Section -->
        <div class="mt-6 w-screen">
            <img src="{{ asset('images/food-pictures.jpg') }}" 
                 alt="Food Image" 
                 class="w-full h-[400px] object-cover">
        </div>
    </div>
</x-app-layout>
