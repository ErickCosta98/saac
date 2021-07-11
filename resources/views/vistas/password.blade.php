@extends('layouts.plantillaL')


@section('contenido')
@if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong> {{session('info')}}</strong>
    </div>
@endif
<div class="container">
    <div class="row  ">
        <div class="card mx-auto">
        <div class="card-header"><h4 class="text-center font-weight-light my-2">Usuario:{{Auth::user()->usuario}}</h4></div>
        <div class="card-body" >
            <form action="{{ route('userUpdatepass')}}" method="post">
                @csrf
                <input id="id" name="id" type="hidden" value="{{Auth::user()->id}}">
                <div class="col-sm-8 mx-auto" >
                <label for="">Contraseña Actual</label>
                <input class="form-control" type="password" name="actpass" id="actpass">
                @error('actpass'){{$message}}@enderror
                <label for="">Nueva contraseña</label>
                <input class="form-control" type="password" name="newPass" id="newPass" value="{{old('newPass')}}">
                @error('newPass'){{$message}}@enderror
                <br>
                <label for="">Confirmar contraseña</label>
                <input class="form-control" type="password" name="conPass" id="conPass">
                @error('conPass'){{$message}}@enderror
                <br>
                <div class="text-center">
                <input class="btn btn-success" type="submit" value="Guardar">
                </div>
                </div>
            </form>
        </div>
</div>
    </div>
</div>
@endsection