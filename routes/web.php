<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Models\Estudiante;
use App\Models\Profesor;

Route::resource('estudiantes', EstudianteController::class);

Route::get('/dashboard', function () {

    $cantidadEstudiantes = Estudiante::count();
    $cantidadProfesores = Profesor::count();

    return view('dashboard', compact(
        'cantidadEstudiantes',
        'cantidadProfesores'
    ));
});