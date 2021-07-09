@extends('layouts.plantillaL')


@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de usuarios</h3>
    </div>    
    <div class="row mb-1">
    <form action="{{ route('userSearch') }}"   method="post">
      @csrf
    <b class="h5">Nombre:</b> <input class="form" type="text" name="busqueda" id="busqueda" value="{{old('busqueda')}}">
    <input name="enviar" id="enviar" class="btn btn-primary" type="submit" value="Buscar">
</form>
    </div>

    <div class="row table-reponsive mx-auto" >
  <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Roles</th>
        @can('userAdmin')
        <th>Modificar</th>
        <th>Modificar estado</th>  
        @endcan
   
      </tr>
    </thead>
    <tbody>
    @foreach ( $users as $user )
    @can('userAdmin')   
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->usuario}}</td>
    <td>{{$user->nombre}}</td>
    <td>{{$user->getRoleNames()}}</td>
    @can('userAdmin')
    <td><a href="{{ route('userEdit', $user->id) }}" class="btn btn-warning btn-block">Editar</a></td>  
    @if ($user->estatus == 1)
    <td><a id='btnBorrar' href="{{ route('userDelete', $user->id) }}" class="btn btn-success btn-block" >Activo</a></td>
    @else
    <td><a id='btnActive' href="{{ route('userActive', $user->id) }}" class="btn btn-danger btn-block" >Inactivo</a></td>
    @endcan
@endif
    @elsecan('registroUsuario')
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->usuario}}</td>
    <td>{{$user->nombre}}</td>
    <td>{{$user->getRoleNames()}}</td>
    @endcan
    @endforeach
        </tr>
    </tbody>
  </table>
  {{$users->links()}}
    </div>
  </div>
@endsection