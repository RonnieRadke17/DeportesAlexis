@extends('layouts.app')

@section('style1')
    {{ asset('css/imagen.css') }}
@endsection

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h1>Actualizar Perfil</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('perfil.update', ['perfil' => $usuario->id]) }}">
                @csrf
                @method('PUT')

                <!-- Campos del formulario -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ $usuario->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" placeholder="Deja en blanco para no cambiar">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
