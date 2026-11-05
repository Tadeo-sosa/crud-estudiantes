
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Models\Estudiante;
use App\Models\Profesor;

// Rutas disponibles para usuarios autenticados
Route::middleware('auth')->group(function () {

// USUARIOS

// Operaciones exclusivas del administrador
Route::middleware('admin')->group(function () {
    Route::resource('usuarios', UsuarioController::class)
        ->except(['index', 'show']);
});

// Consulta disponible para ambos roles
Route::resource('usuarios', UsuarioController::class)
    ->only(['index', 'show']);
    
    // Dashboard
    Route::get('/dashboard', function () {
        $cantidadEstudiantes = Estudiante::count();
        $cantidadProfesores = Profesor::count();

        return view('dashboard', compact(
            'cantidadEstudiantes',
            'cantidadProfesores'
        ));
    })->name('dashboard');

    // ESTUDIANTES
    // Primero las operaciones exclusivas del administrador
    Route::middleware('admin')->group(function () {
        Route::resource('estudiantes', EstudianteController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });

    // Consulta disponible para ambos roles
    Route::resource('estudiantes', EstudianteController::class)
        ->only(['index', 'show']);

    // PROFESORES
    Route::middleware('admin')->group(function () {
        Route::resource('profesores', ProfesorController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });

    // Consulta disponible para ambos roles
    Route::resource('profesores', ProfesorController::class)
        ->only(['index', 'show']);

});

// Deshabilitamos el registro público
Auth::routes(['register' => false]);

// Home protegido
Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index'
])->middleware('auth')->name('home');
