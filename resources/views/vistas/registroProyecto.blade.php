@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="card mx-auto">
            <div class="card-header">
                <h4 class="text-center font-weight-light my-2">Nuevo proyecto</h4>
            </div>
            <div class="card-body">
                    <form action="{{ route('nuevoProyecto') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="col-sm-8 mx-auto">
                        <label for="nombre">Nombre de proyecto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
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