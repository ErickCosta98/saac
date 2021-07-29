@extends('layouts.plantillaL')
<script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>    
@section('contenido')
<style>
    .container{
        margin-top: 20px;
    }
</style>
<div class="container shadow-lg border-0 rounded-lg mt-3">

    <form  action="{{ route('saveContenido')}}" method="POST">
        @csrf
        <input type="hidden" name="codigo" value="{{$datos[0]->codigo}}">
        <br>
        <textarea class="" name="editor" id="editor" cols="80" rows="70" >{{$datos[0]->contenido}}</textarea>
        <br>
        
        {{-- <div class="text-center">
            <input type="submit" value="Guardar" class="btn btn-success">
        </div> --}}
    </form>
</div>
<script>
    CKEDITOR.replace( 'editor',{
        height:500,
    } );
   
</script>
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
            timer: 1500,
        })
        @endif
        @if(Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: 'Listo!',
        text: '{{ Session::get("success") }}',
        showConfirmButton: false,
            timer: 1500,
    })
    @endif
    });
        </script>
@endsection
