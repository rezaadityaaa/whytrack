<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BahanBaku;
use App\Models\User;

class PergerakanStok extends Model
{
    protected $table = 'pergerakan_stok';

    protected $fillable = [
        'bahan_baku_id',
        'tipe',
        'jumlah',
        'sumber',
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
