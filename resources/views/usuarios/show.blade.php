@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h1>Detalles del Usuario</h1>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p><strong>Rol:</strong> {{ $usuario->rol }}</p>
                    <!-- No mostramos la contraseña por razones de seguridad -->
                </div>
                <!-- Agrega más detalles según sea necesario -->
                <div class="text-center mt-4">
                    <!-- Agrega un enlace para regresar a la lista de usuarios -->
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver al Listado</a>
                </div>
            </div>
        </div>
    </div>
@endsection
