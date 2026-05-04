<form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nombre" value="{{ $estudiante->nombre }}">
    <input type="text" name="apellido" value="{{ $estudiante->apellido }}">
    <input type="text" name="dni" value="{{ $estudiante->dni }}">
    <input type="date" name="fecha_nacimiento" value="{{ $estudiante->fecha_nacimiento }}">

    <button>Actualizar</button>
</form>