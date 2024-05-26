<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mesin_produksi extends Model
{
    protected $guarded = [];
    
    public function hasilProduksi()
    {
        return $this->hasMany(hasil_produksi::class, 'mesin_produksi_id', 'id');
    }

    public function problemPrpduksi()
    {
        return $this->hasMany(problem_produksi::class, 'mesin_produksi_id', 'id');
    }
}
