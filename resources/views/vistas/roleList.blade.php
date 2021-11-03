@extends('layouts.plantillaL')


@section('contenido')
    <div class="container">
        <div class="row ">
            <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
                <div class="card-header mt-3">
                    <h4  class="text-center font-weight-light my-2">Lista de roles</h4>
                </div>
                <div class="card-body">
                        <div class="col-sm-8 mx-auto">
                            <div class="row table-reponsive">
                                <table class="table table-light table-striped">
                                  <thead class="thead-light">
                                    <tr>
                                      {{-- <th>id</th> --}}
                                      <th>Nombre</th>
                                      <th>modificar</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ( $roles as $role )  
                                      <tr>
                                      {{-- <td>{{$role->id}}</td> --}}
                                      <td>{{$role->name}}</td>
                                      <td><a href="{{ route('roleEdit', $role->id) }}" class="btn btn-info btn-block">Editar</a></td>  
                                  @endforeach
                                      </tr>
                                  </tbody>
                                </table>
                                  </div>
                        </div>
            </div>
        </div>
    </div>
    </div>

@endsection


