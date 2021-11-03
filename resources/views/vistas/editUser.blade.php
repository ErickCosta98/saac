@extends('layouts.plantillaL')


@section('contenido')
<div class="container ">
    <div class="row  ">
        <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
        <div class="card-header mt-3"><h4 class="text-center font-weight-light my-2">Usuario:{{$user->usuario}}</h4></div>
        <div class="card-body" >
            <form action="{{ route('userUpdate',$user)}}" method="post">
                @csrf
            
                @method('put')
            
                {{-- @dd($user) --}}
                <input type="hidden" name="listas" value="{{$listas}}">
                <div class="col-sm-8 mx-auto" >
                <label for="">Nombre</label>
                <input class="form-control" name="nombre" id="nombre" value="{{$user->nombre}}">
                @error('nombre')
                   {{$message }}
                @enderror
                <br>
                <label for="">Apellido paterno</label>
                <input  class="form-control" type="text" name="apelPat" id="apelPaT" value="{{$user->apelPat}}">
                @error('apelPat')
                {{$message }}
             @enderror
                <br>
                <label for="">Apellido materno</label>
                <input class="form-control" type="text" name="apelMat" id="apelMat" value="{{$user->apelMat}}">
                @error('apelMat')
                {{$message }}
             @enderror
             {{-- <label for="">Correo</label>
                <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}"> --}}
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
                <a class="btn btn-danger" href="{{ route('passwordReset', ['id'=>$user->id]) }}">Reset Password</a>
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