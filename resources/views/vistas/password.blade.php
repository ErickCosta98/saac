@extends('layouts.plantillaL')


@section('contenido')
<form action="{{ route('userUpdatepass')}}" method="post">
    @csrf
    <input id="id" name="id" type="hidden" value="{{$user->id}}">
    <label for="">Contraseña</label>
    <input type="text" name="contraseña" id="contraseña">
    <br>
    <input type="submit" value="Guardar">
</form>
@endsection