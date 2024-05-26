<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $guarded = [];

    public function hasilProduksi()
    {
        return $this->hasMany(produk::class, 'produk_id', 'id');
    }

    public function problemProduksi()
    {
        return $this->hasMany(produk::class, 'produk_id', 'id');
    }
}
