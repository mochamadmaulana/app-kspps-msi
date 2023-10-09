<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kantor extends Model
{
    use HasFactory;
    protected $table = "kantor";
    protected $guarded = [];

    public function scopeFilter(Builder $query, string $filters = null) : void
    {
        $query->when($filters ?? false, fn($query, $search) =>
            $query->where('nama_kantor','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('no_telepone','like','%'.$search.'%')
                ->orWhere('alamat','like','%'.$search.'%')
        );
    }

    public function scopePusat(Builder $query) : void
    {
        $query->where('is_pusat',true);
    }

    public function scopeCabang(Builder $query) : void
    {
        $query->where('is_pusat',false);
    }


    // Relations
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    function nasabah()
    {
        return $this->hasMany(Nasabah::class);
    }
}
