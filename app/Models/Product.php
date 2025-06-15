<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Kolom‐kolom yang boleh di‐mass‐assign (untuk create() / update()).
     */
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'price',
        'stock',
        // jika kamu menambahkan kolom description:
        'description',
    ];

    /**
     * Relasi: setiap produk milik satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
