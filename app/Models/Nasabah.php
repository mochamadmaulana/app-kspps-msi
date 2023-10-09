<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Nasabah extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "nasabah";
    protected $guarded = [];

    // protected $fillable = [
    //     'nik_ktp',
    // ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class,'tempat_lahir_id');
    }

    public function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }

    public function jenis_usaha()
    {
        return $this->belongsTo(JenisUsaha::class);
    }

    public function majlis()
    {
        return $this->belongsTo(Majlis::class);
    }
}
