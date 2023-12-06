<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'hora', 'tipo', 'lugar', 'imagen'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'user_eventos', 'evento_id', 'user_id')->withTimestamps();
    }

}
