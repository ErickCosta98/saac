@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de usuarios</h3>
    </div>    
    <div class="row mb-1">
    <form action=""   method="get">
      <input type="hidden" id="listas" name="listas" value="">
    <b class="h5">Nombre:</b> <input class="form" type="text" name="busqueda" id="busqueda" value="">
    <input name="enviar" id="enviar" class="btn btn-primary" type="submit" value="Buscar">
</form>
    </div>

    <div class="row table-reponsive mx-auto" >
  <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Editar contenido</th>
        <th>Editar informacion</th>
        <th>Modificar estado</th>     
      </tr>
    </thead>
    <tbody>
    @foreach ( $proyectos as $proyecto )
    <tr>
    <td>{{$proyecto->id_proyecto}}</td>
    <td>{{$proyecto->nombre}}</td>
    <td><a href="" class="btn btn-warning btn-block">Contenido</a></td>  
    <td><a href="" class="btn btn-warning btn-block">Informacion</a></td>  
    @if ($proyecto->estatus == 0)
    <td><a id='btnBorrar' href="" class="btn btn-success btn-block" >Activo</a></td>
    @else
    <td><a id='btnActive' href="" class="btn btn-danger btn-block" >Inactivo</a></td>
@endif
    @endforeach
        </tr>
    </tbody>
  </table>
  {{$proyectos->links()}}
    </div>
  </div>
@endsection