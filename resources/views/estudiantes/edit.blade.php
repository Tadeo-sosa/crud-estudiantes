@extends('layouts.app')

@section('title', 'Listado de Estudiantes')

@section('content')

<form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $estudiante->nombre }}">
    <input type="text" name="apellido" value="{{ $estudiante->apellido }}">
    <input type="text" name="dni" value="{{ $estudiante->dni }}">
    <input type="date" name="fecha_nacimiento" value="{{ $estudiante->fecha_nacimiento }}">

    <div class="mb-3">
        <label for="profesor_id">Profesor</label>

        <select name="profesor_id" id="profesor_id" class="form-control">

            @foreach($profesores as $profesor)

                <option value="{{ $profesor->id }}"
                    {{ $estudiante->profesor_id == $profesor->id ? 'selected' : '' }}>

                    {{ $profesor->nombre }} {{ $profesor->apellido }}

                </option>

            @endforeach

        </select>
    </div>

    <button>Actualizar</button>

</form>
@endsection