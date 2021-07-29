@extends('layouts.plantillaL')

@section('contenido')
<div class="container shadow-lg border-0 rounded-lg mt-3">
    <div class="row ">
      <h3 class="mt-3" style="text-align: center;">Lista de proyectos</h3>
    </div> 
    @role('Alumno')
    <form class="col-3 mb-4" action="{{ route('unirseP') }}" method="post">
      @csrf
      <label for="">Unirse a un proyecto</label>
      <div class="input-group">
        <input type="text" class="form-control" name="codigo" aria-label="Unirse a un proyecto">
        <button class="btn btn-outline-secondary" type="submit">unirse</button>
      </div>
      @error('codigo'){{$message}}@enderror
    </form>
  @endrole   
    <div class="row table-reponsive mx-auto mb-3" > 
  <table class="table table-light " id="tabla">
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
  <div class="mt-4"></div>
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
    <script>  
      $(function(){
          
          @if(Session::has('error'))
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: '{{ Session::get("error") }}',
              showConfirmButton: false,
              timer: 1500
          })
          @endif
          @if(Session::has('success'))
          Swal.fire({
          icon: 'success',
          title: 'Listo! :',
          text: '{{ Session::get("success") }}',
      })
      @endif
      });
          </script>
  @endsection