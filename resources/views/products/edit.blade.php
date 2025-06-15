<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Produk')
@section('header', 'Edit Produk')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Produk</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $product->name) }}" required>
                </div>

                <!-- Kategori Produk -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori Produk</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga -->
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="{{ old('price', $product->price) }}" required>
                </div>

                <!-- Stok -->
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                        value="{{ old('stock', $product->stock) }}" required>
                </div>

                <!-- Upload Gambar -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk (kosongkan jika tidak diganti)</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <!-- Gambar Saat Ini -->
                @if ($product->image)
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="120">
                    </div>
                @endif

                <!-- Tombol Aksi -->
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@endsection
