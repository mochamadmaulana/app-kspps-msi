<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Majlis extends Model
{
    use HasFactory;
    protected $table = "majlis";
    protected $guarded = [];

    public function scopeFilter(Builder $query, string $filters = null) : void
    {
        $query->where('nama_majlis','like','%'.$filters.'%');
    }

    public function nasabah()
    {
        return $this->hasMany(Nasabah::class);
    }
}
