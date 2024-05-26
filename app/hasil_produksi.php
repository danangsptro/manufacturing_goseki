<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasil_produksi extends Model
{
    protected $guarded = [];

    public function mesin()
    {
        return $this->belongsTo(mesin_produksi::class, 'mesin_produksi_id');
    }

    public function operator()
    {
        return $this->belongsTo(operator::class, 'operator_id');
    }

    public function produk()
    {
        return $this->belongsTo(produk::class, 'produk_id');
    }

    public function proses()
    {
        return $this->belongsTo(proses::class, 'proses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
