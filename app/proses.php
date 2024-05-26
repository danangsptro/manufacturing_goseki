<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proses extends Model
{
    protected $guarded = [];

    public function hasilProduksi()
    {
        return $this->hasMany(proses::class, 'proses_id', 'id');
    }

    public function problemProduksi()
    {
        return $this->hasMany(proses::class, 'proses_id', 'id');
    }
}
