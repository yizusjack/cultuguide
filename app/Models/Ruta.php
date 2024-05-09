<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = [
        'ruta_antigua',
        'ruta_actual',
    ];

    public function lugares()
    {
        return $this->belongsToMany(Lugar::class);
    }
}