@extends('layouts.plantillaL')


@section('contenido')
<form action="{{ route('userUpdatepass')}}" method="post">
    @csrf
    <input id="id" name="id" type="hidden" value="{{Auth::user()->id}}">
    <label for="">Contraseña Actual</label>
    <input type="text" name="actpass" id="actpass">
    <br>
    <input type="submit" value="Guardar">
</form>
@endsection