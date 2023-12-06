<h1>{{$modo}} evento</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{isset($evento->Nombre) ? $evento->Nombre : old('nombre')}}" id="nombre">

    <label for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion">{{isset($evento->Descripcion) ? $evento->Descripcion : old('descripcion')}}</textarea>

    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{isset($evento->Fecha) ? $evento->Fecha : old('fecha')}}" id="fecha">

    <label for="hora">Hora</label>
    <input type="time" class="form-control" name="hora" value="{{isset($evento->Hora) ? $evento->Hora : old('hora')}}" id="hora">

    <label for="tipo">Tipo</label>
    <select class="form-control" name="tipo" id="tipo">
        <option value="Deportivo" {{isset($evento->Tipo) && $evento->Tipo == 'Deportivo' ? 'selected' : ''}}>Deportivo</option>
        <option value="Cultural" {{isset($evento->Tipo) && $evento->Tipo == 'Cultural' ? 'selected' : ''}}>Cultural</option>
    </select>

    <label for="lugar">Lugar</label>
    <select class="form-control" name="lugar" id="lugar">
        <option value="Polideportivo La Plata" {{isset($evento->Lugar) && $evento->Lugar == 'Polideportivo La Plata' ? 'selected' : ''}}>Polideportivo La Plata</option>
        <option value="Universidad Politécnica de Pachuca" {{isset($evento->Lugar) && $evento->Lugar == 'Universidad Politécnica de Pachuca' ? 'selected' : ''}}>Universidad Politécnica de Pachuca</option>
    </select>

    <label for="imagen">Imagen</label>
    @if(isset($evento->imagen))
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$evento->imagen}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="imagen" value="" id="imagen">
</div>

<input class="btn btn-success" type="submit" id="Enviar" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{url('evento/')}}">Regresar</a>