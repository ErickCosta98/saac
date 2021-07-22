@extends('layouts.plantillaL')


@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de usuarios</h3>
    </div>    
    <div class="row table-reponsive mx-auto" >
  <table class="table table-light table-striped" id="tabla">
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
    <td>{{$user->roles[0]->name}}</td>
    @can('userAdmin')
    <td><a href="{{ route('userEdit', [$user->id,$_GET['listas']]) }}" class="btn btn-warning btn-block">Editar</a></td>  
    @if ($user->estatus == 1)
    <td><a id='btnBorrar' href="{{ route('userDelete',[$user->id,$_GET['listas']]) }}" class="btn btn-success btn-block" >Activo</a></td>
    @else
    <td><a id='btnActive' href="{{ route('userActive',[$user->id,$_GET['listas']]) }}" class="btn btn-danger btn-block" >Inactivo</a></td>
    @endcan
@endif
    @elsecan('registroUsuario')
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->usuario}}</td>
    <td>{{$user->nombre}}</td>
    <td>{{$user->roles[0]->name}}</td>
    @endcan
    @endforeach
        </tr>
    </tbody>
  </table>
    </div>
  </div>

@endsection

@section('js')

<script>  
$(document).ready(function() {
    $('#tabla').DataTable( {
        language: {
            url: 'DataTables/es-mx.json'
        }
    } );
} );
    </script>
@endsection