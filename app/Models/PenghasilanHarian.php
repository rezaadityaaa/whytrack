<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenghasilanHarian extends Model
{
    protected $table = 'penghasilan_harian';
    protected $fillable = ['staff_id', 'tanggal', 'total_harian'];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
