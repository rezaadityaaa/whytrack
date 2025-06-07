<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';

    protected $fillable = [
        'nama', 'satuan', 'stok', 'created_by', 'updated_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'bahan_baku_id');
    }
}
