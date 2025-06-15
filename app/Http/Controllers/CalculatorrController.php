<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CalculatorrController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('calculator.index', compact('products'));
    }
}
