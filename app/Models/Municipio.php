<?php

namespace App\Models;

use App\Models\Lugar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function municipios()
    {
        return $this->hasMany(Lugar::class);
    }
}
