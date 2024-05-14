<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lugar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reclamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido',
        'users_id',
        'lugares_id',
    ];

    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }

    public function lugares()
    {
        return $this->belongsTo(Lugar::class);
    }
}
