<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;
    protected $table = "jenis_usaha";
    protected $guarded = [];

    public function nasabah()
    {
        return $this->hasMany(Nasabah::class);
    }
}
