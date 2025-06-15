<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Hanya untuk user terautentikasi
        $this->middleware(['auth', 'verified']);
    }

    /** Tampilkan halaman dashboard dengan ringkasan data */
    public function index()
    {
        $productsCount    = Product::count();
        $categoriesCount  = Category::count();
        $usersCount       = User::count();
        $recentProducts   = Product::with('category')->latest()->take(5)->get();
        $recentUsers      = User::latest()->take(5)->get();
        $lowStockProducts = Product::where('stock', '<', 10)
                                   ->orderBy('stock', 'asc')
                                   ->get();
        $lowStockCount    = $lowStockProducts->count();

        $recentActivities = ActivityLog::with('user')->latest()->take(10)->get();

        return view('dashboard', compact(
            'productsCount',
            'categoriesCount',
            'usersCount',
            'recentProducts',
            'recentUsers',
            'lowStockProducts',
            'lowStockCount',
            'recentActivities' // dikirim ke view
        ));


    }


}
