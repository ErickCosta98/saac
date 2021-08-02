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
        
       
    </form>
    @can('authProyectos')
    <div class="text-center ">
      <button id="btnap" class="btn btn-outline-success" value="{{$datos[0]->codigo}}">Aprobar</button>
   </div>
   <br>
    @endcan
    
</div>
<script>
    CKEDITOR.replace( 'editor',{
        height:500,
    } );
   
</script>
@endsection 

@section('js')
<script>
    $(document).ready(function () {
        $('#btnap').on('click', function () //Al hacer click sobre el boton button.form de la linea de arriba
          {
              var codigo = document.getElementById('btnap').value
// console.log(codigo)             
             var ruta = `{{ route('Aceptarproyecto') }}`;
            //  console.log(ruta)
             const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: 'Estas seguro de aprobar este proyecto?',
    text: "No se podra revertir",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'No',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "get",
        url: ruta,
        data: "&codigo=" + codigo,
        success: function (data) {
          console.log(data)
          swalWithBootstrapButtons.fire(
        'Proyecto aceptado!',
      )    
        location.href = `{{ route('welcome') }}`;
      
        }
      });
      
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
  
      )
    }
  })
  } );
    });
    
</script>
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
