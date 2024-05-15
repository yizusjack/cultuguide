<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dato extends Model
{
    use HasFactory;

    protected $fillable = [
        'edad',
        'ciudad',
        'presupuesto',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
