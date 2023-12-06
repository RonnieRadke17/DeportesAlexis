@extends('layouts.app')
@section('style1')
    {{ asset('css/imagen.css') }}
@endsection


@section('content')
<form method="POST" action="{{ route('perfil.update', ['perfil' => $usuario->id]) }}">
    @csrf
    @method('PUT')

    <!-- Campos del formulario -->
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $usuario->name }}" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" value="{{ $usuario->email }}" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" placeholder="Deja en blanco para no cambiar">

    <button type="submit">Actualizar</button>
</form>

@endsection