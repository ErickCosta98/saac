@extends('layouts.plantillaL')


@section('contenido')
    <div class="container">
        <div class="row ">
            <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
                <div class="card-header mt-3">
                    <h4  class="text-center font-weight-light my-2">Nuevo usuario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('userSave') }}" method="post">
                        @csrf
                        <div class="col-sm-8 mx-auto">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre">
                            <label for="apelPat">Apellido paterno</label>
                            <input class="form-control" type="text" name="apelPat" id="apelPat">
                            <label for="apelMat">Apellido materno</label>
                            <input class="form-control" type="text" name="apelMat" id="apelMat">
                            <label for="usuario">usuario</label>
                            <input class="form-control" type="text" name="usuario" id="usuario">
                            <label for="mail">Correo</label>
                            <input class="form-control" type="email" name="mail" id="mail">
                        </div>

                        @role('Admin')
                        <div class="col-sm-8 mx-auto">
                            <label for="my-select">Rol</label>
                            <select id="my-select" class="form-control" name="roles">
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol['name'] }}</option>

                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="col-sm-8 mx-auto">
                            <label for="my-select">Rol</label>
                            <select id="my-select" class="form-control" name="roles">
                                @foreach ($roles as $rol)
                                @if ($rol->name != 'Admin' && $rol->name!='Capturista')
                                <option value="{{ $rol->id }}">{{ $rol['name'] }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @endrole


                        {{-- <div class="text-center">
            @foreach ($roles as $rol)
            <label class="checkbox-inline">
                <input type="checkbox" name="roles[]" id="roles[]" value="{{$rol->id}}" >{{$rol['name']}}
                </label>
            @endforeach
            <br> --}}
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
