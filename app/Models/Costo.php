<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{
    protected $fillable = ['categoria','costo','lugares_id'];

    public function lugar(){
        return $this->belongsTo(Lugar::class, 'lugares_id');
    }
}
