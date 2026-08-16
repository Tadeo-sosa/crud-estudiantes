@extends('layouts.app')

@section('title', 'Listado de Estudiantes')

@section('content')
<form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nombre: {{ $estudiante->nombre }}</p>
    <p>Apellido: {{ $estudiante->apellido }}</p>  
    <p>DNI: {{ $estudiante->dni }}</p>
    <p>Fecha de nacimiento: {{ $estudiante->fecha_nacimiento }}</p>
    @if($estudiante->foto_perfil)
        <img src="{{ asset('storage/'.$estudiante->foto_perfil) }}" width="100">    
    @endif





    <button>Volver</button>
</form>
@endsection