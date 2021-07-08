@extends('layouts.plantillaL')


@section('contenido')
<div class="container">
    <div class="row  ">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Nuevo usuario</h3></div>
        <div class="card-body">
    <form action="{{ route('userSave') }}" method="post">
        @csrf        
        
        <div class="col-mb-6">
            <label for="">Nombre</label>
            <div class="form-floating mb-3">
        <input class="form-control" type="text" name="nombre" id="nombre">
            </div>    
    </div>   <div class="col-mb-6">
        <label for="">Apellido paterno</label>
        <div class="form-floating mb-3 ">
    <input class="form-control" type="text" name="apelPat" id="apelPat">
        </div>    
</div>
        
        <div class="col-mb-6">
            <label for="">Apellido materno</label>
            <div class="form-floating mb-3 ">
        <input class="form-control" type="text" name="apelMat" id="apelMat">
            </div>    
    </div>
        <div class="col-mb-6">
            <label for="">Correo</label>
            <div class="form-floating mb-3" >
        <input class="form-control" type="email" name="mail" id="mail">
            </div>
        </div>
       
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">usuario</label>
                <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" type="text" name="usuario" id="usuario">
                </div>
            </div>
            <div class="col-md-6">
                <label for="">Contraseña</label>
                <div class="form-floating mb-3 mb-md-0">
        <input class="form-control" type="text" name="password" id="password">
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0">
            @foreach ($roles as $rol)
            <label class="checkbox-inline">
                <input type="checkbox" name="roles[]" id="roles[]" value="{{$rol->id}}" >{{$rol['name']}}
                </label>
            @endforeach
        </div>
        <input class="btn btn-primary" type="submit" value="Guardar"> 
    
    </form>
</div>
    </div>
</div>
</div>
</div>

@endsection