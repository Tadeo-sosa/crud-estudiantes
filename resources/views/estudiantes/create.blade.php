@extends('layouts.app')

@section('title', 'Listado de Estudiantes')

@section('content')

<form method="POST" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellido" placeholder="Apellido">
    <input type="text" name="dni" placeholder="DNI">
    <input type="date" name="fecha_nacimiento">
    <input type="file" name="foto_perfil">

    <button>Guardar</button>
    <div class="mb-3">
    <label for="profesor_id" class="form-label">Profesor</label>

    <select name="profesor_id" id="profesor_id" class="form-control">

        @foreach($profesores as $profesor)

            <option value="{{ $profesor->id }}">
                {{ $profesor->nombre }} {{ $profesor->apellido }}
            </option>

        @endforeach

    </select>
</div>
</form>
@endsection