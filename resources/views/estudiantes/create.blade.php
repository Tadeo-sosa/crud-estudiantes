<form method="POST" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellido" placeholder="Apellido">
    <input type="text" name="dni" placeholder="DNI">
    <input type="date" name="fecha_nacimiento">
    <input type="file" name="foto_perfil">

    <button>Guardar</button>
</form>