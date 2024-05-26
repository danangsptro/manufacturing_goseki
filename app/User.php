<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'jenis_kelamin', 'no_telepon', 'tempat_lahir', 'tanggal_lahir'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasilProduksi()
    {
        return $this->hasMany(hasil_produksi::class, 'user_id', 'id');
    }

    public function problemProduksi()
    {
        return $this->hasMany(hasil_produksi::class, 'user_id', 'id');
    }
}
