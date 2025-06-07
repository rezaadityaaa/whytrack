<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BahanBaku;
use App\Models\User;

class PenggunaanBahanBaku extends Model
{
    protected $table = 'penggunaan_bahan_baku';

    protected $fillable = [
        'bahan_baku_id',
        'tanggal',
        'jumlah',
        'digunakan_untuk',
        'keterangan',
        'created_by',
    ];

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
