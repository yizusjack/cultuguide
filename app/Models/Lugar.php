<?php

namespace App\Models;

use App\Models\Evento;
use App\Models\Municipio;
use App\Models\Exhibicion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lugar extends Model
{
    use HasFactory;

    protected $table = 'lugares';

    protected $fillable = [
        'nombre',
        'descripcion',
        'latitud',
        'longitud',
        'municipios_id',
    ];

    public function municipios()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function exhibiciones()
    {
        return $this->hasMany(Exhibicion::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}