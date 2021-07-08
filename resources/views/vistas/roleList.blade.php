@extends('layouts.plantillaL')


@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de usuarios</h3>
    </div>    
    <div class="row">
  </div>
    <form action="{{ route('userSearch') }}"   method="post">
      @csrf
    <b class="h5">Nombre:</b> <input class="form" type="text" name="busqueda" id="busqueda" value="{{old('busqueda')}}">
    <input name="enviar" id="enviar" class="btn btn-info" type="submit" value="Buscar">
    
  </form>
    <div class="row table-reponsive">
  <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>modificar</th>
        <th>Modificar estado</th>
      </tr>
    </thead>
    <tbody>
    @foreach ( $roles as $role )  
        <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td><a href="{{ route('roleEdit', $role->id) }}" class="btn btn-info btn-block">Editar</a></td>  
        <td><a id='btnBorrar' href="" class="btn btn-danger btn-block" >Desactivar</a></td>
    @endforeach
        </tr>
    </tbody>
  </table>
    </div>
  </div>
@endsection