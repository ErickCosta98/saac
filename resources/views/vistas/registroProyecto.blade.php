@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
            <div class="card-header mt-3 ">
                <h4 class="text-center font-weight-light my-2">Nuevo proyecto</h4>
            </div>
            <div class="card-body">
                    <form action="{{ route('nuevoProyecto') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="col-sm-8 mx-auto">
                        <label for="nombre">Nombre de proyecto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        @error('nombre')
                            {{$message}}
                        @enderror
                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Descripcion.." id="floatingTextarea2" name='descripcion' style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Descripcion del proyecto(opcional)</label>
                          </div>
                        <br>
                        <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="guardar">
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
    title: 'Listo! el codigo es:',
    text: '{{ Session::get("success") }}',
})
@endif
});
    </script>
@endsection