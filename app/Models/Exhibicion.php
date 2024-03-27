<?php

namespace App\Models;

use App\Models\Lugar;
use Illuminate\Database\Eloquent\Model;
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
}
