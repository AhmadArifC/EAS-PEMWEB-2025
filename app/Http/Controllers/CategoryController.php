<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Tampilkan daftar kategori */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /** Form tambah kategori */
    public function create()
    {
        return view('categories.create');
    }

    /** Simpan kategori baru */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $category = Category::create($data);

        // ✅ Log aktivitas tambah
        ActivityLog::create([
            'user_id'      => Auth::id(),
            'action'       => "Menambahkan kategori: {$category->name}",
            'subject_type' => Category::class,
            'subject_id'   => $category->id,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /** Form edit kategori */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /** Update kategori */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $category->update($data);

        // ✅ Log aktivitas update
        ActivityLog::create([
            'user_id'      => Auth::id(),
            'action'       => "Mengubah kategori: {$category->name}",
            'subject_type' => Category::class,
            'subject_id'   => $category->id,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /** Hapus kategori */
    public function destroy(Category $category)
    {
        // ✅ Log aktivitas sebelum dihapus
        ActivityLog::create([
            'user_id'      => Auth::id(),
            'action'       => "Menghapus kategori: {$category->name}",
            'subject_type' => Category::class,
            'subject_id'   => $category->id,
        ]);

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
