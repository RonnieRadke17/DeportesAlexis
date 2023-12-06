@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Usuarios</h1>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <!-- Agregamos un botón que enlace al método show con el ID del usuario -->
                            <a href="{{ route('usuarios.show', ['user' => $user->id]) }}" class="btn btn-secondary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
