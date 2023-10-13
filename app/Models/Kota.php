<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = "kota";
    protected $guarded = [];

    function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
