<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class operator extends Model
{
    protected $guarded = [];

    public function hasilProduksi()
    {
        return $this->hasMany(hasil_produksi::class, 'operator_id', 'id');
    }

    public function problemProduksi()
    {
        return $this->hasMany(hasil_produksi::class, 'operator_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
