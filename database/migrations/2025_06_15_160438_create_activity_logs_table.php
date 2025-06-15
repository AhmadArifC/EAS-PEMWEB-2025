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
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // user yang melakukan aksi
        $table->string('action');              // deskripsi aksi (misal: "Menghapus produk X")
        $table->string('subject_type')->nullable(); // model yang terkait (misal: Product)
        $table->unsignedBigInteger('subject_id')->nullable(); // id entitas terkait
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
