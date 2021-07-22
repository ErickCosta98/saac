@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de proyectos</h3>
    </div>    
    <div class="row table-reponsive mx-auto" >
  <table class="table table-light table-striped" id="tabla">
    <thead class="thead-light">
      <tr>
        <th>codigo</th>
        <th>Nombre</th>
        <th>Editar contenido</th>
        <th>Editar informacion</th>
        <th>Modificar estado</th>     
      </tr>
    </thead>
    <tbody>
    @foreach ( $proyectos as $proyecto )
    <tr>
    <td>{{$proyecto->codigo}}</td>
    <td>{{$proyecto->nombre}}</td>
    <td><a href="{{ route('editProyecto', $proyecto->codigo) }}" class="btn btn-warning btn-block">Contenido</a></td>  
    @if ($proyecto->estatus == 0)
    <td><a id='btnBorrar' href="" class="btn btn-success btn-block" >Activo</a></td>
    @else
    <td><a id='btnActive' href="" class="btn btn-danger btn-block" >Inactivo</a></td>
@endif
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