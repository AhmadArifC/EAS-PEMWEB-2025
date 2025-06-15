<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Tampilkan daftar produk dengan pencarian */
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->paginate(10);
        return view('products.index', compact('products'));
    }

    /** Tampilkan form tambah produk */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /** Simpan produk baru */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);

        // Log aktivitas
        ActivityLog::create([
    'user_id'     => Auth::id(),
    'action'      => "Menambahkan produk: {$product->name}",
    'subject_type'=> Product::class,
    'subject_id'  => $product->id,
]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /** Tampilkan form edit produk */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /** Update data produk */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        // Log aktivitas
        ActivityLog::create([
    'user_id'     => Auth::id(),
    'action'      => "Memperbarui produk: {$product->name}",
    'subject_type'=> Product::class,
    'subject_id'  => $product->id,
]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /** Hapus produk */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Log sebelum dihapus
        ActivityLog::create([
    'user_id'     => Auth::id(),
    'action'      => "Menghapus produk: {$product->name}",
    'subject_type'=> Product::class,
    'subject_id'  => $product->id,
]);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /** Tampilkan halaman kalkulator */
    public function calculator()
    {
        $products = Product::all();
        return view('calculator.index', compact('products'));
    }
}
