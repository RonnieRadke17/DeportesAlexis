@extends('layouts.app')

@section('content')
<div class="container">
    Muestra lista de eventos siuu
    <br>
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <a href="{{url('evento/create')}}" class="btn btn-success">Registrar</a>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo</th>
                <th>Lugar</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
            <tr>
                <td>{{$evento->id}}</td>
                <td>{{$evento->Nombre}}</td>
                <td>{{$evento->Descripcion}}</td>
                <td>{{$evento->Fecha}}</td>
                <td>{{$evento->Hora}}</td>
                <td>{{$evento->Tipo}}</td>
                <td>{{$evento->Lugar}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$evento->imagen}}" width="100" alt=""></td>
                <td>
                    <a href="{{url('/evento/'.$evento->id.'/edit')}}" class="btn btn-warning">Editar</a>
                    <a href="{{ url('/evento/'.$evento->id) }}" class="btn btn-warning">Mostrar</a>

                    <form action="{{url('/evento/'.$evento->id)}}" class="d-inline" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $eventos->links() !!}
</div>
@endsection