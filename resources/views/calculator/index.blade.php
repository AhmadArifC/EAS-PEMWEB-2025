<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kalkulator Produk
        </h2>
    </x-slot>

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

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        select,
        input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 16px;
        }

        .btn {
            padding: 10px 22px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #4361ee 60%, #4895ef 100%);
            color: #fff;
            box-shadow: 0 2px 8px rgba(67, 97, 238, 0.08);
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #4895ef 60%, #4361ee 100%);
            box-shadow: 0 4px 16px rgba(67, 97, 238, 0.13);
        }

        .btn-secondary {
            background-color: var(--gray);
            color: white;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .product-list {
            margin: 30px 0;
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
        }

        .product-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-list th,
        .product-list td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        .product-list th {
            background-color: var(--light);
        }

        .product-list tr:last-child td {
            border-bottom: none;
        }

        .btn-remove {
            color: var(--danger);
            background: none;
            border: none;
            cursor: pointer;
        }

        .total-section {
            background-color: var(--light);
            padding: 20px;
            border-radius: 6px;
            margin-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .grand-total {
            font-weight: bold;
            font-size: 18px;
            border-top: 1px solid var(--border);
            padding-top: 10px;
            margin-top: 10px;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
            margin-top: 20px;
            gap: 10px;
        }

        .empty-message {
            text-align: center;
            padding: 20px;
            color: var(--gray);
        }

        #modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(107, 114, 128, 0.75);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        #modal.active {
            display: flex;
        }
    </style>

    <!-- Modal untuk Pop-Up -->
    <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-lg font-semibold text-gray-800">Peringatan</h2>
            <p class="text-gray-600 mt-2" id="modal-message">Silakan pilih produk terlebih dahulu</p>
            <button id="close-modal"
                class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">OK</button>
        </div>
    </div>

    <div class="container">

        <div class="form-group">
            <label for="product">Pilih Produk</label>
            <select id="product" class="form-control">
                <option value="">-- Pilih Produk --</option>
                <option value="1" data-price="249000">Lampu Tertial - Rp 249.000</option>
                <option value="2" data-price="1299000">Meja Kerja Malm - Rp 1.299.000</option>
                <option value="3" data-price="3499000">Lemari Pax - Rp 3.499.000</option>
                <option value="4" data-price="899000">Rak Billy - Rp 899.000</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Jumlah/Kuantitas</label>
            <input type="number" id="quantity" min="1" value="1" class="form-control">
        </div>
        <div class="action-buttons">
            <button id="add-product" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Produk
            </button>
        </div>
        <div class="product-list">
            <table id="selected-products">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Kuantitas</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="empty-row">
                        <td colspan="5" class="empty-message">Belum ada produk ditambahkan</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total-section" id="total-section" style="display: none;">
            <div class="total-row">
                <span>Total Item:</span>
                <span id="total-items">0</span>
            </div>
            <div class="total-row grand-total">
                <span>Total Harga:</span>
                <span id="grand-total">Rp 0</span>
            </div>
        </div>
        <div class="action-buttons">
            <button id="calculate-total" class="btn btn-primary" style="display: none;">
                <i class="fas fa-calculator"></i> Hitung Total
            </button>
            <button id="reset-calculator" class="btn btn-secondary">
                <i class="fas fa-redo"></i> Reset
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product');
            const quantityInput = document.getElementById('quantity');
            const addProductBtn = document.getElementById('add-product');
            const calculateTotalBtn = document.getElementById('calculate-total');
            const resetBtn = document.getElementById('reset-calculator');
            const productsTable = document.getElementById('selected-products').getElementsByTagName('tbody')[0];
            const emptyRow = document.querySelector('.empty-row');
            const totalSection = document.getElementById('total-section');
            const modal = document.getElementById('modal');
            const modalMessage = document.getElementById('modal-message');
            const closeModalBtn = document.getElementById('close-modal');

            let products = [];

            const formatRupiah = number =>
                'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            function showModal(message) {
                modalMessage.textContent = message;
                modal.classList.remove('hidden');
                modal.classList.add('active');
            }

            closeModalBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('active');
            });

            addProductBtn.addEventListener('click', function() {
                if (!productSelect.value) {
                    showModal('Silakan pilih produk terlebih dahulu');
                    return;
                }
                if (quantityInput.value <= 0) {
                    showModal('Kuantitas harus lebih dari 0');
                    return;
                }
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                const productId = selectedOption.value;
                const productName = selectedOption.text.split(' - ')[0];
                const price = parseInt(selectedOption.getAttribute('data-price'));
                const quantity = parseInt(quantityInput.value);
                const subtotal = price * quantity;

                products.push({
                    id: productId,
                    name: productName,
                    price,
                    quantity,
                    subtotal
                });
                updateProductsTable();
                productSelect.value = '';
                quantityInput.value = 1;
                calculateTotalBtn.style.display = 'block';
                if (emptyRow) emptyRow.style.display = 'none';
            });

            calculateTotalBtn.addEventListener('click', calculateTotal);

            resetBtn.addEventListener('click', function() {
                products = [];
                updateProductsTable();
                totalSection.style.display = 'none';
                calculateTotalBtn.style.display = 'none';
                if (emptyRow) emptyRow.style.display = '';
            });

            function updateProductsTable() {
                productsTable.innerHTML = '';
                if (products.length === 0) {
                    productsTable.appendChild(emptyRow);
                    emptyRow.style.display = '';
                    return;
                }
                products.forEach((product, index) => {
                    const row = productsTable.insertRow();
                    row.innerHTML = `
                        <td>${product.name}</td>
                        <td>${formatRupiah(product.price)}</td>
                        <td>${product.quantity}</td>
                        <td>${formatRupiah(product.subtotal)}</td>
                        <td>
                            <button class="btn-remove" data-index="${index}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;
                });
                document.querySelectorAll('.btn-remove').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));
                        products.splice(index, 1);
                        updateProductsTable();
                        if (products.length === 0) {
                            totalSection.style.display = 'none';
                            calculateTotalBtn.style.display = 'none';
                        }
                    });
                });
            }

            function calculateTotal() {
                const totalItems = products.reduce((sum, product) => sum + product.quantity, 0);
                const grandTotal = products.reduce((sum, product) => sum + product.subtotal, 0);
                document.getElementById('total-items').textContent = totalItems;
                document.getElementById('grand-total').textContent = formatRupiah(grandTotal);
                totalSection.style.display = 'block';
            }
        });
    </script>
</x-app-layout>
