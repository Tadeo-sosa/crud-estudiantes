<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
    'nombre',
    'apellido',
    'dni',
    'fecha_nacimiento',
    'foto_perfil'
];
}
