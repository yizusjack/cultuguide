<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lugar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'lugares_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lugar()
    {
        return $this->belongsTo(Lugar::class, 'lugares_id');
    }

    public function reports()
    {
        return $this->belongsToMany(User::class, 'comment_reports', 'comment_id', 'user_id');
    }
}
