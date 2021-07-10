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
                <label for="">Correo</label>
                <input class="form-control" type="email" name="email" id="email" value="{{$user->mail}}">
            </div>
                @role('Admin')
                <div class="col-sm-8 mx-auto">
                    <label for="my-select">Rol</label>
                    <select id="my-select" class="form-control" name="roles">
                        @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" <?php foreach($roleN as $key => $rolen){ if($rolen == $rol['name']){ echo 'selected';} };  ?>>{{ $rol['name'] }}</option>


                        @endforeach
                    </select>
                </div>
            @else
                <div class="col-sm-8 mx-auto">
                    <label for="my-select">Rol</label>
                    <select id="my-select" class="form-control" name="roles">
                        @foreach ($roles as $rol)
                        @if ($rol->name != 'Admin' && $rol->name!='Capturista')
                        <option value="{{ $rol->id }}" <?php foreach($roleN as $key => $rolen){ if($rolen == $rol['name']){ echo 'selected';} };  ?>>{{ $rol['name'] }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                @endrole
                <div class="text-center">
                    <br>
                <input  class="btn btn-success" type="submit" value="Guardar">
            </div>
            </form>
</div>
</div>
    </div>
</div>


@endsection