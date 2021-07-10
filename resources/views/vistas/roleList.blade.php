@extends('layouts.plantillaL')


@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista roles</h3>
    </div>    
    <div class="row">
  </div>
    <div class="row table-reponsive">
  <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>modificar</th>
      </tr>
    </thead>
    <tbody>
    @foreach ( $roles as $role )  
        <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td><a href="{{ route('roleEdit', $role->id) }}" class="btn btn-info btn-block">Editar</a></td>  
    @endforeach
        </tr>
    </tbody>
  </table>
    </div>
  </div>
@endsection