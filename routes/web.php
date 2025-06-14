<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/categories', function () {
    return view('categories.index');
})->name('categories.index');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/calculator', function () {
    return view('calculator.index');
})->name('calculator.index');

Route::get('/perhitungan', function () {
    return view('perhitungan');
})->name('perhitungan');

require __DIR__.'/auth.php';
