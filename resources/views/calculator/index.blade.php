@extends('layouts.app')

@section('title', 'Kalkulator Produk')
@section('header', 'Kalkulator Produk')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kalkulator Produk</h4>
        </div>
        <div class="card-body">
            <form id="calculator-form">
                <div class="form-group">
                    <label for="product">Pilih Produk</label>
                    <select id="product" class="form-control">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->name }}" data-price="{{ $product->price }}">
                                {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah/Kuantitas</label>
                    <input type="number" id="quantity" min="1" value="1" class="form-control">
                </div>
                <button type="button" id="add-product" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Produk
                </button>
            </form>

            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="selected-products">
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
                            <td colspan="5" class="text-center text-muted">Belum ada produk ditambahkan</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4" id="total-section" style="display: none;">
                <div class="d-flex justify-content-between">
                    <span><strong>Total Item:</strong></span>
                    <span id="total-items">0</span>
                </div>
                <div class="d-flex justify-content-between mt-2 border-top pt-2">
                    <span><strong>Total Harga:</strong></span>
                    <span id="grand-total">Rp 0</span>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <button type="button" id="calculate-total" class="btn btn-success" style="display: none;">
                    <i class="fas fa-calculator"></i> Hitung Total
                </button>
                <button type="button" id="reset-calculator" class="btn btn-danger">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
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

            let products = [];

            const formatRupiah = (number) => 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            addProductBtn.addEventListener('click', function() {
                if (productSelect.value === '') {
                    alert('Silakan pilih produk terlebih dahulu');
                    return;
                }
                if (quantityInput.value <= 0) {
                    alert('Kuantitas harus lebih dari 0');
                    return;
                }

                const selectedOption = productSelect.options[productSelect.selectedIndex];
                const productName = selectedOption.value;
                const price = parseInt(selectedOption.getAttribute('data-price'));
                const quantity = parseInt(quantityInput.value);
                const subtotal = price * quantity;

                products.push({
                    name: productName,
                    price,
                    quantity,
                    subtotal
                });

                updateProductsTable();
                productSelect.value = '';
                quantityInput.value = 1;
                calculateTotalBtn.style.display = 'inline-block';
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
                    <td><button class="btn btn-sm btn-danger btn-remove" data-index="${index}"><i class="fas fa-trash"></i></button></td>
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
@endpush
