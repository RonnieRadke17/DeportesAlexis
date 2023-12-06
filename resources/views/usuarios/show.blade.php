<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles del Usuario</h1>

    <div>
        <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Rol:</strong> {{ $usuario->rol }}</p>
        <!-- No mostramos la contraseña por razones de seguridad -->

        <!-- Agrega más detalles según sea necesario -->
    </div>

    <!-- Agrega un enlace para regresar a la lista de usuarios -->
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection
