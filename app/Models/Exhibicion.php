<?php

namespace App\Models;

use App\Models\Lugar;
use App\Models\Imagen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exhibicion extends Model
{
    use HasFactory;

    protected $table = 'exhibiciones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'lugares_id',
    ];

    public function lugares()
    {
        return $this->belongsTo(Lugar::class);
    }

    public function imagenes() : MorphMany
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }
}
