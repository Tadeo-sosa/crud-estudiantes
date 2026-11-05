<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();

        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        Profesor::create($datos);

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor registrado correctamente.');
    }

    public function show(Profesor $profesore)
    {
        return view('profesores.show', compact('profesore'));
    }

    public function edit(Profesor $profesore)
    {
        return view('profesores.edit', compact('profesore'));
    }

    public function update(Request $request, Profesor $profesore)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        $profesore->update($datos);

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor actualizado correctamente.');
    }

    public function destroy(Profesor $profesore)
    {
        $profesore->delete();

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor eliminado correctamente.');
    }
}
