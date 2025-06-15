<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalculatorrController;
use App\Models\Product;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\Request;

// Halaman publik
Route::get('/', function (Request $request) {
    $query = \App\Models\Product::with('category');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhereHas('category', function ($q2) use ($search) {
                  $q2->where('name', 'like', "%{$search}%");
              });
        });
    }

    $products = $query->paginate(12);
    return view('welcome', compact('products'));
});


// Routes untuk user yang sudah login & terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');

    // CRUD Produk
    Route::resource('products', ProductController::class);

    // CRUD Kategori
    Route::resource('categories', CategoryController::class);

    // CRUD Users (index, create, store, edit, update, destroy)
    Route::resource('users', UserController::class)->except(['show']);

    // Kalkulator setelah login
    Route::get('/calculator', [CalculatorrController::class, 'index'])->name('calculator.index');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
         ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
         ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
         ->name('profile.destroy');

    Route::put('/profile/password', [PasswordController::class, 'update'])
        ->name('user-password.update');
});

require __DIR__.'/auth.php';
