<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('header', 'Tambah Kategori')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Form Tambah Kategori</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                        required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Batal</a>
            </form>
        </div>
    </div>
@endsection
