<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;


    protected $fillable = [
        'contenido',
        'user_id',
        'icon',
        'color',
        'readed_at',
        'redirect_to',
        'redirect_parameter',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
