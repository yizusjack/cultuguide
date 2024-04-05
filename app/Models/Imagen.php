<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $fillable = [
        'hash',
        'nombre',
        'extension',
        'mime',
        'imageable_id',
        'imagen_type',
    ];

    public function imageable() : MorphTo
    {
        return $this->morphTo();
    }
}
