@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('/evento')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('evento.form',['modo'=>'Crear']);
    </form>
</div>
@endsection