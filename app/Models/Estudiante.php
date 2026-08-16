<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profesor;

class Estudiante extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'foto_perfil',
        'profesor_id'
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}