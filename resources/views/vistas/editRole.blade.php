@extends('layouts.plantillaL')


@section('contenido')
    <div class="container">
        <div class="row ">
            <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
                <div class="card-header mt-3">
                    <h4  class="text-center font-weight-light my-2">{{$role->name}}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateRol') }}" method="post">
                        @csrf
                        <input id="idRole" type="hidden" name="id" value="{{$role->id}}">
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
                                  @foreach ( $permisos as $role )  
                                      <tr>
                                      {{-- <td>{{$role->id}}</td> --}}
                                      <td>{{$role->name}}</td>
                                      <td>
                                        @if (strpos($permN,$role->name))
                                        <input type="checkbox" name="nameP[]" id="nameP[]" value="{{$role->name}}"  checked >
                                            
                                        @else
                                        <input type="checkbox" name="nameP[]" id="nameP[]" value="{{$role->name}}"  >
                                            
                                        @endif
                                        </td>  
                                  @endforeach
                                      </tr>
                                  </tbody>
                                </table>
                                  </div>
                        </div>
            <div class="col-sm-8 mx-auto mt-3 text-center">
            <input class="btn btn-primary btn" type="submit" value="Guardar">
            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('js')

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