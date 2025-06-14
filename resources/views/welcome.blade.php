<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Suryana Project</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] min-h-screen flex flex-col">
    <header class="w-full max-w-7xl mx-auto py-6 px-4 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/suryana_logo.png') }}" alt="Logo" class="w-9 h-9 rounded-full shadow">
            <span class="text-2xl font-bold text-[#f53003]">Suryana Project</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('perhitungan') }}"
                class="px-4 py-2 rounded bg-[#4361ee] text-white font-semibold hover:bg-[#4895ef] transition">
                <i class="fas fa-calculator mr-1"></i> Kalkulator
            </a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-4 py-2 rounded bg-[#f53003] text-white font-semibold hover:bg-[#c41e00]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded border border-[#f53003] text-[#f53003] font-semibold hover:bg-[#f53003] hover:text-white">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded border border-[#f53003] text-[#f53003] font-semibold hover:bg-[#f53003] hover:text-white ml-2">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <main class="flex-1 w-full max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Produk</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Card Produk 1 -->
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <img src="{{ asset('images/produk1.jpg') }}" alt="Produk 1" class="w-32 h-32 object-cover rounded mb-3">
                <div class="font-bold text-lg mb-1">Nama Produk 1</div>
                <div class="text-green-600 font-semibold mb-1">Rp 50.000</div>
                <div class="text-sm text-gray-600">Stok: 10</div>
            </div>
            <!-- Card Produk 2 -->
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <img src="{{ asset('images/produk2.jpg') }}" alt="Produk 2" class="w-32 h-32 object-cover rounded mb-3">
                <div class="font-bold text-lg mb-1">Nama Produk 2</div>
                <div class="text-green-600 font-semibold mb-1">Rp 75.000</div>
                <div class="text-sm text-gray-600">Stok: 5</div>
            </div>
            <!-- Card Produk 3 -->
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <img src="{{ asset('images/produk3.jpg') }}" alt="Produk 3" class="w-32 h-32 object-cover rounded mb-3">
                <div class="font-bold text-lg mb-1">Nama Produk 3</div>
                <div class="text-green-600 font-semibold mb-1">Rp 120.000</div>
                <div class="text-sm text-gray-600">Stok: 2</div>
            </div>
            <!-- Card Produk 4 -->
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <img src="{{ asset('images/produk4.jpg') }}" alt="Produk 4" class="w-32 h-32 object-cover rounded mb-3">
                <div class="font-bold text-lg mb-1">Nama Produk 4</div>
                <div class="text-green-600 font-semibold mb-1">Rp 90.000</div>
                <div class="text-sm text-gray-600">Stok: 7</div>
            </div>
            <!-- Tambahkan card produk lain sesuai kebutuhan -->
        </div>
    </main>

    <footer class="w-full max-w-7xl mx-auto py-6 px-4 text-center text-sm text-[#706f6c]">
        &copy; {{ date('Y') }} Suryana Project. All rights reserved.
    </footer>
</body>

</html>
