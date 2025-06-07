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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('tipe', ['bahan_baku', 'operasional']);
            $table->unsignedBigInteger('bahan_baku_id')->nullable(); // Jika pengeluaran bahan baku
            $table->integer('jumlah')->nullable(); // Jumlah bahan baku yang dibeli
            $table->integer('total_biaya'); // Total biaya pengeluaran
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('bahan_baku_id')->references('id')->on('bahan_baku')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
