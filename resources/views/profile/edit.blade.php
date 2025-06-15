@extends('layouts.app')

@section('title', 'Edit Profil')
@section('header', 'Edit Profil Pengguna')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="row">
        <!-- Update Informasi Profil -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Informasi Profil</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Password</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h5>Hapus Akun</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Menghapus akun akan menghapus semua data secara permanen. Tindakan ini tidak bisa
                        dibatalkan.</p>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
