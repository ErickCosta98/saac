@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="card mx-auto">
            <div class="card-header">
                <h4 class="text-center font-weight-light my-2">Nuevo usuario</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('data') }}">
                    <input type="text" name="usuario" id="usuario">
                <input type="submit" value="guardar">
            </form>
            @if (session('data'))
            <div class="alert alert-success" role="alert">
                <strong> {{session('data')}}</strong>
            </div>
            @endif
            </div>
            
        </form>
                <form action="" method="get">
                    <div class="col-sm-8 mx-auto">
                        <label for="nombre">Nombre de proyecto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="form-group col-sm-8 mx-auto">
                        <label for="my-select">Alumnos</label>
                            <select id="listAlumno" class="form-control" name="listAlumno">                        
                            <option></option>
                        </select>
        </div>
    </div>
</div>
</div>
@endsection