<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $estudiantes = Estudiante::all();
    return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
    
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'dni' => 'required',
        'fecha_nacimiento' => 'required',
        'foto_perfil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('foto_perfil')) {
        $ruta = $request->file('foto_perfil')->store('fotos', 'public');
    } else {
        $ruta = null;
    }

    Estudiante::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'dni' => $request->dni,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'foto_perfil' => $ruta
    ]);

    return redirect()->route('estudiantes.index');
}
    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
         return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());
    return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
    return redirect()->route('estudiantes.index');
    }
}
