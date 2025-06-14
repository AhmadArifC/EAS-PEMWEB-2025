<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <!-- Contoh Card Produk 1 -->
                        <div class="bg-gray-100 rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="{{ asset('images/produk1.jpg') }}" alt="Produk 1"
                                class="w-32 h-32 object-cover rounded mb-3">
                            <div class="font-bold text-lg mb-1">Nama Produk 1</div>
                            <div class="text-green-600 font-semibold mb-1">Rp 50.000</div>
                            <div class="text-sm text-gray-600">Stok: 10</div>
                        </div>
                        <!-- Contoh Card Produk 2 -->
                        <div class="bg-gray-100 rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="{{ asset('images/produk2.jpg') }}" alt="Produk 2"
                                class="w-32 h-32 object-cover rounded mb-3">
                            <div class="font-bold text-lg mb-1">Nama Produk 2</div>
                            <div class="text-green-600 font-semibold mb-1">Rp 75.000</div>
                            <div class="text-sm text-gray-600">Stok: 5</div>
                        </div>
                        <!-- Contoh Card Produk 3 -->
                        <div class="bg-gray-100 rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="{{ asset('images/produk3.jpg') }}" alt="Produk 3"
                                class="w-32 h-32 object-cover rounded mb-3">
                            <div class="font-bold text-lg mb-1">Nama Produk 3</div>
                            <div class="text-green-600 font-semibold mb-1">Rp 120.000</div>
                            <div class="text-sm text-gray-600">Stok: 2</div>
                        </div>
                        <!-- Contoh Card Produk 4 -->
                        <div class="bg-gray-100 rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="{{ asset('images/produk4.jpg') }}" alt="Produk 4"
                                class="w-32 h-32 object-cover rounded mb-3">
                            <div class="font-bold text-lg mb-1">Nama Produk 4</div>
                            <div class="text-green-600 font-semibold mb-1">Rp 90.000</div>
                            <div class="text-sm text-gray-600">Stok: 7</div>
                        </div>
                        <!-- Tambahkan card produk lain sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
