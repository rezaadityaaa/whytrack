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
        Schema::create('pergerakan_stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahan_baku_id')->constrained('bahan_baku')->onDelete('cascade');
            $table->enum('tipe', ['masuk', 'keluar']);
            $table->integer('jumlah');
            $table->string('sumber')->nullable(); // contoh: "Pembelian", "Produksi", "Penyesuaian"
            $table->text('keterangan')->nullable(); // opsional untuk penjelasan detail
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
        Schema::dropIfExists('pergerakan_stok');
    }
};
