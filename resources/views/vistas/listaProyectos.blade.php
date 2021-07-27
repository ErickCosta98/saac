@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de proyectos</h3>
    </div>    
    <div class="row table-reponsive mx-auto" >
      @role('Alumno')
      <form class="col-3 mb-2" action="{{ route('unirseP') }}" method="post">
        @csrf
        <label for="">Unirse a un proyecto</label>
        <div class="input-group">
          <input type="text" class="form-control" name="codigo" aria-label="Unirse a un proyecto">
          <button class="btn btn-outline-secondary" type="submit">unirse</button>
        </div>
      </form>
    @endrole
  <table class="table table-light table-striped" id="tabla">
    <thead class="thead-light">
      <tr>
        <th>codigo</th>
        <th>Nombre</th>
        <th>acciones</th>
        @can('authProyectos')
        <th>Estado</th>     
        @endcan
      </tr>
    </thead>
    <tbody>
    @foreach ( $proyectos as $proyecto )
    <tr>
    <td>{{$proyecto->codigo}}</td>
    <td>{{$proyecto->nombre}}</td>
    <td><a href="{{ route('editProyecto', $proyecto->codigo) }}" class="btn btn-primary">Contenido</a>
      @hasanyrole('Profesor|Verificador')
      <a href="{{ route('infoProyecto', $proyecto->codigo) }}" class="btn btn-warning">informacion</a>
      @endhasanyrole
      </td> 
    @can('authProyectos')
    <td><a ' href="" class="btn btn-success btn-block" >Aprobar</a></td>   
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