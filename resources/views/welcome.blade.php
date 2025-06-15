<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suryana Project</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- HEADER --}}
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/suryana_logo.png') }}" alt="Logo"
                    class="w-10 h-10 rounded-full shadow-sm">
                <span class="ml-3 text-2xl font-extrabold text-indigo-600">Suryana Project</span>
            </div>
            <div class="flex items-center space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="border border-indigo-600 text-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                            Login
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 max-w-7xl mx-auto px-6 py-12">

        {{-- SEARCH --}}
        <form method="GET" action="{{ url('/') }}" class="flex flex-col md:flex-row gap-4 mb-12">
            <input name="search" value="{{ request('search') }}"
                placeholder="Cari produk berdasarkan nama atau kategori..."
                class="flex-1 px-5 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                id="search" />
            <button type="submit"
                class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700 transition">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>

        {{-- PRODUCT GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition">
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="h-full object-cover" />
                        @else
                            <i class="fas fa-box-open text-gray-300 text-5xl"></i>
                        @endif
                    </div>
                    <div class="p-5">
                        <h2 class="font-semibold text-xl mb-2">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-500 mb-3">
                            Kategori: <span class="font-medium">{{ $product->category->name ?? '–' }}</span>
                        </p>
                        {{-- Harga --}}
                        <div class="text-indigo-600 font-bold text-lg mb-1">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                        {{-- Stok di bawah harga --}}
                        <div class="text-sm text-gray-600">
                            Stok: {{ $product->stock }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    Belum ada produk tersedia.
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-10">
            {{ $products->withQueryString()->links() }}
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Suryana Project. All rights reserved.
        </div>
    </footer>

    {{-- BLUR SEARCH INPUT WHEN CLICKING OUTSIDE TO HIDE CARET --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search');
            document.addEventListener('mousedown', (e) => {
                if (searchInput && !searchInput.contains(e.target)) {
                    searchInput.blur();
                }
            });
        });
    </script>
</body>

</html>
