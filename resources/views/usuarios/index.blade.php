<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Listado de Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th> <!-- Agregamos una columna para las acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rol }}</td>
                    <td>
                        <!-- Agregamos un botón que enlace al método show con el ID del usuario -->
                        <a href="{{ route('usuarios.show', ['user' => $user->id]) }}" class="btn btn-info">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
