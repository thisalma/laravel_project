<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-pink-600 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('product-list')

        </div>
    </div>
</x-app-layout>
