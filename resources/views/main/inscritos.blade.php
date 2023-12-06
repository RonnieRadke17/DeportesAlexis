<!-- resources/views/eventos/inscritos.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Eventos Inscritos</h1>

        @if ($eventosInscritos->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($eventosInscritos as $evento)
                    <div class="col">
                        <div class="card">
                            @if ($evento->imagen)
                                <img src="{{ asset('storage/' . $evento->imagen) }}" class="card-img-top" alt="Imagen del evento" style="height: 200px;">
                            @else
                                <!-- Puedes agregar una imagen por defecto o mensaje si no hay imagen -->
                                <div class="card-img-top text-center py-5">Sin imagen</div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $evento->Nombre }}</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> {{ $evento->Fecha }}<br>
                                    <strong>Descripción:</strong> {{ $evento->Descripcion }}<br>
                                    <strong>Hora:</strong> {{ $evento->Hora }}<br>
                                    <strong>Tipo:</strong> {{ $evento->Tipo }}<br>
                                    <strong>Lugar:</strong> {{ $evento->Lugar }}
                                </p>
                                <!-- Puedes agregar más detalles según sea necesario -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No estás inscrito en ningún evento.</p>
        @endif
    </div>
@endsection
