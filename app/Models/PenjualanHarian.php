<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanHarian extends Model
{
    protected $fillable = [
        'staff_id', 'menu_id', 'tanggal', 'jam', 'jumlah_terjual', 'total_harga'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
