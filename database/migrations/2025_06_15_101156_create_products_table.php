<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id produk
            $table->unsignedBigInteger('category_id'); // category produk
            $table->string('name'); // nama produk
            $table->string('image')->nullable(); // gambar produk
            $table->decimal('price', 10, 2); // harga produk
            $table->integer('stock')->default(0); // stok produk
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
