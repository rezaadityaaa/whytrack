<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PenjualanHarian;

class Menu extends Model
{
    protected $fillable = ['nama', 'harga'];

    public function penjualanHarian()
    {
        return $this->hasMany(PenjualanHarian::class);
    }
}

