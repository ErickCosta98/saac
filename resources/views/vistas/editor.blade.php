@extends('layouts.plantilla')
<link rel="stylesheet" href="src/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="src/css/richtext.min.css"> --}}
<script src="src/js/jquery-3.6.0.min.js"></script>
{{-- <script src="src/js/jquery.richtext.js"></script> --}}s
<script src="src/ckeditor/ckeditor.js"></script>
@section('titulo',"Editor1")
    
@section('contenido')
<style>
    .container{
        margin-top: 50px;
    }
</style>
<div class="container">
<div class=" row">
    <form action="{{ route('editor.show') }}" method="POST">
        @csrf
        <textarea name="area" class="editor" cols="30" rows="10"></textarea>
        <input type="submit" value="Guardar" class="btn btn-success">
    </form>
</div>
</div>
<script>
    // $('.editor').richText();
    CKEDITOR.replace( 'area' );
</script>
@endsection 
