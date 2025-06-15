@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <!-- Total Produk -->
        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-boxes"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Produk</span>
                    <span class="info-box-number">{{ $productsCount }}</span>
                    <a href="{{ route('products.index') }}" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fas fa-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kategori</span>
                    <span class="info-box-number">{{ $categoriesCount }}</span>
                    <a href="{{ route('categories.index') }}" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Total User -->
        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengguna</span>
                    <span class="info-box-number">{{ $usersCount }}</span>
                    <a href="{{ route('users.index') }}" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Stok Rendah -->
        <div class="col-md-3 col-sm-6">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fas fa-exclamation-triangle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Stok Rendah</span>
                    <span class="info-box-number">{{ $lowStockCount }}</span>
                    <a href="{{ route('products.index') }}" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Hampir Habis -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Stok Hampir Habis</h5>
        </div>
        <div class="card-body">
            @if ($lowStockProducts->count())
                <ul class="list-group">
                    @foreach ($lowStockProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge bg-danger rounded-pill">{{ $product->stock }} tersisa</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Semua stok masih aman.</p>
            @endif
        </div>
    </div>

    <!-- Aktivitas Terakhir -->
    <div class="card mt-4">
        <div class="card-header bg-info">
            <h3 class="card-title text-white"><i class="fas fa-history"></i> Aktivitas Terakhir</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse ($recentActivities as $activity)
                    <li class="list-group-item">
                        <strong>{{ $activity->user->name ?? 'Guest' }}</strong> <em>{{ $activity->action }}</em>
                        @if ($activity->subject_type)
                            pada <strong>{{ class_basename($activity->subject_type) }}</strong> ID:
                            {{ $activity->subject_id }}
                        @endif
                        <br><small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                    </li>
                @empty
                    <li class="list-group-item text-muted">Belum ada aktivitas tercatat.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
