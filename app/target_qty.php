<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class target_qty extends Model
{
    protected $guarded = [];

    public function hasilProduksi()
    {
        return $this->hasMany(target_qty::class, 'target_qty_id', 'id');
    }
    
}
