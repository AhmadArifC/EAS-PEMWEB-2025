@extends('layouts.app')

@section('title', 'Produk')
@section('header', 'Daftar Produk')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <!-- Tombol Tambah Produk di kiri, warna biru -->
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-2 mb-md-0">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>

            <!-- Form Pencarian di kanan, warna hijau -->
            <form action="{{ route('products.index') }}" method="GET" class="form-inline ml-auto">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2"
                    placeholder="Cari produk...">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-search"></i> Cari Produk
                </button>
            </form>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete-confirm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada produk ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
@endsection
