<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';

    protected $fillable = [
        'tanggal',
        'tipe',
        'bahan_baku_id',
        'jumlah',
        'total_biaya',
        'catatan',
        'created_by',
    ];

    // Relasi ke bahan baku (opsional jika tipe == bahan_baku)
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }

    // Relasi ke user pembuat
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
