@extends('layouts.plantillaL')


@section('contenido')
<div class="container">
    <div class="row  ">
        <div class="card mx-auto">
        <div class="card-header"><h4 class="text-center font-weight-light my-2">Usuario:{{$user->usuario}}</h4></div>
        <div class="card-body" >
            <form action="{{ route('userUpdate',$user)}}" method="post">
                @csrf
            
                @method('put')
            
                {{-- @dd($user) --}}
                <div class="col-sm-8 mx-auto" >
                <label for="">Nombre</label>
                <input class="form-control" name="nombre" id="nombre" value="{{$user->nombre}}">
                <br>
                <label for="">Apellido paterno</label>
                <input  class="form-control" type="text" name="apelPat" id="apelPa" value="{{$user->apelPat}}">
                <br>
                <label for="">Apellido materno</label>
                <input class="form-control" type="text" name="apelMat" id="apelMat" value="{{$user->apelMat}}">
            </div>
                <br>

                <br>
                <div class="text-center">
                @foreach ($roles as $rol)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="roles[]" id="roles[]" value="{{$rol->id}}" <?php foreach($roleN as $key => $rolen){ if($rolen == $rol['name']){ echo 'checked';} };  ?>> {{$rol['name']}}
                        </label>
                    @endforeach
                    <br>
                <input  class="btn btn-success" type="submit" value="Guardar">
            </div>
            </form>
</div>
</div>
    </div>
</div>


@endsection