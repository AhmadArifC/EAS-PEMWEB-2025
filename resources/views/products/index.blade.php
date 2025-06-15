<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --danger: #f72585;
            --success: #4cc9f0;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --border: #dee2e6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
        }

        .main-content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 10px;
        }

        .search-container {
            position: relative;
            width: 300px;
        }

        .search-container input {
            width: 100%;
            padding: 10px 15px 10px 35px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 14px;
        }

        .search-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .btn-add {
            padding: 10px 15px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #3a56d4;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform .3s, box-shadow .3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            height: 150px;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }

        .product-image img {
            max-height: 100%;
            object-fit: contain;
        }

        .product-details {
            padding: 15px;
        }

        .product-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .product-stock {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .stock-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 8px;
        }

        .in-stock {
            background-color: var(--success);
        }

        .low-stock {
            background-color: var(--danger);
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            flex: 1;
            text-align: center;
            transition: opacity .3s;
        }

        .btn-edit {
            background-color: var(--primary);
            color: white;
        }

        .btn-delete {
            background-color: var(--danger);
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>

    <div class="main-content">
        {{-- Header + Search + Add --}}
        <div class="header">

            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" id="search" placeholder="Cari produk...">
            </div>
            <button class="btn-add" id="btn-add">
                <i class="fas fa-plus"></i>
                Tambah Produk
            </button>
        </div>

        {{-- Grid Produk --}}
        <div class="product-grid" id="product-grid">
            <!-- Static contoh, bisa Anda loop dari $products -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/produk1.jpg') }}" alt="Lampu Tertial">
                </div>
                <div class="product-details">
                    <div class="product-name">Lampu Tertial</div>
                    <div class="product-price">Rp 249.000</div>
                    <div class="product-stock">
                        <span class="stock-indicator in-stock"></span> Stok: 56
                    </div>
                    <div class="product-actions">
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Hapus</button>
                    </div>
                </div>
            </div>
            <!-- ulangi untuk produk lain... -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const productCards = document.querySelectorAll('.product-card');

            searchInput.addEventListener('input', function() {
                const term = this.value.toLowerCase();
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent
                        .toLowerCase();
                    if (productName.includes(term)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-app-layout>
