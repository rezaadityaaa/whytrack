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
    Schema::create('penggunaan_bahan_baku', function (Blueprint $table) {
    $table->id();
    $table->foreignId('bahan_baku_id')->constrained('bahan_baku')->onDelete('cascade');
    $table->date('tanggal');
    $table->integer('jumlah');
    $table->string('digunakan_untuk'); // Contoh: "Espresso", "Cold Brew", "Pembuatan Syrup"
    $table->text('keterangan')->nullable(); // Penjelasan tambahan
    $table->unsignedBigInteger('created_by');
    $table->timestamps();

    $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunaan_bahan_baku');
    }
};
