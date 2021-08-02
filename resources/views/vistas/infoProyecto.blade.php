@extends('layouts.plantillaL')

@section('contenido')
<div class="container ">
    <div class="row ">
        <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
            <div class="card-header mt-3">
                <h4 class="text-center font-weight-light my-2">Nuevo proyecto</h4>
            </div>
            <div class="card-body">
                    <form class="mb-3" action="{{ route('einfoProyecto') }}" method="post">
                        @csrf
                        <input id="codigo" type="hidden" name="codigo" value="{{$datos[0]->codigo}}">
                    <div class="col-sm-8 mx-auto">
                        <label for="nombre">Nombre de proyecto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$datos[0]->nombre}}">
                        @error('nombre')
                            {{$message}}
                        @enderror
                        <br>
                        <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="guardar">
                        </div>
                    </div>
                    </form>
                    <table class="table table-light table-striped" id="tabla">
                        <thead class="thead-light">
                          <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ( $alumnos as $proyecto )
                        <tr>
                        <td>{{$proyecto->nombre}}</td>
                        <td>{{$proyecto->apelPat." ".$proyecto->apelPat}}</td>
                        @if ($proyecto->estatus == '2')
                        <td>
                            <a href="{{ route('aceptarAlumno', ['id'=>$proyecto->id,'codigo'=>$datos[0]->codigo]) }}" class="btn btn-primary">Aceptar</a>
                            <a href="{{ route('noaceptarAlumno', ['id'=>$proyecto->id,'codigo'=>$datos[0]->codigo]) }}" class="btn btn-warning">No aceptar</a>
                        </td> 
                        @else
                            <td><a href="{{ route('noaceptarAlumno', ['id'=>$proyecto->id,'codigo'=>$datos[0]->codigo]) }}" class="btn btn-danger">Eliminar</a></td>
                        @endif
                        
                        @endforeach
                            </tr>
                        </tbody>
                      </table>
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
    showConfirmButton: false,
    timer: 1500

})
@endif
});
    </script>
@endsection