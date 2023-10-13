<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "karyawan";
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    public function scopeSearch(Builder $query, string $filters = null) : void
    {
        $query->when($filters ?? false, fn($query, $search) =>
            $query->where('no_induk_karyawan','like','%'.$search.'%')
                ->orWhere('nama_lengkap','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('no_telepone','like','%'.$search.'%')
                ->orWhere('role','like','%'.$search.'%')
                // ->orWhereHas('kantor',fn($query) =>
                //     $query->where('nama_kantor','like','%'.$search.'%')
                // )
        );
    }

    public function scopeAktif(Builder $query) : void
    {
        $query->where('is_aktif',true);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class);
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
