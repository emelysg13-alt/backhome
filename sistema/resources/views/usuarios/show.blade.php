<!DOCTYPE html>
<html>
<head>
    <title>Ver Usuario</title>
</head>
<body>

<h1>Información del Usuario</h1>

<p><strong>Documento:</strong> {{ $usuario->n_documento }}</p>
<p><strong>Nombre:</strong> {{ $usuario->primer_nombre }} {{ $usuario->segundo_nombre }}</p>
<p><strong>Apellido:</strong> {{ $usuario->primer_apellido }} {{ $usuario->segundo_apellido }}</p>
<p><strong>Correo:</strong> {{ $usuario->email }}</p>
<p><strong>Teléfono:</strong> {{ $usuario->numero_tel }}</p>
<p><strong>Estado:</strong> {{ $usuario->estado }}</p>

<a href="{{ route('usuarios.index') }}">
    Volver
</a>

</body>
</html>